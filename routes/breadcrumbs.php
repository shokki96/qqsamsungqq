<?php
/**
 * Created by PhpStorm.
 * User: merdan
 * Date: 4/30/2019
 * Time: 17:54
 */
// Home
Breadcrumbs::for('main', function ($trail) {
    $trail->push('Baş sahypa', route('homeWeb'));
});
//Breadcrumbs::for('home', function ($trail) {
//    $trail->parent('main');
//    $trail->push('Baş sahypa', route('homeWeb'));
//});
Breadcrumbs::for('search', function ($trail) {
    $trail->parent('main');
    $trail->push('Gözleg netijesi', route('search'));
});
Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('main');
    $trail->push('Şahsy maglumatlar', route('profile'));
});

Breadcrumbs::for('liked', function ($trail) {
    $trail->parent('main');
    $trail->push('Halananlar', route('liked'));
});
Breadcrumbs::for('bought', function ($trail) {
    $trail->parent('main');
    $trail->push('Satyn alynanlar', route('bought'));
});
Breadcrumbs::for('watched', function ($trail) {
    $trail->parent('main');
    $trail->push('Seredilenler', route('watched'));
});

Breadcrumbs::for('category', function ($trail, $category) {
    //dd($category);
    $trail->parent('main');
    $trail->push($category->name, route('category', $category->id));
});

Breadcrumbs::for('material', function ($trail, $material) {
    $trail->parent('category', $material->category);
    $trail->push($material->title, route('material', $material->id));
});
