<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\Chart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChartData extends Model
{
    use HasFactory;

    protected $table = 'chart_data';

    protected $fillable = [
        'chart_id',
        'key',
        'value',
    ];

    public function chart() {
        return $this->belongsTo(Chart::class, 'chart_id');
    }
}
