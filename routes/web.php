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
if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}

Route::get('/', [PagesController::class, 'index'])->name('index.page');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('hours-management/dashboard', function () {
        return Inertia::render('Dashboard',[]);
    })->name('dashboard');

    Route::get('hours-management/', [CmsPageController::class, 'hoursManagement'])->name('cms.index');

    Route::get('hours-management/add-hours', [CmsPageController::class, 'addHours'])->name('add-hours');

});

require __DIR__.'/auth.php';
