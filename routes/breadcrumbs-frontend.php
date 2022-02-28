<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


//! Home
Breadcrumbs::for('frontend.home', function (BreadcrumbTrail $trail) {
    $trail->push('Domov', route('home'));
});

//! All Static Pages
Breadcrumbs::for('pages.others', function (BreadcrumbTrail $trail, array $pagesUrl) {
    $trail->parent('frontend.home');
    foreach ($pagesUrl as $page) {
        $trail->push($page['title'], $page['url']);
    }
});
