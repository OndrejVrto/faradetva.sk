<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\ChartData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chart extends Model
{
    use Loggable;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'charts';

    protected $fillable = [
        'active',
        'title',
        'description',
        'slug',
        'name_x_axis',
        'name_y_axis',
        'type_chart',
        'color',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function data() {
        return $this->hasMany(ChartData::class)->orderBy('key');
    }
}
