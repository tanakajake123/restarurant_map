<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
   $trail->push('Home', route('home'));
});

// Home > レストラン一覧
Breadcrumbs::for('restaurant.index', function (BreadcrumbTrail $trail) {
   $trail->parent('home');
   $trail->push('レストラン一覧', route('restaurant.index'));
});

Breadcrumbs::for('restaurant.show', function (BreadcrumbTrail $trail, $restaurant) {
   $trail->parent('restaurant.index');
   $trail->push($restaurant->name, route('restaurant.show', $restaurant->id));
});
