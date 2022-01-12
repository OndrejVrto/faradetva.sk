<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\File;
use App\Traits\SlugFromName;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FileType extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SlugFromName;
    use CreatedUpdatedBy;

    protected $table = 'file_types';

    protected $fillable = [
        'name',
        'description',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function files() {
        return $this->hasMany(File::class);
    }
}
