<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chart extends Model
{
    use HasFactory;

    protected $table = 'charts';

    protected $fillable = [
        'title',
        'description',
        'name_x_axis',
        'name_y_axis',
        'type_chart',
        'color',
    ];
}
