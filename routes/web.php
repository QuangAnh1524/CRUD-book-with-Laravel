<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;

Route::get('/products', [
    ProductController::class,
    'index'
])->name('products');


Route::get('/', [
    PageController::class,
    'index'
    ]);

Route::get('/about', [
    PageController::class,
    'about'
]);

Route::get('/products/{productName}/{id}', [
    ProductController::class,
    'details'
])->where([
    'productName' => '[a-zA-Z]+',
    'id' => '[0-9]+'
]);

Route::get('/posts', [\App\Http\Controllers\Posts::class, 'index']);

Route::resource('/books', \App\Http\Controllers\BooksController::class);

Route::get('/books/{id}/confirm-delete', [\App\Http\Controllers\BooksController::class, 'confirmDestroy']);

Route::get('/hello/{name?}/{age?}', function ($name = 'Quang Anh', $age = 20) {
    return "Hello ".$name ." Age ".$age;
})->where(['name' => '[A-Za-z]+', 'age' => '[0-9]+']);

Route::get('/discount', function () {
   return view('discount');
});

Route::post('/display-discount', function (Illuminate\Http\Request $request) {
   $productDescription = $request->desc;
   $price = $request->price;
   $discountPercent = $request->percent;
   $discountAmount = $price * $discountPercent /100;
   $discountPrice = $price - $discountAmount;
    return view('display-discount', compact(['discountPrice', 'discountAmount',
        'productDescription', 'price', 'discountPercent']));
});

Route::get('/dictionary', function () {
   return view('dictionary');
});

Route::post('/display-dictionary', function (Illuminate\Http\Request $request) {
    $wordArray = array(
        "hello"=>"xin chào",
        "goodbye"=>"tạm biệt",
        "football"=>"bóng đá"
    );

    $word = $request->word;
    if (array_key_exists($word, $wordArray)) {
        $wordVN = $wordArray[$word];
    } else {
        $wordVN = "không tìm thấy!";
    }
    return view('display-dictionary', compact('wordVN'));
});



Route::group(['prefix' => 'user'], function () {
    Route::get('/profile', function (){
        return redirect()->route('login');
    });

    Route::get('/login', function (){
        return "login page here.";
    })->name('login');
});

Route::resource('contact', 'ContactController');
Route::resource('contact', 'App\Http\Controllers\ContactController');

Route::get('checkMail', [\App\Http\Controllers\checkMailController::class, 'index']);

Route::get('/insert', function () {
    DB::table('posts')->insert([
       'title' => 'qanh',
        'content' => 'tlu uni',
        'is_admin' => 1
    ]);
    return 'insert success';
});

Route::get('/read', function (){
   $result = DB::table('posts')->select()->where('id', '=', 2)->get();
   return $result;
});

Route::get('/update', function (){
   $affected = DB::table('posts')->where('id', '=', 2)->update(['is_admin' => 0]);
   return $affected;
});

Route::get('delete', function (){
    $delete = DB::table('posts')->where('id', '=', 3)->delete();
    return $delete;
});
