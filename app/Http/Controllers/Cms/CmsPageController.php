<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use App\Models\OpeningHours;
use Carbon\Carbon;

class CmsPageController extends Controller
{

    /**
     * @return \Inertia\Response
     */
    public function index () {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    /**
     * @return \Inertia\Response
     */
    public function hoursManagement(){
        return Inertia::render('cms/HoursManagement/Hours-management',[
            'weekhours' => OpeningHours::All(),
        ]);
    }

    /**
     * show add hours page
     *
     * @return \Inertia\Response
     */
    public function addHours(){
        return Inertia::render('cms/HoursManagement/Add-hours');
    }
}
