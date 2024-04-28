<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPropertyController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeCookieRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function () {
        Route::get('/dashboard', function () {
            return view('backend.dashboard.views.index');
        })->name('dashboard');

        Route::get('/', function () {
            return view('frontend.views.index');
        })->name('home');

        Route::controller(ProductCategoryController::class)
        ->prefix('product_categories')
        ->name('productCategory.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{productCategory}', 'update')->name('update');
            Route::delete('destroy/{productCategory}', 'destroy')->name('destroy');
        });

        Route::controller(ProductTypeController::class)
        ->prefix('product_types')
        ->name('productType.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{productType}', 'update')->name('update');
            Route::delete('destroy/{productType}', 'destroy')->name('destroy');
        });

        Route::controller(ProductPropertyController::class)
        ->prefix('product_properties')
        ->name('productProperty.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{productProperty}', 'update')->name('update');
            Route::delete('destroy/{productProperty}', 'destroy')->name('destroy');
        });

        Route::controller(ProductController::class)
        ->prefix('products')
        ->name('product.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{product}', 'update')->name('update');
            Route::delete('destroy/{product}', 'destroy')->name('destroy');
        });

        Route::controller(LocationController::class)
        ->prefix('locations')
        ->name('location.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{location}', 'update')->name('update');
            Route::delete('destroy/{location}', 'destroy')->name('destroy');
        });

        Route::controller(GovernorateController::class)
        ->prefix('governorates')
        ->name('governorate.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{governorate}', 'update')->name('update');
            Route::delete('destroy/{governorate}', 'destroy')->name('destroy');
        });


        Route::controller(CityController::class)
        ->prefix('cities')
        ->name('city.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{city}', 'update')->name('update');
            Route::delete('destroy/{city}', 'destroy')->name('destroy');
        });

        Route::controller(StateController::class)
        ->prefix('states')
        ->name('state.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{state}', 'update')->name('update');
            Route::delete('destroy/{state}', 'destroy')->name('destroy');
        });

        Route::controller(ClientController::class)
        ->prefix('clients')
        ->name('client.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{client}', 'update')->name('update');
            Route::delete('destroy/{client}', 'destroy')->name('destroy');
        });

        Route::controller(AgentController::class)
        ->prefix('agents')
        ->name('agent.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{agent}', 'update')->name('update');
            Route::delete('destroy/{agent}', 'destroy')->name('destroy');
        });



    }
);
