<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Traits\SlugFromTitle;
use App\Traits\CreatedUpdatedBy;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class News extends Model implements HasMedia
{

    use HasFactory;
	use SoftDeletes;
	use CreatedUpdatedBy;
	use SlugFromTitle;
	use InteractsWithMedia;

	// LINK THIS MODEL TO OUR DATABASE TABLE
	protected $table = 'news';


    protected $fillable = [
		'active',
		'published_at',
		'unpublished_at',
		'category_id',
		'title',
		'content'
    ];


	// public static function boot()
    // {
	// 	// parent::boot();
    //     // updating user_id  when model is created
    //     // static::creating(function ($model) {
    //     //     if (!$model->isDirty('user_id')) {
    //     //         $model->user_id = auth()->user()->id;
    //     //     }
    //     // });
    // }


	public function getTeaserAttribute()
	{
		return Str::words($this->content, 30, '...');
	}


	public function getCreatedAttribute()
	{
		return $this->created_at->format("j. M Y");
	}


	public function setPublishedAtAttribute()
	{
		return strtotime($this->published_at);
	}


	public function setUnpublishedAtAttribute()
	{
		return strtotime($this->unpublished_at);
	}


	public function user()
	{
        return $this->belongsTo(User::class);
    }


    public function category()
	{
        return $this->belongsTo(Category::class);
    }


	public function tags()
	{
        return $this->belongsToMany(Tag::class);
    }


	public function registerMediaConversions( Media $media = null ) : void
	{
		$this->addMediaConversion('large')
			->fit("crop", 848, 460)
			->optimize()
			->withResponsiveImages();

		$this->addMediaConversion('crop-thumb')
			->fit("crop", 170, 92);
	}


}
