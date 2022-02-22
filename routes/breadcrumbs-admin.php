<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::macro('resource', function (string $name, string $title) {
    // Home > Blog
    Breadcrumbs::for("{$name}.index", function (BreadcrumbTrail $trail) use ($name, $title) {
        $trail->parent('admin.home');
        $trail->push($title, route("{$name}.index"));
    });

    // Home > Blog > New
    Breadcrumbs::for("{$name}.create", function (BreadcrumbTrail $trail) use ($name) {
        $trail->parent("{$name}.index");
        $trail->push('Nové', route("{$name}.create"));
    });

    // Home > Blog > Post 123
    Breadcrumbs::for("{$name}.show", function (BreadcrumbTrail $trail, $model, string|null $key = null, bool|null $show_route = false) use ($name) {
        $trail->parent("{$name}.index");
        is_null($key) ?: ( $show_route ? $trail->push($key, route("{$name}.show", $model->slug)) : $trail->push($key) );
    });

    // Home > Blog > Post 123 > Edit
    Breadcrumbs::for("{$name}.edit", function (BreadcrumbTrail $trail, $model, ?string $key = null, ?bool $show_route = null) use ($name) {
        $trail->parent("{$name}.show", $model, $key, $show_route);
        $trail->push('Editovať', route("{$name}.edit", $model));
    });
});

Breadcrumbs::after(function (BreadcrumbTrail $trail) {
    $page = (int) request('page', 1);

    if ($page > 1) {
        $trail->push("Stránka {$page}");
    }
});

// Admin Home
Breadcrumbs::for('admin.home', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'), ['icon' => 'fas fa-home']);
});

Breadcrumbs::for('file-manager', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('Súborový manažér', route('file-manager'));
});

// Admin Home : Resource Models
Breadcrumbs::resource('roles', 'Role');
Breadcrumbs::resource('news', 'Články');
Breadcrumbs::resource('charts', 'Grafy');
Breadcrumbs::resource('files', 'Súbory');
Breadcrumbs::resource('priests', 'Kňazi');
Breadcrumbs::resource('notices', 'Oznamy');
Breadcrumbs::resource('banners', 'Bannery');
Breadcrumbs::resource('pictures', 'Obrázky');
Breadcrumbs::resource('users', 'Užívatelia');
Breadcrumbs::resource('sliders', 'Myšlienky');
Breadcrumbs::resource('galleries', 'Galérie');
Breadcrumbs::resource('tags', 'Kľúčové slová');
Breadcrumbs::resource('permissions', 'Povolenia');
Breadcrumbs::resource('testimonials', 'Svedectvá');
Breadcrumbs::resource('file-types', 'Typy súborov');
Breadcrumbs::resource('charts.data', 'Údaje do grafov');
Breadcrumbs::resource('categories', 'Kategórie článkov');
Breadcrumbs::resource('static-pages', 'Statické stránky');

// Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });
