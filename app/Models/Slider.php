<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Traits\CreatedUpdatedBy;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Slider extends Model implements HasMedia
{

    use HasFactory;
	use SoftDeletes;
	use InteractsWithMedia;
	use CreatedUpdatedBy;


	protected $fillable = [
		'active',
		'heading_1',
		'heading_2',
		'heading_3',
	];


	public function getMediaFileNameAttribute()
	{
		return $this->getFirstMedia('slider')->file_name ?? null;
	}


	public function registerMediaConversions( Media $media = null ) : void
	{
		$this->addMediaConversion('extra-large')
			->fit("crop", 1920, 800)	// 1200px and up
			->optimize();
		$this->addMediaConversion('large')
			->fit("crop", 1440, 600)	// 992px to 1200px
			->optimize();
		$this->addMediaConversion('medium')
			->fit("crop", 1200, 500)	// 768px to 992px
			->optimize();
		$this->addMediaConversion('small')
			->fit("crop", 960, 400)		// 576px to 768px
			->optimize();
		$this->addMediaConversion('extra-small')
			->fit("crop", 720, 300)		// less than 576px
			->optimize();

		$this->addMediaConversion('crop-thumb')
			->fit("crop", 192, 80);
	}


	public function getFullHeadingAttribute()
	{
		return $this->fullHeading();
	}


	public function getTeaserAttribute()
	{
		return Str::words($this->fullHeading(), 30, '...');
	}


	public function getBreadcrumbTeaserAttribute()
	{
		return Str::words($this->fullHeading(), 6, '...');
	}


	private function fullHeading()
	{
		return 	$this->heading_1
				. ' '
				.$this->heading_2
				. ' '
				.$this->heading_3;
	}


}
