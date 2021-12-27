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

/**
 * App\Models\News
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $category_id
 * @property string $title
 * @property string $slug
 * @property mixed $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|File[] $file
 * @property-read int|null $file_count
 * @property-read mixed $created
 * @property-read mixed $model
 * @property-read mixed $teaser
 * @property-read \Illuminate\Database\Eloquent\Collection|Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read User|null $user
 * @method static \Database\Factories\NewsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Query\Builder|News onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|News withTrashed()
 * @method static \Illuminate\Database\Query\Builder|News withoutTrashed()
 * @mixin \Eloquent
 */
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

	public function getModelAttribute (){

		return Str::replace("\\", '-', get_class($this) );

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
