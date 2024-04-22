<?php

use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('loginwithgithub');


Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
    $user = User::where('email', $githubUser->email)->first();
    if ($user) {
        $user->github_id = $githubUser->id;
        $user->github_token = $githubUser->token;
        $user->update();
    } else {
        # create new user  --> save github token
        ## email , Github token , refresh token , github id
        $user = User::create([
            'name' => $githubUser->name ? $githubUser->name : $githubUser->email,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken ? $githubUser->refreshToken : null
        ]);
    }
    Auth::login($user);
    return  redirect('/home');
});


Route::resource('posts', PostsController::class);
Route::resource('comments', CommentsController::class);
Auth::routes();

Route::get('/home', [PostsController::class, 'index'])->name('home');
Route::get('/', [PostsController::class, 'index'])->name('home');
