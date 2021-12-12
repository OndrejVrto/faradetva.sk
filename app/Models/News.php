<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\File;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
	use SoftDeletes;

	// LINK THIS MODEL TO OUR DATABASE TABLE
	protected $table = 'news';

	/**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
		'category_id',
		'tags',
		'title',
		'content'
    ];

	public function setTitleAttribute($value) {

		$this->attributes['title'] = $value;
		$this->attributes['slug'] = Str::slug( $value );
		// $this->attributes['user_id'] = Auth::user()->id;

	}

	public function getTeaserAttribute(){

		return Str::words($this->content, 30, '...');
	}

	public function getCreatedAttribute(){

		return $this->created_at->format("j. M Y");
	}

    /**
     * Get the user write this news.
     */
    public function user(){

        return $this->belongsTo(User::class);
    }

    /**
     * Get the category this news.
     */
    public function category(){

        return $this->belongsTo(Category::class);
    }

    /**
     * The Tags that belong to the News.
     */
	public function tags(){

        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get all the news's file's
     */
    public function file()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
