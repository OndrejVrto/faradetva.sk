<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NewsTag
 *
 * @property int $id
 * @property int $news_id
 * @property int $tag_id
 * @method static \Database\Factories\NewsTagFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTag whereNewsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsTag whereTagId($value)
 * @mixin \Eloquent
 */
class NewsTag extends Model
{
    use HasFactory;

	protected $table = 'news_tag';

	public $timestamps = false;

    protected $fillable = [
		'news_id',
		'tag_id'
	];

}
