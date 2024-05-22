<?php

use App\Http\Controllers\ComputersController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\RouteCompiler;
use App\Http\Controllers\StaticController;


Route::get('/', [StaticController::class, 'index'])->name('home.index');
Route::get('/about', [StaticController::class, 'about'])->name('home.about');
Route::get('/contact', [StaticController::class, 'contact'])->name('home.contact');

Route::resource('/computers', ComputersController::class);










// Route::get('/about', function () {
//     return view('about');
// });

// Route::view('/contact', 'contact', [
    // 'page_name' => 'Contact',
    // 'page_description' => 'sfsdfsdf sadasdasd sadasdas'
// ]);

Route::get('users/{id}', function ($id) {

    $users = [
        '0' => 'Osama',
        '1' => 'Ahmed',
        '2' => 'Omar',
        '3' => 'Ali',
        '4' => 'Mohammed',
        '5' => 'Mammdouh'
    ];
    return view('users', ['id' => $users[$id] ?? "This id Not Found"]);
});

// Route::get('/store', function () {
//     $filter = request('style');
//     if(isset($filter)) {
//         return 'this page is viewing <span style="color: red">'.strip_tags($filter).'</span>';
//     }
//     return 'this page is viewing <span style="color: red">All Products</span>';
// });

Route::get("/store/{catagory?}/{item?}", function ($catagory = null, $item = null) {
    if (isset($catagory)) {
        if (isset($item)) {
            return "<h1>$item</h1>";
        }
        return "<h1>$catagory</h1>";
    };
    return "<h1>STORE</h1>";
});
