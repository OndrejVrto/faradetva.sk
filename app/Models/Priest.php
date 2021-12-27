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


/**
 * App\Models\Priest
 *
 * @property int $id
 * @property int $active
 * @property string|null $titles_before
 * @property string $first_name
 * @property string $last_name
 * @property string|null $titles_after
 * @property string $slug
 * @property string|null $phone
 * @property string|null $function
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $full_name
 * @property-read mixed $full_name_titles
 * @property-read mixed $media_file_name
 * @property-read mixed $phone_digits
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Priest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Priest newQuery()
 * @method static \Illuminate\Database\Query\Builder|Priest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Priest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Priest whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priest whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priest whereFunction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priest whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priest wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priest whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priest whereTitlesAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priest whereTitlesBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Priest withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Priest withoutTrashed()
 * @mixin \Eloquent
 */
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

	public function getMediaFileNameAttribute()
	{
		return $this->getFirstMedia('priest')->file_name ?? null;
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

