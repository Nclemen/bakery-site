<?php

namespace App\Http\Controllers;

use App\Models\OpeningHours;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Inertia\Inertia;

class PagesController extends Controller
{
    /**
     * index page for the bakery website
     *
     * @return \Inertia\Response
     */
    public function index() {
        OpeningHours::getHoursForWeek();
        return Inertia::render('Welcome',[
            'weekhours' => OpeningHours::getHoursForWeek(),
        ]);
    }
}
