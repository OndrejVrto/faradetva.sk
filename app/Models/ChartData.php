<?php declare(strict_types=1);

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChartData extends BaseModel {
    use Loggable;
    use HasFactory;

    protected $table = 'chart_data';

    protected $fillable = [
        'chart_id',
        'key',
        'value',
        'color',
    ];

    public function getRouteKeyName(): string {
        return 'id';
    }

    public function chart(): BelongsTo {
        return $this->belongsTo(Chart::class, 'chart_id');
    }
}
