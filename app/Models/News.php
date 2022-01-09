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
        'user_id',
        'published_at',
        'unpublished_at',
        'category_id',
        'title',
        'content'
    ];

    public function getTeaserAttribute()
    {
        return Str::words($this->content, 30, '...');
    }

    public function getTeaserLightAttribute()
    {
        return Str::words($this->content, 7, '...');
    }

    public function getMediaFileNameAttribute()
    {
        return $this->getFirstMedia('news_front_picture')->file_name ?? null;
    }

    public function getCreatedAttribute()
    {
        return $this->created_at->format("d. M Y");
    }

    public function getUpdatedAttribute()
    {
        return $this->updated_at->format("d. M Y");
    }

    public function getPublishedAtAttribute($value)
    {

        return is_null($value) ? null : date('d.m.Y G:i', strtotime($value));
    }

    public function getUnpublishedAtAttribute($value)
    {
        return is_null($value) ? null : date('d.m.Y G:i', strtotime($value));
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

        $this->addMediaConversion('thumb-latest-news')
            ->fit("crop", 80, 80);

        $this->addMediaConversion('thumb-all-news')
            ->fit("crop", 370, 248);

        $this->addMediaConversion('crop-thumb')
            ->fit("crop", 170, 92);

    }

}
