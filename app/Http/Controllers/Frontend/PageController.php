<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use Spatie\Image\Image;
use App\Models\StaticPage;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\SchemaOrg\Schema;
use Illuminate\Http\Response;
use Spatie\SchemaOrg\ImageObject;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\Cache;
use Artesaos\SEOTools\Facades\SEOMeta;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
// use Artesaos\SEOTools\Facades\JsonLdMulti;

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
        return Cache::rememberForever('PAGE_' . Str::slug(Str::replace('/', '-', $path)), function () use($path): array|null {
            return StaticPage::whereUrl($path)->with('picture', 'source', 'banners', 'faqs')->get()->map(function($page): array {
                $media = $page->picture[0];
                return  [
                    'id'              => $page->id,
                    'author'          => $page->author_page,
                    'description'     => $page->description_page,
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
                    'img-file-name'   => $media->file_name,
                    'img-mime-type'   => $media->mime_type,
                    'img-size'        => $media->size,
                    'img-updated_at'  => $media->updated_at,
                    'img-height'      => Image::load( $media->getPath('optimize') )->getHeight(),
                    'img-width'       => Image::load( $media->getPath('optimize') )->getWidth(),
                    'img-description' => $page->source->description,
                    'img-source'      => $page->source->source,
                    'img-source_url'  => $page->source->source_url,
                    'img-author'      => $page->source->author,
                    'img-author_url'  => $page->source->author_url,
                    'img-license'     => $page->source->license,
                    'img-license_url' => $page->source->license_url,
                ];
            })->first();
        });
    }

    /** create full route name **/
    private function getFullRoute(string $route_name): string {
        $route = config('farnost-detva.preppend_route_static_pages','frontend') . '.' . $route_name;
        return (! Str::startsWith($route, '.')) ? $route : substr($route, 1);
    }

    private function setSeoMetaTags(array $allPageData): void {

        $page = last($allPageData);

        SEOMeta::setTitle($page['title']);
        SEOMeta::setDescription($page['description']);
        SEOMeta::addKeyword($page['keywords']);
        SEOMeta::addMeta('author', $page['author'], 'name');

        OpenGraph::setDescription($page['description']);
        OpenGraph::setTitle($page['title']);
        OpenGraph::addImage($page['img-facebook'], [
            'alt' => $page['description'],
            'type' => $page['img-mime-type'],
            'width' => $page['img-width'],
            'height' => $page['img-height'],
        ]);

        TwitterCard::setTitle($page['title']);
        TwitterCard::setDescription($page['description']);
        TwitterCard::setImage($page['img-twitter']);
        TwitterCard::addValue('image:alt', $page['img-description']);

        // JsonLd::setType('xxx');  //TODO: Typ seo page
        JsonLd::setTitle($page['title']);
        JsonLd::setDescription($page['description']);
        JsonLd::addValue('sameAs', $page['wikipedia']);
        JsonLd::addValue('keywords', $page['keywords']);
        JsonLd::addValue('potentialAction', $this->getSearchAction($page) );
        JsonLd::addValue('breadcrumb', $this->getBreadcrumbJsonLD($allPageData));
        JsonLd::addValue('primaryImageOfPage', $this->getPrimaryImagePage($page) );
    }

    private function getSearchAction(): array {
        $JsonLD = Schema::searchAction()
            ->target(
                Schema::entryPoint()
                    ->urlTemplate(config('app.url')."/hladat/{search_term_string}")
            )
            ->setProperty('query-input', 'required name=search_term_string')
            ->toArray();
            unset($JsonLD['@context']);

            return $JsonLD;
    }

    private function getPrimaryImagePage($page): array {
        $JsonLD = Schema::imageObject()
            ->url($page['img-optimize'])
            ->thumbnailUrl($page['img-thumb'])
            ->name($page['img-file-name'])
            ->description($page['img-description'])
            ->alternateName($page['img-description'])
            ->encodingFormat($page['img-mime-type'])
            ->height($page['img-height'])
            ->width($page['img-width'])
            ->uploadDate($page['img-updated_at'])
            ->if(isset($page['img-author']) OR isset($page['img-author_url']), function (ImageObject $schema) use ($page) {
                $schema->author(
                    Schema::person()
                        ->name($page['img-author'])
                        ->sameAs($page['img-author_url'])
                );
            })
            ->license($page['img-license'])
            ->usageInfo($page['img-license_url'])
            ->if( isset($page['img-source_url']) OR isset($page['img-source']), function (ImageObject $schema) use ($page) {
                $schema->copyrightHolder(
                    Schema::organization()
                        ->name($page['img-source'])
                        ->url($page['img-source_url'])
                );
            })
            ->toArray();
            unset($JsonLD['@context']);

            return $JsonLD;
    }

    private function getBreadcrumbJsonLD($allPageData): array {
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
                        ->identifier($page['url'])
                        ->url($page['url'])
                        ->name($page['title'])
                );
        }

        $JsonLD = Schema::breadcrumbList()
            ->numberOfItems(count($items))
            ->itemListElement(
                $items
            )
            ->toArray();
            unset($JsonLD['@context']);

        return $JsonLD;

    }
}
