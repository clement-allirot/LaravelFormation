<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'is.admin'])->group(
    function () {
        Route::get('/posts/create', [PostController::class, 'create'])
            ->name('create');

        Route::post('/posts/create', [PostController::class, 'store'])
            ->name('posts.store');
    }
);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [PostController::class, 'index'])
        ->name('welcome');

    Route::get('/posts', [PostController::class, 'showAll'])
        ->name('showAll');

    Route::get('/posts/{id}', [PostController::class, 'show'])
        ->name('show');

    Route::get('/contact', [PostController::class, 'contact'])
        ->name('contact');
});

Route::get('/dashboard', function () {
    $post = Post::withTrashed()->where('id', 37);
    $post->restore();
    //$post->delete();
    //dd($post);

    return view('dashboard');
})->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];

    Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\TestMarkdownMail($details));

    dd("Email is Sent.");
});
