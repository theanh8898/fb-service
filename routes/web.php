<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {
    return view('frontend.home');
});

//Route::get('/login', function () {
//    return view('auth.login');
//})->name('login');
Route::group(['middleware' => 'guest'], function () {
    // Authentication
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    // Registration
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    // Password Reset
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

//    // Socialite Routes
//    Route::get('login/{provider}', [SocialController::class, 'redirect'])->name('social.login');
//    Route::get('login/{provider}/callback', [SocialController::class, 'callback']);
});

Route::middleware(['auth'])->group(function () {

    if (Auth::check()) {
        Route::redirect('/', '/dashboard');
    }

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
    Route::get('/order/search', [OrderController::class, 'search'])->name('order.search');

    Route::prefix('users')->group(function () {
        Route::get('/list', [UserController::class, 'index'])->name(LIST_USER);
        Route::get('/profile', [UserController::class, 'show'])->name(PROFILE_USER);
        Route::get('/create', 'UserController@create')->name(CREATE_USER);
        Route::post('/store', 'UserController@store')->name(STORE_USER);
        Route::get('{user}/delete', [UserController::class, 'destroy'])->name(DELETE_USER);
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name(EDIT_USER);
        Route::put('{user}/update', [UserController::class, 'update'])->name(UPDATE_USER);
        Route::get('/change-password', 'UserController@editPassword')->name(EDIT_PASSWORD);
        Route::patch('/update-password', 'UserController@changePassword')->name(UPDATE_PASSWORD);
        Route::post('check-password', 'UserController@checkPass')->name(CHECK_PASSWORD);
    });

    Route::prefix('config')->group(function () {
        Route::get('/support', function () {
            return view('backend.config.support');
        })->name('config.support');
    });

    Route::group([
        'prefix' => 'service',
        'as' => 'service.',
    ], function () {
        Route::get('/', [ServiceController::class, 'index'])
            ->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/store', [ServiceController::class, 'store'])->name('store');

        Route::group(['prefix' => '{service}'], function () {
            Route::get('/edit', [ServiceController::class, 'edit'])->name('edit');
            Route::patch('/update', [ServiceController::class, 'update'])->name('update');

            Route::get('/destroy', [ServiceController::class, 'destroy'])->name('destroy');


            // Order
            Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
                Route::get('/create', [OrderController::class, 'create'])->name('create');
                Route::post('/store', [OrderController::class, 'store'])->name('store');

                Route::get('/search', [OrderController::class, 'search'])->name('search');

                Route::group(['prefix' => '{order}'], function () {
                    Route::get('edit', [OrderController::class, 'edit'])
                        ->name('edit');

                    Route::patch('/', [OrderController::class, 'update'])->name('update');
                    Route::delete('delete', [OrderController::class, 'delete'])->name('delete');
                });
            });

            // Schedule

            //Banner
        });
        Route::get('/search', [ServiceController::class, 'search'])->name('search');
    });

});
