<?php declare(strict_types=1);

namespace App\Services;

use Carbon\Carbon;
use App\Models\News;
use App\Enums\PageType;
use App\Models\StaticPage;
use Illuminate\Support\Str;
use App\DataTransferObjects\PageData;
use Illuminate\Support\Facades\Cache;
use App\DataTransferObjects\SourceData;
use App\DataTransferObjects\PageArticleData;
use App\DataTransferObjects\AuthorArticleData;
use App\DataTransferObjects\RepresentingImageData;

final class PagePropertiesService {
    public static function virtualPageData(string $route): ?PageData {
        $page = Cache::rememberForever(
            key: 'PAGE_VIRTUAL_'.Str::slug($route),
            callback: fn () => StaticPage::query()
                ->where('route_name', $route)
                ->with('picture', 'source', 'banners', 'faqs')
                ->first()
        );

        if (!$page) {
            return null;
        }

        // counter of visits page
        visits($page)->increment();

        return self::getStaticPageData($page, null);
    }

    /** create full route name **/
    public static function fullRoute(string $route_name): string {
        $route = config('farnost-detva.preppend_route_static_pages', 'web.custom') . '.' . $route_name;

        return Str::startsWith($route, '.')
                    ? substr($route, 1)
                    : $route;
    }

    public static function getStaticPageData(StaticPage $page, ?string $breadCrumb): PageData {
        return new PageData(
            id:             $page->id,
            isActive:       $page->active,
            isVirtual:      $page->virtual,
            title:          e($page->title),
            slug:           e($page->slug),
            url:            e($page->full_url),
            description:    e($page->description_page),
            keywords:       e($page->keywords),
            header:         e($page->header),
            teaser:         e($page->teaser),
            route:          e(self::fullRoute($page->route_name)),
            type:           $page->type_page,
            author:         e($page->author_page),
            wikipedia:      e($page->wikipedia),
            datePublished:  $page->created_at,
            dateModified:   $page->updated_at,
            banners:        $page->banners->pluck('slug')->toArray(),
            faqs:           $page->faqs->pluck('slug')->toArray(),
            image:          self::getImageData($page),
            breadCrumb:     $breadCrumb,
        );
    }

    private static function getImageData(StaticPage $page): RepresentingImageData {
        $media = $page->picture[0] ?? null;

        if (null !== $media) {
            return new RepresentingImageData(
                url:        $media->getUrl('representing'),
                urlThumb:   $media->getUrl('representing-thumb'),
                fileName:   pathinfo((string) $media->file_name, PATHINFO_FILENAME),
                mimeType:   $media->mime_type,
                size:       $media->size,
                width:      960,
                height:     480,
                updated_at: $media->updated_at,
                source:     new SourceData(
                    description:    empty(e($page->source?->source_description)) ? 'Bez popisu' : e($page->source->source_description),
                    source:         e($page->source?->source_source),
                    sourceUrl:      e($page->source?->source_source_url),
                    author:         e($page->source?->source_author),
                    authorUrl:      e($page->source?->source_author_url),
                    license:        e($page->source?->source_license),
                    licenseUrl:     e($page->source?->source_license_url),
                ),
            );
        } else {
            //TODO: delete this example picture after develoop
            return new RepresentingImageData(
                url:        'http://via.placeholder.com/960x480',
                urlThumb:   'http://via.placeholder.com/256x256',
                fileName:   'placeholder_960x480.jpg',
                mimeType:   'image/png',
                size:       15,
                width:      960,
                height:     480,
                updated_at: now(),
                source:     new SourceData(
                    description:'example picture description',
                    source:     'example source',
                    sourceUrl:  'http://source.example.com',
                    author:     'example author',
                    authorUrl:  'http://author.example.com',
                    license:    'example license',
                    licenseUrl: 'http://license.example.com',
                ),
            );
        }
    }

    public static function getArticlePageData(News $news): PageArticleData {
        $newsMedia = $news->getFirstMedia('front_picture');

        $image = new RepresentingImageData(
            url:        $newsMedia->getUrl('large'),
            urlThumb:   $newsMedia->getUrl('small'),
            fileName:   pathinfo((string) $newsMedia->file_name, PATHINFO_FILENAME),
            mimeType:   $newsMedia->mime_type,
            size:       $newsMedia->size,
            width:      700,
            height:     400,
            updated_at: $newsMedia->updated_at,
            source:     new SourceData(
                description: empty($news->source?->source_description) ? 'Bez popisu' : e($news->source->source_description),
                source:      e($news->source?->source_source),
                sourceUrl:   e($news->source?->source_source_url),
                author:      e($news->source?->source_author),
                authorUrl:   e($news->source?->source_author_url),
                license:     e($news->source?->source_license),
                licenseUrl:  e($news->source?->source_license_url)
            ),
        );

        $author = new AuthorArticleData(
            name:         e($news->user?->name),
            slug:         $news->user?->slug,
            email:        e($news->user?->email),
            phone:        e($news->user?->phone),
            wwwPageUrl:   e($news->user?->www_page_url),
            twitterUrl:   e($news->user?->twitter_url),
            facebookUrl:  e($news->user?->facebook_url),
        );

        $keywords =
            $news->title
            .', '
            .$news->category?->title
            .', '
            .$news->tags->pluck('title')->implode(', ')
            .', '
            .'Detva, farnosť, aktuality, zamyslenia, článok';

        return new PageArticleData(
            id:             $news->id,
            url:            route('article.show', $news->slug),
            type:           PageType::ARTICLE,
            slug:           e($news->slug),
            title:          e($news->title),
            teaser:         e($news->teaser),
            keywords:       e($keywords),
            category:       e($news->category?->title),
            countWords:     $news->count_words,
            description:    e($news->teaser),
            contentPlain:   e($news->content_plain),
            wikipedia:      null,
            dateExpires:    (new self)->handleDate(
                                object        : $news,
                                propertyOfData: "unpublished_at",
                                defaultDate   : null,
                            ),
            dateModified:   $news->updated_at,
            datePublished:  (new self)->handleDate(
                                object        : $news,
                                propertyOfData: "published_at",
                                defaultDate   : $news->created_at,
                            ),
            tags:   $news->tags->pluck('title')->implode(', '),
            author: $author,
            image:  $image,
        );
    }

    private function handleDate(object|string $object, string $propertyOfData , Carbon|null $defaultDate = null): ?Carbon {
        if (!property_exists($object, $propertyOfData)
            || $object->{$propertyOfData} === null
            || $object->{$propertyOfData} === false
        ) {
            return $defaultDate;
        }

        $date = Carbon::createFromFormat('d.m.Y G:i', $object->{$propertyOfData});

        return $date ?: $defaultDate;
    }
}
