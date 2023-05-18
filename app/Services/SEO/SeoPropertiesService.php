<?php declare(strict_types=1);

namespace App\Services\SEO;

use App\Facades\SeoSchema;
use Spatie\SchemaOrg\Schema;
use Spatie\SchemaOrg\ImageObject;
use Spatie\SchemaOrg\ImageGallery;
use Illuminate\Support\Collection;

// TODO: Refactor this mess
class SeoPropertiesService {
    public function setFaqSeoMetaTags(array|Collection $faqData): void {
        $JsonLD = Schema::fAQPage()
            ->mainEntity($this->setFaqQuestions($faqData))
            ->toArray();
        unset($JsonLD['@context']);

        if (SeoSchema::hasValue('hasPart')) {
            SeoSchema::addValue('hasPart', [SeoSchema::getValue('hasPart'), $JsonLD]);
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
            ->if(isset($pictureData['sourceArr']['source_author']) || isset($pictureData['sourceArr']['source_author_url']), function (ImageObject $schema) use ($pictureData): void {
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
            ->if(isset($album['sourceArr']['source_author']) || isset($album['sourceArr']['author_url']), function (imageGallery $schema) use ($album): void {
                $schema->author(
                    Schema::person()
                        ->name(e($album['sourceArr']['source_author']))
                        ->sameAs(e($album['sourceArr']['source_author_url']))
                );
            })
            ->license(e($album['sourceArr']['source_license_url']))
            ->acquireLicensePage(e($album['sourceArr']['source_license_url']))
            ->if(isset($album['sourceArr']['source_source_url']) || isset($album['sourceArr']['source_source']), function (ImageGallery $schema) use ($album): void {
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
            SeoSchema::addValue('hasPart', [SeoSchema::getValue('hasPart'), $JsonLD]);
        } else {
            SeoSchema::addValue('hasPart', [$JsonLD]);
        }
    }

    public function setPriestsSchema(array $priestData): void {
        $persons = [];
        foreach ($priestData as $priest) {
            $value = Schema::person()
                ->name(e($priest['full_name_titles']))
                ->givenName(e($priest['first_name']))
                ->familyName(e($priest['last_name']))
                ->honorificPrefix(e($priest['titles_before']))
                ->honorificSuffix(e($priest['titles_after']))
                ->nationality(Schema::country()->name('Slovak'))
                ->if(isset($priest['facebook']) || isset($priest['twitter']), function ($schema) use ($priest): void {
                    $schema->sameAs([
                        $priest['facebook'] ?? '',
                        $priest['twitter'] ?? '',
                    ]);
                })
                ->if(isset($priest['phone']), function ($schema) use ($priest): void {
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
