<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Cms\CmsPageController;
use App\Http\Controllers\PagesController;

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

Route::get('/', [PagesController::class, 'index'])->name('index.page');

Route::middleware(['auth', 'verified'])->prefix('hours-management')->group(function () {

//    Route::get('/dashboard', function () {
//        return Inertia::render('Dashboard',[]);
//    })->name('dashboard');

    Route::get('/', [CmsPageController::class, 'hoursManagement'])->name('cms.index');

    Route::get('/add-hours', [CmsPageController::class, 'addHours'])->name('add-hours');

});

require __DIR__.'/auth.php';
