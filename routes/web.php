<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/', function () {

    $halls = [
        ['id' => 1, 'name' => 'Марс', 'image' => 'hall9.jpg', 'cost' => 1000],
        ['id' => 2, 'name' => 'Венера', 'image' => 'hall8.jpg', 'cost' => 1200],
        ['id' => 3, 'name' => 'Сатурн', 'image' => 'hall10.jpg', 'cost' => 900],
    ];
    return view('home', ['halls' => $halls]);
})->name('home');

Route::get('/halls', function () {
    return view('halls');
})->name('halls');

Route::get('/halls/{id}', function ($id) {

    $halls = [
        '1' => ['name' => 'Марс', 'image' => 'hall9.jpg', 'cost' => 1000, 'description' => 'Неотъемлемыми деталями атмосферы зала являются детально подобранные предметы интерьера и прямые солнечные лучи, заполняющие пространство на протяжении всего светового дня', 'equipment' => '2 х Profoto D1 500 LED 100w + Led panel'],
        '2' => ['name' => 'Венера', 'image' => 'hall8.jpg', 'cost' => 1200, 'description' => 'Неотъемлемыми деталями атмосферы зала являются детально подобранные предметы интерьера и прямые солнечные лучи, заполняющие пространство на протяжении всего светового дня', 'equipment' => '2 х Profoto D1 500 LED 100w + Led panel'],
        '3' => ['name' => 'Сатурн', 'image' => 'hall10.jpg', 'cost' => 900, 'description' => 'Неотъемлемыми деталями атмосферы зала являются детально подобранные предметы интерьера и прямые солнечные лучи, заполняющие пространство на протяжении всего светового дня', 'equipment' => '2 х Profoto D1 500 LED 100w + Led panel'],
    ];

    $hall = $halls[$id];

    return view('halls.show', compact('hall'));
})->name('halls.show');

Route::get('/book', function () {
    return view('book');
})->name('book');

Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');

Route::get('/register', function () {
    return view('auth.register');
})->name('auth.register');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');
