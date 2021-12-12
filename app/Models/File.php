<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        'size'
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

}
