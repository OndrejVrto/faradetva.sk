<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\File;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Traits\SlugFromTitle;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class News extends Model
{

    use HasFactory;
	use SoftDeletes;
	use CreatedUpdatedBy;
	use SlugFromTitle;

	// LINK THIS MODEL TO OUR DATABASE TABLE
	protected $table = 'news';


    protected $fillable = [
		'category_id',
		'tags',
		'title',
		'content'
    ];


	public function getTeaserAttribute()
	{
		return Str::words($this->content, 30, '...');
	}


	public function getCreatedAttribute()
	{
		return $this->created_at->format("j. M Y");
	}


	public function getModelAttribute ()
	{
		return Str::replace("\\", '-', get_class($this) );
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


}
