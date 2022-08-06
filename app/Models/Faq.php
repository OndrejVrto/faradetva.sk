<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Faq extends BaseModel {
    protected $table = 'faqs';

    protected $fillable = [
        'question',
        'slug',
        'answer',
        'order',
    ];

    protected array $cast = [
        'order' => 'integer'
    ];

    public function staticPages(): BelongsToMany {
        return $this->belongsToMany(StaticPage::class, 'static_page_faq', 'faq_id', 'static_page_id');
    }
}
