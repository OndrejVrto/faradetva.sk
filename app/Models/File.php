<?php

namespace App\Models;

use App\Http\Helpers\DataFormater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
