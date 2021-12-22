<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Priest extends Model  // implements HasMedia
{
    use HasFactory;
	use SoftDeletes;
	// use InteractsWithMedia;


	protected $fillable = [
		'active',
		'titles_before',
		'first_name',
		'last_name',
		'titles_after',
		'slug',
		'function',
		'description',
		// 'working_history',
	];


	protected static function boot() {
		parent::boot();

		static::creating(function ($priest) {
			$priest->slug = Str::slug( $priest->getFullNameWithTitles() );
			// add other column as well
		});

		static::updating(function ($priest) {
			$priest->slug = Str::slug( $priest->getFullNameWithTitles() );
			 // add other column as well
		});

	}


	public function getFullNameTitlesAttribute ()
	{
		return $this->getFullNameWithTitles();
	}


	public function getFullNameAttribute ()
	{
		return $this->getFullName();
	}


	private function getFullNameWithTitles()
	{
		$name = isset($this->titles_before) ? $this->titles_before . ' ' : '';
		$name .= $this->first_name . ' ' . $this->last_name;
		$name .= isset($this->titles_after) ? ', ' . $this->titles_after : '';

		return trim($name);
	}


	private function getFullName()
	{
		return $this->first_name . ' ' . $this->last_name;
	}
}

