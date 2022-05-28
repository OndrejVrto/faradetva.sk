<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Web;

// use Spatie\Image\Image;
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
            ->whereActive(1)
            ->whereUrl($path)
            ->with('picture', 'source', 'banners', 'faqs')
            ->get()
            ->map(function($page): array {
                return $this->getImageData($page) + [
                    'id'               => $page->id,
                    'author'           => $page->author_page,
                    'page-description' => $page->description_page,
                    'header'           => $page->header,
                    'keywords'         => $page->keywords,
                    'route'            => $this->getFullRoute($page->route_name),
                    'slug'             => $page->slug,
                    'teaser'           => $page->teaser,
                    'title'            => $page->title,
                    'url'              => $page->full_url,
                    'wikipedia'        => $page->wikipedia,
                    'banners'          => $page->banners->pluck('slug')->toArray(),
                    'faqs'             => $page->faqs->pluck('slug')->toArray(),
                ];
            })
            ->first();
    }

    /** create full route name **/
    private function getFullRoute(string $route_name): string {
        $route = config('farnost-detva.preppend_route_static_pages','frontend') . '.' . $route_name;

        return Str::startsWith($route, '.')
                    ? substr($route, 1)
                    : $route;
    }


    private function getImageData($page): array {

        if(isset($page->picture[0])){
            $media = $page->picture[0];
            return [
                'img-representing' => $media->getUrl('representing'),
                'img-thumb'        => $media->getUrl('representing-thumb'),
                'img-file-name'    => $media->file_name,
                'img-mime-type'    => $media->mime_type,
                'img-size'         => $media->size,
                'img-updated_at'   => $media->updated_at,
                'img-width'        => '960',
                'img-height'       => '480',
                // 'img-width'        => Image::load( $media->getPath('representing') )->getWidth(),
                // 'img-height'       => Image::load( $media->getPath('representing') )->getHeight(),
                'img-description'  => $page->source->source_description,
                'img-source'       => $page->source->source_source,
                'img-source_url'   => $page->source->source_source_url,
                'img-author'       => $page->source->source_author,
                'img-author_url'   => $page->source->source_author_url,
                'img-license'      => $page->source->source_license,
                'img-license_url'  => $page->source->source_license_url,
            ];
        } else {
            return [
                'img-representing' => 'http://via.placeholder.com/960x480',
                'img-thumb'        => 'http://via.placeholder.com/256x256',
                'img-file-name'    => 'placeholder_960x480.jpg',
                'img-mime-type'    => 'image/png',
                'img-size'         => '15',
                'img-updated_at'   => '2021-01-01 23:59:59',
                'img-width'        => '960',
                'img-height'       => '480',
                'img-description'  => 'example picture description',
                'img-source'       => 'example source',
                'img-source_url'   => 'http://source.example.com',
                'img-author'       => 'example author',
                'img-author_url'   => 'http://author.example.com',
                'img-license'      => 'example license',
                'img-license_url'  => 'http://license.example.com',
            ];
        }
    }

//! SEO Section  TODO: Move to service


    private function setSeoMetaTags(array $allPageData): void {

        $page = last($allPageData);

        SEOMeta::setTitle(e($page['title']));
        SEOMeta::setDescription(e($page['page-description']));
        SEOMeta::addKeyword(e($page['keywords']));
        SEOMeta::addMeta('author', e($page['author']), 'name');

        OpenGraph::setDescription(e($page['page-description']));
        OpenGraph::setTitle(e($page['title']));
        OpenGraph::addImage(e($page['img-representing']), [
            'alt' => e($page['img-description']),
            'type' => e($page['img-mime-type']),
            'width' => e($page['img-width']),
            'height' => e($page['img-height']),
        ]);

        TwitterCard::setTitle(e($page['title']));
        TwitterCard::setDescription(e($page['page-description']));
        TwitterCard::setImage(e($page['img-representing']));
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

    private function getPrimaryImagePageSchema($page): array {
        $JsonLD = Schema::imageObject()
            ->url(e($page['img-representing']))
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
