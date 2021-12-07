<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
	use SoftDeletes;
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
     * The News that belong to the Tags.
     */
	public function news()
    {
        return $this->belongsToMany(News::class);
    }
}
