<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Home
Route::get('/home', function () {
    $posts = [];
    $comments = [];
    if (auth()->check()) {
        $posts = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->select('*')
            ->orderby('posts.created_at', 'desc')
            ->get();
        $comments = DB::table('posts')
            ->join('comments', 'posts.id', '=', 'comments.post_id')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('*')
            ->orderby('posts.created_at', 'desc')
            ->get();

    }
    \Log::info(json_encode($comments));
    return view('home', ['posts' => $posts], ['comments' => $comments]);
});

//Login
Route::get('/', function () {
    if (auth()->check()) {
        return redirect('home');
    }
    return view('login');
});
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

//Register
Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [UserController::class, 'register']);

//Reset Password
Route::get('/forgotenPassword', function () {
    return view('forgotPassword');
});
Route::post('/resetPassword', [UserController::class, 'resetPassword']);

//Blog post
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'editPost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

//Blog post
Route::put('/post-comment/{post}', [CommentController::class, 'createComment']);


