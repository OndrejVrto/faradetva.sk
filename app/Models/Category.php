<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
	use SoftDeletes;

	// LINK THIS MODEL TO OUR DATABASE TABLE
	protected $table = 'categories';

	/**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
		'description'
    ];

	public function setTitleAttribute($value) {

		$this->attributes['title'] = $value;
		$this->attributes['slug'] = Str::slug( $value ) ;

	}

    /**
     * Get the News for the Category.
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }
}
