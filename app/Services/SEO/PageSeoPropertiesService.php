<?php declare(strict_types=1);

namespace App\Services\SEO;

use App\Facades\SeoGraph;
use App\Facades\SeoSchema;
use Spatie\SchemaOrg\Type;
use Illuminate\Support\Str;
use Spatie\SchemaOrg\Schema;
use Spatie\SchemaOrg\ImageObject;
use App\DataTransferObjects\PageData;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use App\DataTransferObjects\PageArticleData;
use App\DataTransferObjects\AuthorArticleData;
use App\DataTransferObjects\RepresentingImageData;

class PageSeoPropertiesService {
    public function setBreadcrumbSchemaGraph(array $breadcrumbLinks): static {
        SeoGraph::add($this->getBreadcrumbSchema($breadcrumbLinks), 'BreadCrumb');
        return $this;
    }

    public function setWebsiteSchemaGraph(): static {
        SeoGraph::add($this->getWebSiteSchema(), 'WebSite');
        return $this;
    }

    public function setOrganisationSchemaGraph(): static {
        SeoGraph::add($this->getOrganizationSchema(), 'Organization');
        return $this;
    }

    // Twiter, Facebook and META
    public function setMetaTags(
        string $title,
        string $description,
        string $keywords,
        string $author,
        RepresentingImageData $image,
    ): static {
        // Global Meta
        if ($title != config('seotools.meta.defaults.title')) {
            SEOMeta::setTitle($title);
        }
        SEOMeta::setDescription($description);
        SEOMeta::addKeyword($keywords);
        SEOMeta::addMeta('author', $author, 'name');
        // SEOMeta::addMeta('robots', 'index, follow', 'name');

        // Facebook and other social site
        OpenGraph::setDescription($description);
        OpenGraph::setTitle($title);
        OpenGraph::addImage($image->url, [
            'alt' => $image->source->description,
            'type' => $image->mimeType,
            'width' => $image->width,
            'height' => $image->height,
        ]);

        // Twitter
        TwitterCard::setTitle($title);
        TwitterCard::setDescription($description);
        TwitterCard::setImage($image->url);
        TwitterCard::addValue('image:alt', $image->source->description);

        return $this;
    }

    // For general pages
    public function setWebPageSchema(PageData $page): static {
        SeoSchema::setType($page->type->type());
        SeoSchema::setTitle($page->title);
        SeoSchema::setDescription($page->description);
        SeoSchema::addValue('inLanguage', "sk-SK");
        if ($page->wikipedia) {
            SeoSchema::addValue('sameAs', $page->wikipedia);
        }
        SeoSchema::addValue('keywords', $page->keywords);
        SeoSchema::addValue('primaryImageOfPage', $this->getPrimaryImagePageSchema($page->image));
        SeoSchema::addValue('potentialAction', $this->getReadActionSchema($page->url));
        SeoSchema::addValue('datePublished', $page->datePublished->toAtomString());
        SeoSchema::addValue('dateModified', $page->dateModified->toAtomString());

        return $this;
    }

    // For Article pages
    public function setWebPageArticleSchema(PageArticleData $pageArticle): static {
        SeoSchema::setType($pageArticle->type->type());
        SeoSchema::setTitle(e($pageArticle->title));
        SeoSchema::setDescription(e($pageArticle->description));
        SeoSchema::addValue('inLanguage', "sk-SK");
        SeoSchema::addValue('keywords', e($pageArticle->keywords));
        SeoSchema::addValue('headline', e($pageArticle->teaser));
        SeoSchema::addValue('datePublished', $pageArticle->datePublished->toAtomString());
        SeoSchema::addValue('dateModified', $pageArticle->dateModified->toAtomString());
        if ($pageArticle->dateExpires !== null) {
            SeoSchema::addValue('expires', $pageArticle->dateExpires->toAtomString());
        }
        SeoSchema::addValue('author', $this->getArticleAuthorSchema($pageArticle->author));
        SeoSchema::addValue('isAccessibleForFree', true);   // @phpstan-ignore-line
        SeoSchema::addValue('articleBody', $pageArticle->contentPlain);
        SeoSchema::addValue('articleSection', $pageArticle->category);
        SeoSchema::addValue('wordCount', (string) $pageArticle->countWords);
        SeoSchema::addValue('mainEntityOfPage', $this->getMainEntitySchema($pageArticle->title, $pageArticle->url));
        SeoSchema::addValue('potentialAction', $this->getReadActionSchema($pageArticle->url));
        SeoSchema::addValue('image', $this->getPrimaryImagePageSchema($pageArticle->image));
        SeoSchema::addValue('publisher', $this->getOrganizationSchemaArray());

        return $this;
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
                $this->getSearchActionSchemaArray()
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

    private function getSearchActionSchemaArray(): array {
        $JsonLD = $this->getSearchActionSchema()->toArray();
        unset($JsonLD['@context']);
        return $JsonLD;
    }

    private function getReadActionSchema(string $url): array {
        $JsonLD = Schema::readAction()
            ->url($url)->toArray();
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

    private function getOrganizationSchemaArray(): array {
        $JsonLD = $this->getOrganizationSchema()->toArray();
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
                    ->width(Schema::quantitativeValue()->value(500))
                    ->height(Schema::quantitativeValue()->value(500))
                    ->caption('Logo farnosti Detva')
            )
            ->image(
                Schema::imageObject()
                    ->url(asset('images/pictures/Farnost-Detva.jpg', true))
                    ->encodingFormat('image/jpeg')
                    ->width(Schema::quantitativeValue()->value(1024))
                    ->height(Schema::quantitativeValue()->value(712))
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

    private function getPrimaryImagePageSchema(RepresentingImageData $imageData): array {
        $JsonLD = Schema::imageObject()
            ->url($imageData->url)
            ->thumbnailUrl($imageData->urlThumb)
            ->name($imageData->fileName)
            ->description($imageData->source->description)
            ->alternateName($imageData->source->description)
            ->encodingFormat($imageData->mimeType)
            ->height(Schema::quantitativeValue()->value($imageData->height))
            ->width(Schema::quantitativeValue()->value($imageData->width))
            ->uploadDate($imageData->updated_at)
            ->if(isset($imageData->source->author) || isset($imageData->source->authorUrl), function (ImageObject $schema) use ($imageData): void {
                $schema->author(
                    Schema::person()
                        ->name($imageData->source->author)
                        ->sameAs($imageData->source->authorUrl)
                );
            })
            ->license($imageData->source->licenseUrl)
            ->acquireLicensePage($imageData->source->licenseUrl)
            ->if(isset($imageData->source->source) || isset($imageData->source->sourceUrl), function (ImageObject $schema) use ($imageData): void {
                $schema->copyrightHolder(
                    Schema::organization()
                        ->name($imageData->source->source)
                        ->url($imageData->source->sourceUrl)
                );
            })
            ->toArray();
        unset($JsonLD['@context']);

        return $JsonLD;
    }

    private function getBreadcrumbSchema(array $links): Type {
        $items = [];
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

    private function getArticleAuthorSchema(AuthorArticleData $author): array {
        $JsonLD = Schema::person()
            ->name($author->name)
            ->sameAs($author->twitterUrl)
            ->sameAs($author->facebookUrl)
            ->telephone($author->phone)
            ->email($author->email)
            ->url(
                empty($author->wwwPageUrl)
                    ? route('article.author', $author->slug)
                    : $author->wwwPageUrl
            )
            ->toArray();

        unset($JsonLD['@context']);

        return $JsonLD;
    }
}
