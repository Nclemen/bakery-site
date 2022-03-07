<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Cms\CmsPageController;

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

Route::get('/', function () {
    return 'hi';
});

Route::domain('bakery-site.test')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });
});




Route::middleware(['auth', 'verified'])->domain('cms.bakery-site.test')->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard',[]);
    })->name('dashboard');

    Route::get('/', [CmsPageController::class, 'index'])->name('cms.index');

    Route::get('/hours-management',[CmsPageController::class, 'hoursManagement'])->name('hoursManagement');

});

require __DIR__.'/auth.php';
