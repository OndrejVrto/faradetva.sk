<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Touhidurabir\ModelSanitize\Sanitizable;

abstract class BaseModel extends Model {
    use Sanitizable;

    public function getRouteKeyName() {
        return 'slug';
    }
}
