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


	public function registerMediaConversions( Media $media = null ) : void
	{
		$this->addMediaConversion('crop')
			->fit("crop", 1920, 800)
			->optimize()
			->withResponsiveImages();

		$this->addMediaConversion('crop-thumb')
			->fit("crop", 240, 100);
	}


	public function getFullHeadingAttribute()
	{
		return $this->fullHeading();
	}


	public function getTeaserAttribute()
	{
		return Str::words($this->fullHeading(), 30, '...');
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
