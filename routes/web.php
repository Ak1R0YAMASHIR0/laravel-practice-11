<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Маршруты приложения (Практическая работа №11)
|--------------------------------------------------------------------------
| 6 маршрутов: 4 принимают параметры из адреса, 3 имеют имя.
| Проверка: php artisan route:list
*/

// 1. Главная страница — именованный маршрут
Route::get('/', function () {
    return view('route', [
        'title' => 'Главная страница',
        'text' => 'Добро пожаловать! Это маршрут с именем home.',
        'route' => '/',
    ]);
})->name('home');

// 2. Статическая страница «О проекте»
Route::get('/about', function () {
    return view('route', [
        'title' => 'О проекте',
        'text' => 'Учебный проект по маршрутизации Laravel.',
        'route' => '/about',
    ]);
});

// 3. Маршрут с обязательным параметром (только цифры) и именем
Route::get('/catalog/{id}', function (string $id) {
    return view('route', [
        'title' => 'Товар №' . $id,
        'text' => 'Карточка товара из каталога.',
        'route' => '/catalog/' . $id,
    ]);
})->whereNumber('id')->name('catalog.show');

// 4. Маршрут с необязательным параметром и именем
Route::get('/hello/{name?}', function (string $name = 'гость') {
    return view('route', [
        'title' => 'Привет, ' . $name . '!',
        'text' => 'Имя взято из адреса страницы.',
        'route' => '/hello/' . $name,
    ]);
})->name('hello');

// 5. Маршрут с двумя параметрами
Route::get('/posts/{post}/comments/{comment}', function (string $post, string $comment) {
    return view('route', [
        'title' => 'Статья №' . $post . ', комментарий №' . $comment,
        'text' => 'Оба значения пришли из адреса.',
        'route' => '/posts/' . $post . '/comments/' . $comment,
    ]);
});

// 6. Именованный маршрут с параметром и правилом (латиница, цифры, дефис)
Route::get('/courses/{slug}', function (string $slug) {
    return view('route', [
        'title' => 'Курс: ' . $slug,
        'text' => 'Страница курса по его короткому имени.',
        'route' => '/courses/' . $slug,
    ]);
})->where('slug', '[A-Za-z0-9-]+')->name('courses.show');
