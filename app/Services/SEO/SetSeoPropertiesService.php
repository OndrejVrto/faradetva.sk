<?php

namespace App\Services\SEO;

use App\Facades\SeoGraph;
use App\Facades\SeoSchema;
use Spatie\SchemaOrg\Type;
use Spatie\SchemaOrg\Schema;
use Spatie\SchemaOrg\ImageObject;
use Illuminate\Support\Collection;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

// TODO: Refactor this mess
class SetSeoPropertiesService
{
    public function __construct(
        private ?array $page = null,
    ) {}

    public function setBreadcrumbSchemaGraph(array $breadcrumbLinks): self {
        SeoGraph::add($this->getBreadcrumbSchema($breadcrumbLinks), 'BreadCrumb');
        return $this;
    }

    public function setWebsiteSchemaGraph(): self {
        SeoGraph::add($this->getWebSiteSchema(), 'WebSite');
        return $this;
    }

    public function setOrganisationSchemaGraph(): self {
        SeoGraph::add($this->getOrganizationSchema(), 'Organization');
        return $this;
    }

    // Twiter, Facebook and META
    public function setMetaTags(): self {
        // Global Meta
        if($this->page['title'] != config('seotools.meta.defaults.title')){
            SEOMeta::setTitle($this->page['title']);
        }
        SEOMeta::setDescription($this->page['page-description']);
        SEOMeta::addKeyword($this->page['keywords']);
        SEOMeta::addMeta('author', $this->page['author'], 'name');

        // Facebook and other social site
        OpenGraph::setDescription($this->page['page-description']);
        OpenGraph::setTitle($this->page['title']);
        OpenGraph::addImage($this->page['img-representing'], [
            'alt' => $this->page['img-description'],
            'type' => $this->page['img-mime-type'],
            'width' => $this->page['img-width'],
            'height' => $this->page['img-height'],
        ]);

        // Twitter
        TwitterCard::setTitle($this->page['title']);
        TwitterCard::setDescription($this->page['page-description']);
        TwitterCard::setImage($this->page['img-representing']);
        TwitterCard::addValue('image:alt', $this->page['img-description']);

        return $this;
    }

    // For general pages
    public function setWebPageSchema(): self {
        SeoSchema::setType($this->page['type_page']);
        SeoSchema::setTitle($this->page['title']);
        SeoSchema::setDescription($this->page['page-description']);
        SeoSchema::addValue('inLanguage', "sk-SK");
        if ($this->page['wikipedia']) {
            SeoSchema::addValue('sameAs', $this->page['wikipedia']);
        }
        SeoSchema::addValue('keywords', $this->page['keywords']);
        SeoSchema::addValue('primaryImageOfPage', $this->getPrimaryImagePageSchema($this->page) );
        SeoSchema::addValue('potentialAction', $this->getReadActionSchema($this->page['url']));
        SeoSchema::addValue('datePublished', $this->page['datePublished']);
        SeoSchema::addValue('dateModified', $this->page['dateModified']);

        return $this;
    }

    // For Article pages
    public function setWebPageArticleSchema(): self {
        SeoSchema::setType($this->page['type_page']);
        SeoSchema::setTitle(e($this->page['title']));
        SeoSchema::setDescription(e($this->page['page-description']));
        SeoSchema::addValue('inLanguage', "sk-SK");
        SeoSchema::addValue('keywords', e($this->page['keywords']));
        SeoSchema::addValue('headline', e($this->page['teaser']));
        SeoSchema::addValue('datePublished', $this->page['datePublished']);
        SeoSchema::addValue('dateModified', $this->page['dateModified']);
        if ($this->page['expires']) {
            SeoSchema::addValue('expires', $this->page['expires']);
        }
        SeoSchema::addValue('author', $this->getArticleAuthorSchema());
        SeoSchema::addValue('isAccessibleForFree', true);
        SeoSchema::addValue('articleBody', $this->page['content-plain']);
        SeoSchema::addValue('articleBody', $this->page['content-plain']);
        SeoSchema::addValue('articleSection', $this->page['category']);
        SeoSchema::addValue('wordCount', $this->page['count-words']);
        SeoSchema::addValue('mainEntityOfPage', $this->getMainEntitySchema($this->page['title'], $this->page['url']) );
        SeoSchema::addValue('potentialAction', $this->getReadActionSchema($this->page['url']) );
        SeoSchema::addValue('image', $this->getPrimaryImagePageSchema($this->page) );
        SeoSchema::addValue('publisher', $this->getOrganizationSchema());

        return $this;
    }

    public function setFaqSeoMetaTags(array|Collection $faqData): void {
        $JsonLD = Schema::fAQPage()
            ->mainEntity( $this->setFaqQuestions($faqData) )
            ->toArray();
        unset($JsonLD['@context']);

        if (SeoSchema::hasValue('hasPart')) {
            SeoSchema::addValue('hasPart', array_merge(SeoSchema::getValue('hasPart'), [$JsonLD]) );
        } else {
            SeoSchema::addValue('hasPart', [$JsonLD] );
        }
    }

    public function setCompletFaqSeo(array|Collection $faqData): void {
        $JsonLD = $this->setFaqQuestions($faqData);

        SeoSchema::addValue('mainEntity', [$JsonLD] );
    }

    public function setFaqQuestions(array|Collection $faqData): array {
        $questions = [];
        foreach ($faqData as $faq) {
            $tmp = Schema::question()
                    ->name(e($faq['question']))
                    ->acceptedAnswer(
                        Schema::answer()
                            ->text(e($faq['answer-clean']))
                    )->toArray();
            unset($tmp['@context']);
            $questions[] = $tmp;
        }
        return $questions;
    }

    private function getWebSiteSchema(): Type {
        return Schema::webSite()
            ->url(config('app.url'))
            ->name('Farnosť Detva')
            ->description('Webové stránky farnosti a dekanátu Detva.')
            ->publisher(
                Schema::organization()->identifier('#FaraDetva')
            )
            ->inLanguage('sk-SK')
            ->potentialAction(
                $this->getSearchActionSchema()
            );
    }

    private function getSearchActionSchema(): Type {
        return Schema::searchAction()
            ->target(
                Schema::entryPoint()
                    ->urlTemplate(config('app.url')."/hladat/{search_term_string}")
            )
            ->setProperty('query-input', 'required name=search_term_string');
    }

    private function getReadActionSchema(string $url): array {
        $JsonLD = Schema::readAction()
            ->target($url)->toArray();
        unset($JsonLD['@context']);

        return $JsonLD;
    }

    private function getMainEntitySchema(string $title, string $url): array {
        $JsonLD = Schema::webPage()
                    ->name($title)
                    ->url($url)
                    ->toArray();

        unset($JsonLD['@context']);

        return $JsonLD;
    }

    private function getOrganizationSchema(): Type {
        return Schema::organization()
            ->identifier('#FaraDetva')
            ->name('Farnosť Detva')
            ->url(url('kontakty'))
            ->alternateName(['Farský kostol svätého Františka z Assisi v Detve', 'Rímskokatolícka cirkev, Farnosť Detva', 'dekanát Detva'])
            ->sameAs('https://www.facebook.com/Farnos%C5%A5-Detva-103739418174148')
            ->logo(
                Schema::imageObject()
                    ->identifier('#LogoFaraDetva')
                    ->url(asset('images/logo/logo-farnosti-detva.svg', true))
                    ->encodingFormat('image/svg+xml')
                    ->width(500)
                    ->height(500)
                    ->caption('Logo farnosti Detva')
            )
            ->image(
                Schema::imageObject()
                    ->url(asset('images/pictures/Farnost-Detva.jpg', true))
                    ->encodingFormat('image/jpeg')
                    ->width(1024)
                    ->height(712)
                    ->author(
                        Schema::person()
                            ->name('Tomáš Belko')
                            ->email('tomasbelko.detva@gmail.com')
                            ->telephone('+421905897971')
                            ->sameAs(['https://www.tomasbelko.com', 'https://www.facebook.com/spoznajpodpolanie'])
                    )
                    ->caption('Farský kostol sv. Františka v Detve v žiare zapadajúceho slnečného svetla.')
            )
            ->email('detva@fara.sk')
            ->telephone('(+421) (045) 54 55 243')
            ->address(
                Schema::postalAddress()
                    ->streetAddress('Partizánska ul. 64')
                    ->addressLocality('Detva')
                    ->postalCode('96212')
                    ->addressCountry('Slovakia')
            )
            ->location(
                Schema::place()
                    ->geo(
                        Schema::geoCoordinates()
                            ->latitude('48.559227162468375')
                            ->longitude('19.41894706403129')
                    )
                    ->hasMap('https://www.google.com/maps/@48.5583932,19.4172204,334m')
            );
    }

    private function getPrimaryImagePageSchema(): array {
        $JsonLD = Schema::imageObject()
            ->url($this->page['img-representing'])
            ->thumbnailUrl($this->page['img-thumb'])
            ->name($this->page['img-file-name'])
            ->description($this->page['img-description'])
            ->alternateName($this->page['img-description'])
            ->encodingFormat($this->page['img-mime-type'])
            ->height($this->page['img-height'])
            ->width($this->page['img-width'])
            ->uploadDate(e($this->page['img-updated_at']))
            ->if(isset($this->page['img-author']) OR isset($this->page['img-author_url']), function (ImageObject $schema) {
                $schema->author(
                    Schema::person()
                        ->name($this->page['img-author'])
                        ->sameAs($this->page['img-author_url'])
                );
            })
            ->license($this->page['img-license'])
            ->acquireLicensePage($this->page['img-license_url'])
            ->usageInfo($this->page['img-license_url'])
            ->if( isset($this->page['img-source_url']) OR isset($this->page['img-source']), function (ImageObject $schema) {
                $schema->copyrightHolder(
                    Schema::organization()
                        ->name($this->page['img-source'])
                        ->url($this->page['img-source_url'])
                );
            })
            ->toArray();
            unset($JsonLD['@context']);

            return $JsonLD;
    }

    private function getBreadcrumbSchema(array $links): Type {
        $items[] = Schema::listItem()
            ->position(1)
            ->item(
                Schema::thing()
                    ->identifier(config('app.url'))
                    ->url(config('app.url'))
                    ->name('Farnosť Detva')
            );

        foreach ($links as $i => $item) {
            $items[] = Schema::listItem()
                ->position($i + 2)
                ->item(
                    Schema::thing()
                        ->identifier(e($item['url']))
                        ->url(e($item['url']))
                        ->name(e($item['title']))
                );
        }

        return Schema::breadcrumbList()
            ->numberOfItems(count($items))
            ->itemListElement(
                $items
            );
    }

    private function getArticleAuthorSchema(): array {
        $JsonLD = Schema::person()
            ->name($this->page['author'])
            ->sameAs($this->page['author-twitter'])
            ->sameAs($this->page['author-facebook'])
            ->telephone($this->page['author-phone'])
            ->email($this->page['author-email'])
            ->url($this->page['author-www'])
            ->toArray();

        unset($JsonLD['@context']);

        return $JsonLD;
    }
}
