<?php

namespace App\Models;

use App\Http\Helpers\DataFormater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\File
 *
 * @property int $id
 * @property string $fileable_type
 * @property int $fileable_id
 * @property string $name
 * @property string $filename
 * @property string|null $description
 * @property string $path
 * @property string $mime
 * @property string $ext
 * @property int $size_file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read Model|\Eloquent $fileable
 * @property-read mixed $absolute_path
 * @property-read string $size_file_human
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Query\Builder|File onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereMime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereSizeFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|File withTrashed()
 * @method static \Illuminate\Database\Query\Builder|File withoutTrashed()
 * @mixin \Eloquent
 */
class File extends Model
{
    use HasFactory;
    use SoftDeletes;
	// use DataFormater;

    // LINK THIS MODEL TO OUR DATABASE TABLE
    protected $table = 'files';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'fileable_id',
        'fileable_type',
        'name',
        'filename',
        'description',
        'path',
        'mime',
        'ext',
        'size_file'
    ];


    /**
     * Get the parent fileable model (user or news or another).
     */
    public function fileable()
    {
        return $this->morphTo();
    }

	public function getAbsolutePathAttribute(){

		return asset(Storage::url($this->path . $this->filename));

	}

	public function getSizeFileHumanAttribute(): string
	{

		return DataFormater::formatBytes( $this->size_file );

	}

}
