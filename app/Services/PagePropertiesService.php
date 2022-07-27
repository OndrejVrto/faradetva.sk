<?php

namespace App\Services;

use App\Models\News;
use App\Models\StaticPage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class PagePropertiesService
{

    public static function virtualPageData(string $route): ?array {

        $page = Cache::rememberForever('PAGE_VIRTUAL_'.Str::slug($route), function () use($route) {
            return StaticPage::query()
                ->where('route_name', $route)
                ->with('picture', 'source', 'banners', 'faqs')
                ->first();
        });

        if (!$page) {
            return null;
        }

        return self::getStaticPageData($page);
    }

    /** create full route name **/
    public static function fullRoute(string $route_name): string {
        $route = config('farnost-detva.preppend_route_static_pages','web.custom') . '.' . $route_name;

        return Str::startsWith($route, '.')
                    ? substr($route, 1)
                    : $route;
    }

    public static function getStaticPageData(StaticPage $page): array {
        return self::getImageData($page) + [
            'id'               => $page->id,
            'active'           => $page->active,
            'virtual'          => $page->virtual,
            'type_page'        => $page->type_page->type(),
            'author'           => e($page->author_page),
            'page-description' => e($page->description_page),
            'header'           => e($page->header),
            'keywords'         => e($page->keywords),
            'route'            => e(self::fullRoute($page->route_name)),
            'slug'             => e($page->slug),
            'teaser'           => e($page->teaser),
            'title'            => e($page->title),
            'url'              => e($page->full_url),
            'wikipedia'        => e($page->wikipedia),
            'banners'          => $page->banners->pluck('slug')->toArray(),
            'faqs'             => $page->faqs->pluck('slug')->toArray(),
            'datePublished'    => $page->created_at->toAtomString(),
            'dateModified'     => $page->updated_at->toAtomString(),
        ];
    }

    private static function getImageData($page): array {
        // TODO: delete example picture after develoop
        if(isset($page->picture[0])){
            $media = $page->picture[0];
            return [
                'img-representing' => $media->getUrl('representing'),
                'img-thumb'        => $media->getUrl('representing-thumb'),
                // 'img-file-name'    => $media->file_name,
                'img-file-name'    => pathinfo($media->file_name, PATHINFO_FILENAME),
                'img-mime-type'    => $media->mime_type,
                'img-size'         => $media->size,
                'img-updated_at'   => $media->updated_at->toAtomString(),
                'img-width'        => '960',
                'img-height'       => '480',
                // 'img-width'        => Image::load( $media->getPath('representing') )->getWidth(),
                // 'img-height'       => Image::load( $media->getPath('representing') )->getHeight(),
                'img-description'  => e($page->source->source_description),
                'img-source'       => e($page->source->source_source),
                'img-source_url'   => e($page->source->source_source_url),
                'img-author'       => e($page->source->source_author),
                'img-author_url'   => e($page->source->source_author_url),
                'img-license'      => e($page->source->source_license),
                'img-license_url'  => e($page->source->source_license_url),
            ];
        } else {
            return [
                'img-representing' => 'http://via.placeholder.com/960x480',
                'img-thumb'        => 'http://via.placeholder.com/256x256',
                'img-file-name'    => 'placeholder_960x480.jpg',
                'img-mime-type'    => 'image/png',
                'img-size'         => '15',
                'img-updated_at'   => '022-06-05T17:06:30+02:00',
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

    public static function getArticlePageData(News $page): array {
        $media = $page->getFirstMedia('front_picture');

        return [
            'id'               => $page->id,
            'type_page'        => 'NewsArticle',
            'teaser'           => e($page->teaser),
            'content-plain'    => e($page->content_plain),
            'count-words'      => $page->count_words,
            'category'         => e($page->category->title),
            'tags'             => $page->tags->pluck('title')->implode(', '),

            'datePublished'    => isset($page->published_at) ? $page->published_at->toAtomString() : $page->created_at->toAtomString(),
            'dateModified'     => $page->updated_at->toAtomString(),
            'expires'          => isset($page->unpublished_at) ? $page->unpublished_at->toAtomString() : null,

            'author'           => e($page->user->name),
            'author-slug'      => $page->user->slug,
            'author-email'     => e($page->user->email),
            'author-www'       => e($page->user->www_page_url),
            'author-twitter'   => e($page->user->twitter_url),
            'author-facebook'  => e($page->user->facebook_url),
            'author-phone'     => e($page->user->phone),

            'slug'             => e($page->slug),
            'title'            => e($page->title),
            'page-description' => e($page->teaser),
            'keywords'         => e($page->title.', '.$page->category->title.', '.$page->tags->pluck('title')->implode(', ').', Detva, farnosť, aktuality, zamyslenia, článok'),
            'wikipedia'        => null,

            'url'              => route('article.show', $page->slug),

            'img-representing' => $media->getUrl('large'),
            'img-thumb'        => $media->getUrl('small'),
            'img-file-name'    => $media->file_name,
            'img-mime-type'    => $media->mime_type,
            'img-size'         => $media->size,
            'img-updated_at'   => $media->updated_at->toAtomString(),
            'img-width'        => '700',
            'img-height'       => '400',
            'img-description'  => e($page->source->source_description),
            'img-source'       => e($page->source->source_source),
            'img-source_url'   => e($page->source->source_source_url),
            'img-author'       => e($page->source->source_author),
            'img-author_url'   => e($page->source->source_author_url),
            'img-license'      => e($page->source->source_license),
            'img-license_url'  => e($page->source->source_license_url),
        ];
    }
}
