<?php

namespace App\Http\Controllers;

use App\Models\Hours;
use App\Http\Requests\StoreHoursRequest;
use App\Http\Requests\UpdateHoursRequest;

class HoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHoursRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHoursRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hours  $hours
     * @return \Illuminate\Http\Response
     */
    public function show(Hours $hours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hours  $hours
     * @return \Illuminate\Http\Response
     */
    public function edit(Hours $hours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHoursRequest  $request
     * @param  \App\Models\Hours  $hours
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHoursRequest $request, Hours $hours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hours  $hours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hours $hours)
    {
        //
    }
}
