<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\News;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


//! Home
Breadcrumbs::for('web.home', function (BreadcrumbTrail $trail) {
    $trail->push('Domov', route('home'));
});

//! All Static Pages
Breadcrumbs::for('pages.others', function (BreadcrumbTrail $trail, array $pagesUrl) {
    $trail->parent('web.home');
    foreach ($pagesUrl as $page) {
        $trail->push($page['title'], $page['url']);
    }
});

Breadcrumbs::for('article.show', function (BreadcrumbTrail $trail, News $news) {
    $trail->parent('web.home');
    $trail->push('Všetky články', route('article.all'));
    $trail->push($news->created_string, route('article.date', $news->created_string));
    $trail->push($news->title, route('article.show', $news));
});

Breadcrumbs::macro('articles', function (string $name, string $title) {
    Breadcrumbs::for("articles.{$name}", function (BreadcrumbTrail $trail, string|null $slug = null, string|null $keyValue = null) use ($name, $title) {
        $trail->parent('web.home');
        if (isset($keyValue)) {
            $trail->push($title, route("article.{$name}", $slug));
            $trail->push($keyValue);
        } else {
            $trail->push($title, route("article.{$name}"));
        }
    });
});

Breadcrumbs::articles('all', 'Všetky články');
Breadcrumbs::articles('author', 'Všetky články autora');
Breadcrumbs::articles('category', 'Články z kategórie');
Breadcrumbs::articles('date', 'Všetky z roku');
Breadcrumbs::articles('tag', 'Všetky s kľúčovým slovom');
Breadcrumbs::articles('search', 'Vyhľadávanie');
