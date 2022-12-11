<?php declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Publishable {
    use Activable;

    public function scopePublished(Builder $query): Builder {
        return $query
                    ->where('published_at', '<=', now())
                    ->orWhereNull('published_at');
    }

    public function scopeUnpublished(Builder $query): Builder {
        return $query
                    ->where('unpublished_at', '>', now())
                    ->orWhereNull('unpublished_at');
    }

    public function scopeVisible(Builder $query): Builder {
        return $query
                    ->activated()
                    ->published()
                    ->unpublished()
                    ->latest();
    }

    public function getVisibleAttribute(): bool {
        return  $this->active
            && ($this->published_at <= now() || is_null($this->published_at))
            && ($this->unpublished_at > now() || is_null($this->unpublished_at));
    }

    public function getPublishedAtAttribute(?string $value): string|false|null {
        return is_null($value) ? null : date('d.m.Y G:i', strtotime($value));
    }

    public function getUnpublishedAtAttribute(?string $value): string|false|null {
        return is_null($value) ? null : date('d.m.Y G:i', strtotime($value));
    }
}
