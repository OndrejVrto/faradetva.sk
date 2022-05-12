<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Web;

use Spatie\Image\Image;
use App\Facades\SeoGraph;
use App\Facades\SeoSchema;
use App\Models\StaticPage;
use Spatie\SchemaOrg\Type;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\SchemaOrg\Schema;
use Illuminate\Http\Response;
use Spatie\SchemaOrg\ImageObject;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Artesaos\SEOTools\Facades\SEOMeta;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class PageController extends Controller
{
    public function __invoke(...$param) {

        $nodes = collect($param)->whereNotNull();
        $links = $this->getAllLinks($nodes);
        $pageData = last($links);

        if ($pageData AND Arr::exists($pageData, 'route') AND View::exists($pageData['route'])) {
            $pageData['breadCrumb'] = (string) Breadcrumbs::render('pages.others', true, $links);

            $this->setSeoMetaTags($links);

            return view($pageData['route'], compact('pageData'));
        }

        /** return 404 if page don't exist in DB **/
        abort(Response::HTTP_NOT_FOUND);
    }

    /** complet page data for all nodes in URL link **/
    private function getAllLinks(Collection $node): array {
        $path = '';
        foreach ($node->toArray() as $key => $value) {
            $path .= '/' . $value;
            $arr[$key] = $this->getPageData(substr($path, 1)) ?? [
                'title' => Str::ucfirst(str_replace('-', ' ', (string) $value)),
                'url' => null
            ];
        }
        return $arr;
    }

    /** get Page Data for One nod in URL and Cache it **/
    private function getPageData(string $path): array|null {
        return StaticPage::query()
            ->whereUrl($path)
            ->with('picture', 'source', 'banners', 'faqs')
            ->get()
            ->map(function($page): array {
                $media = $page->picture[0];
                return  [
                    'id'              => $page->id,
                    'author'          => $page->author_page,
                    'page-description'=> $page->description_page,
                    'header'          => $page->header,
                    'keywords'        => $page->keywords,
                    'route'           => $this->getFullRoute($page->route_name),
                    'slug'            => $page->slug,
                    'teaser'          => $page->teaser,
                    'title'           => $page->title,
                    'url'             => $page->full_url,
                    'wikipedia'       => $page->wikipedia,

                    //  TODO: pridať typ SEO Pages

                    'banners'         => $page->banners->pluck('slug')->toArray(),
                    'faqs'            => $page->faqs->pluck('slug')->toArray(),

                    'img-optimize'    => $media->getUrl('optimize'),
                    'img-thumb'       => $media->getUrl('thumb'),
                    'img-twitter'     => $media->getUrl('twitter'),
                    'img-facebook'    => $media->getUrl('facebook'),
                    'img-section-list'=> $media->getUrl('section-list'),
                    'img-event-list'  => $media->getUrl('event-list'),
                    'img-file-name'   => $media->file_name,
                    'img-mime-type'   => $media->mime_type,
                    'img-size'        => $media->size,
                    'img-updated_at'  => $media->updated_at,
                    'img-height'      => Image::load( $media->getPath('optimize') )->getHeight(),
                    'img-width'       => Image::load( $media->getPath('optimize') )->getWidth(),
                    'img-description' => $page->source->source_description,
                    'img-source'      => $page->source->source_source,
                    'img-source_url'  => $page->source->source_source_url,
                    'img-author'      => $page->source->source_author,
                    'img-author_url'  => $page->source->source_author_url,
                    'img-license'     => $page->source->source_license,
                    'img-license_url' => $page->source->source_license_url,
                ];
            })
            ->first();
    }

    /** create full route name **/
    private function getFullRoute(string $route_name): string {
        $route = config('farnost-detva.preppend_route_static_pages','frontend') . '.' . $route_name;
        return (! Str::startsWith($route, '.')) ? $route : substr($route, 1);
    }

    private function setSeoMetaTags(array $allPageData): void {

        $page = last($allPageData);

        SEOMeta::setTitle(e($page['title']));
        SEOMeta::setDescription(e($page['page-description']));
        SEOMeta::addKeyword(e($page['keywords']));
        SEOMeta::addMeta('author', e($page['author']), 'name');

        OpenGraph::setDescription(e($page['page-description']));
        OpenGraph::setTitle(e($page['title']));
        OpenGraph::addImage(e($page['img-facebook']), [
            'alt' => e($page['img-description']),
            'type' => e($page['img-mime-type']),
            'width' => e($page['img-width']),
            'height' => e($page['img-height']),
        ]);

        TwitterCard::setTitle(e($page['title']));
        TwitterCard::setDescription(e($page['page-description']));
        TwitterCard::setImage(e($page['img-twitter']));
        TwitterCard::addValue('image:alt', e($page['img-description']));


        if (e($page['url']) == secure_url('kontakty')) {
            SeoSchema::setType('ContactPage');
        }

        SeoSchema::setTitle(e($page['title']));
        SeoSchema::setDescription(e($page['page-description']));
        if (e($page['wikipedia'])) {
            SeoSchema::addValue('sameAs', e($page['wikipedia']));
        }
        SeoSchema::addValue('keywords', e($page['keywords']));
        SeoSchema::addValue('primaryImageOfPage', $this->getPrimaryImagePageSchema($page) );

        SeoGraph::add($this->getWebSiteSchema(), 'WebSite');
        SeoGraph::add($this->getOrganizationSchema(), 'Organization');
        SeoGraph::add($this->getBreadcrumbSchema($allPageData), 'BreadCrumb');
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
                    ->url('TODO:')
                    ->width(100)
                    ->height(100)
                    ->caption('Logo farnosti Detva')
            )
            ->image(
                Schema::imageObject()
                    ->url('TODO:')
                    ->width(100)
                    ->height(100)
                    ->caption('Referenčný obrázok farnosti Detva')
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

    private function getPrimaryImagePageSchema($page): array {
        $JsonLD = Schema::imageObject()
            ->url(e($page['img-optimize']))
            ->thumbnailUrl(e($page['img-thumb']))
            ->name(e($page['img-file-name']))
            ->description(e($page['img-description']))
            ->alternateName(e($page['img-description']))
            ->encodingFormat(e($page['img-mime-type']))
            ->height(e($page['img-height']))
            ->width(e($page['img-width']))
            ->uploadDate(e($page['img-updated_at']))
            ->if(isset($page['img-author']) OR isset($page['img-author_url']), function (ImageObject $schema) use ($page) {
                $schema->author(
                    Schema::person()
                        ->name(e($page['img-author']))
                        ->sameAs(e($page['img-author_url']))
                );
            })
            ->license(e($page['img-license']))
            ->acquireLicensePage(e($page['img-license_url']))
            ->usageInfo(e($page['img-license_url']))
            ->if( isset($page['img-source_url']) OR isset($page['img-source']), function (ImageObject $schema) use ($page) {
                $schema->copyrightHolder(
                    Schema::organization()
                        ->name(e($page['img-source']))
                        ->url(e($page['img-source_url']))
                );
            })
            ->toArray();
            unset($JsonLD['@context']);

            return $JsonLD;
    }

    private function getBreadcrumbSchema($allPageData): Type {
        $items[] = Schema::listItem()
            ->position(1)
            ->item(
                Schema::thing()
                    ->identifier(config('app.url'))
                    ->url(config('app.url'))
                    ->name('Farnosť Detva')
            );

        foreach ($allPageData as $i => $page) {
            $items[] = Schema::listItem()
                ->position($i + 2)
                ->item(
                    Schema::thing()
                        ->identifier(e($page['url']))
                        ->url(e($page['url']))
                        ->name(e($page['title']))
                );
        }

        return Schema::breadcrumbList()
            ->numberOfItems(count($items))
            ->itemListElement(
                $items
            );
    }
}
