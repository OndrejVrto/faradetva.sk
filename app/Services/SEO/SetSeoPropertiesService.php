<?php

namespace App\Services\SEO;

use App\Facades\SeoGraph;
use App\Facades\SeoSchema;
use Spatie\SchemaOrg\Type;
use Illuminate\Support\Str;
use Spatie\SchemaOrg\Schema;
use Spatie\SchemaOrg\ImageObject;
use Illuminate\Support\Collection;
use Spatie\SchemaOrg\ImageGallery;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

// TODO: Refactor this mess
class SetSeoPropertiesService {
    public function __construct(
        private ?array $page = null,
    ) {
    }

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
        if ($this->page['title'] != config('seotools.meta.defaults.title')) {
            SEOMeta::setTitle($this->page['title']);
        }
        SEOMeta::setDescription($this->page['page-description']);
        SEOMeta::addKeyword($this->page['keywords']);
        SEOMeta::addMeta('author', $this->page['author'], 'name');
        // SEOMeta::addMeta('robots', 'index, follow', 'name');

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
        SeoSchema::addValue('primaryImageOfPage', $this->getPrimaryImagePageSchema($this->page));
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
        SeoSchema::addValue('mainEntityOfPage', $this->getMainEntitySchema($this->page['title'], $this->page['url']));
        SeoSchema::addValue('potentialAction', $this->getReadActionSchema($this->page['url']));
        SeoSchema::addValue('image', $this->getPrimaryImagePageSchema($this->page));
        SeoSchema::addValue('publisher', $this->getOrganizationSchema());

        return $this;
    }

    public function setFaqSeoMetaTags(array|Collection $faqData): void {
        $JsonLD = Schema::fAQPage()
            ->mainEntity($this->setFaqQuestions($faqData))
            ->toArray();
        unset($JsonLD['@context']);

        if (SeoSchema::hasValue('hasPart')) {
            SeoSchema::addValue('hasPart', array_merge(SeoSchema::getValue('hasPart'), [$JsonLD]));
        } else {
            SeoSchema::addValue('hasPart', [$JsonLD]);
        }
    }

    public function setCompletFaqSeo(array|Collection $faqData): void {
        $JsonLD = $this->setFaqQuestions($faqData);

        SeoSchema::addValue('mainEntity', [$JsonLD]);
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
            ->if(isset($this->page['img-author']) or isset($this->page['img-author_url']), function (ImageObject $schema) {
                $schema->author(
                    Schema::person()
                        ->name($this->page['img-author'])
                        ->sameAs($this->page['img-author_url'])
                );
            })
            ->license($this->page['img-license_url'])
            ->acquireLicensePage($this->page['img-license_url'])
            ->if(isset($this->page['img-source_url']) or isset($this->page['img-source']), function (ImageObject $schema) {
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
                        ->identifier(e(
                            empty($item['url']) ? "#".Str::slug($item['title']) : $item['url']
                        ))
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
            ->url(
                empty($this->page['author-www'])
                    ? route('article.author', $this->page['author-slug'])
                    : $this->page['author-www']
            )
            ->toArray();

        unset($JsonLD['@context']);

        return $JsonLD;
    }

    public function setPictureSchema(array $pictureData): void {
        $JsonLD = Schema::imageObject()
            ->name(e($pictureData['img-title']))
            ->identifier(e($pictureData['img-url']))
            ->url(e($pictureData['img-url']))
            ->description(e($pictureData['source_description']))
            ->alternateName(e($pictureData['source_description']))
            ->width($pictureData['img-width'])
            ->height($pictureData['img-height'])
            ->encodingFormat($pictureData['img-mime'])
            ->uploadDate($pictureData['img-updated'])
            ->license(e($pictureData['sourceArr']['source_license_url']))
            ->acquireLicensePage(e($pictureData['sourceArr']['source_license_url']))
            ->if(isset($pictureData['sourceArr']['source_author']) or isset($pictureData['sourceArr']['source_author_url']), function (ImageObject $schema) use ($pictureData) {
                $schema->author(
                    Schema::person()
                        ->name(e($pictureData['sourceArr']['source_author']))
                        ->sameAs(e($pictureData['sourceArr']['source_author_url']))
                );
            })
            ->thumbnail(
                Schema::imageObject()
                    ->url(e($pictureData['img_thumbnail_url']))
                    ->encodingFormat($pictureData['img-mime'])
                    ->width($pictureData['img_thumbnail_width'])
                    ->height($pictureData['img_thumbnail_height'])
            )
            ->toArray();

        unset($JsonLD['@context']);

        SeoSchema::addImage([
            $JsonLD
        ]);
    }

    public function setGallerySchema(array $album): void {
        $pictures = [];
        foreach ($album['picture'] as $picture) {
            $pictures[] = Schema::imageObject()
                ->contentUrl(e($picture['href']))
                ->name(e($picture['title']));
        }

        $JsonLD = Schema::imageGallery()
            ->name(e($album['title']))
            ->description(e($album['source_description']))
            ->if(isset($album['sourceArr']['source_author']) or isset($album['sourceArr']['author_url']), function (imageGallery $schema) use ($album) {
                $schema->author(
                    Schema::person()
                        ->name(e($album['sourceArr']['source_author']))
                        ->sameAs(e($album['sourceArr']['source_author_url']))
                );
            })
            ->license(e($album['sourceArr']['source_license_url']))
            ->acquireLicensePage(e($album['sourceArr']['source_license_url']))
            ->if(isset($album['sourceArr']['source_source_url']) or isset($album['sourceArr']['source_source']), function (ImageGallery $schema) use ($album) {
                $schema->copyrightHolder(
                    Schema::organization()
                        ->name(e($album['sourceArr']['source_source']))
                        ->url(e($album['sourceArr']['source_source_url']))
                );
            })
            ->associatedMedia($pictures)
            ->toArray();

        unset($JsonLD['@context']);

        if (SeoSchema::hasValue('hasPart')) {
            SeoSchema::addValue('hasPart', array_merge(SeoSchema::getValue('hasPart'), [$JsonLD]));
        } else {
            SeoSchema::addValue('hasPart', [$JsonLD]);
        }
    }

    public function setPriestsSchema(array $priestData): void {
        foreach ($priestData as $priest) {
            $value = Schema::person()
                ->name(e($priest['full_name_titles']))
                ->givenName(e($priest['first_name']))
                ->familyName(e($priest['last_name']))
                ->honorificPrefix(e($priest['titles_before']))
                ->honorificSuffix(e($priest['titles_after']))
                ->nationality('Slovak')
                ->if(isset($priest['facebook']) or isset($priest['twitter']), function ($schema) use ($priest) {
                    $schema->sameAs([
                        isset($priest['facebook']) ? $priest['facebook'] : '',
                        isset($priest['twitter']) ? $priest['twitter'] : '',
                    ]);
                })
                ->if(isset($priest['phone']), function ($schema) use ($priest) {
                    $schema->telephone([
                        e($priest['phone']),
                        e($priest['phone_digits'])
                    ]);
                })
                ->email(e($priest['email']))
                ->jobTitle('Priest'.'|'.e($priest['function']))
                ->gender('https://schema.org/Male')
                ->url($priest['personal_url'])
                ->description(e($priest['description_clean']))
                ->image(e($priest['img-url']))
                ->worksFor(
                    Schema::organization()
                        ->name('Rímskokatolícka cirkev')
                        ->url('https://www.kbs.sk')
                        ->sameAs('https://sk.wikipedia.org/wiki/R%C3%ADmskokatol%C3%ADcka_cirkev_v_Slovenskej_republike')
                )
                ->toArray();

            unset($value['@context']);
            $persons[] = $value;
        }

        SeoSchema::addValue('alumni', $persons);
    }
}
