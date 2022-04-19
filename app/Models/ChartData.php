<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\Chart;
use App\Models\BaseModel;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChartData extends BaseModel
{
    use Loggable;
    use HasFactory;

    protected $table = 'chart_data';

    protected $fillable = [
        'chart_id',
        'key',
        'value',
    ];

    public function getRouteKeyName() {
        return 'id';
    }

    public function chart() {
        return $this->belongsTo(Chart::class, 'chart_id');
    }
}
