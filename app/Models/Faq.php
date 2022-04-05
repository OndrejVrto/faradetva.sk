<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\StaticPage;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';

    protected $fillable = [
        'question',
        'slug',
        'answer',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function staticPages() {
        return $this->belongsToMany(StaticPage::class, 'static_page_faq', 'faq_id', 'static_page_id');
    }
}
