<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use phpDocumentor\Reflection\Types\Void_;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;


class Priest extends Model implements HasMedia
{
    use HasFactory;
	use SoftDeletes;
	use InteractsWithMedia;


	protected $fillable = [
		'active',
		'titles_before',
		'first_name',
		'last_name',
		'titles_after',
		'slug',
		'phone',
		'function',
		'description',
	];


	protected static function boot() {
		parent::boot();

		static::creating(function ($priest) {
			$priest->slug = Str::slug( $priest->getFullNameWithTitles() );
		});

		static::updating(function ($priest) {
			$priest->slug = Str::slug( $priest->getFullNameWithTitles() );
		});

	}

	public function registerMediaConversions( Media $media = null ) : void
	{
		$this->addMediaConversion('crop')
			->fit("crop", 230, 270);

		$this->addMediaConversion('crop-thumb')
			->fit("crop", 60, 80);
	}

	public function getFullNameTitlesAttribute ()
	{
		return $this->getFullNameWithTitles();
	}


	public function getPhoneDigitsAttribute ()
	{
		$remove_plus = preg_replace("/^\+/", "00", $this->phone );
		return preg_replace("/[^0-9]/", "", $remove_plus );
	}

	public function getFullNameAttribute ()
	{
		return $this->getFullName();
	}


	private function getFullNameWithTitles()
	{
		$name = isset($this->titles_before) ? $this->titles_before . ' ' : '';
		$name .= $this->getFullName();
		$name .= isset($this->titles_after) ? ', ' . $this->titles_after : '';

		return trim($name);
	}


	private function getFullName()
	{
		return $this->first_name . ' ' . $this->last_name;
	}
}

