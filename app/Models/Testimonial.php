<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Testimonial
 *
 * @property int $id
 * @property int $active
 * @property string $name
 * @property string $slug
 * @property string|null $function
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $media_file_name
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial newQuery()
 * @method static \Illuminate\Database\Query\Builder|Testimonial onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial query()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereFunction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Testimonial withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Testimonial withoutTrashed()
 * @mixin \Eloquent
 */
class Testimonial extends Model implements HasMedia
{
    use HasFactory;
	use SoftDeletes;
	use InteractsWithMedia;


	protected $fillable = [
		'active',
		'name',
		'slug',
		'phone',
		'function',
		'description',
	];


	protected static function boot() {
		parent::boot();

		static::creating(function ($testimonial) {
			$testimonial->slug = Str::slug( $testimonial->name );
		});

		static::updating(function ($testimonial) {
			$testimonial->slug = Str::slug( $testimonial->name );
		});

	}

	public function registerMediaConversions( Media $media = null ) : void
	{
		$this->addMediaConversion('crop')
			->fit("crop", 100, 100);

		$this->addMediaConversion('crop-thumb')
			->fit("crop", 60, 60);
	}

	public function getMediaFileNameAttribute()
	{
		return $this->getFirstMedia('testimonial')->file_name ?? null;
	}

}


