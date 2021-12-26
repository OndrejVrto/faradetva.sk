<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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


