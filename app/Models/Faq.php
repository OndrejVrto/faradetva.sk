<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\BaseModel;
use App\Models\StaticPage;

class Faq extends BaseModel
{
    protected $table = 'faqs';

    protected $fillable = [
        'question',
        'slug',
        'answer',
        'order',
    ];

    protected $cast = [
        'order' => 'integer',
    ];

    public function staticPages() {
        return $this->belongsToMany(StaticPage::class, 'static_page_faq', 'faq_id', 'static_page_id');
    }
}
