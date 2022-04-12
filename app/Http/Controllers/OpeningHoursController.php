<?php

namespace App\Http\Controllers;

use App\Models\OpeningHours;
use Illuminate\Http\Request;
use App\Rules\CantBeGreater;

class OpeningHoursController extends Controller
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        // return all hours
        return OpeningHours::all();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store (Request $request)
    {
        //validate request input
        $validatedRequest = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['string'],
            'open' => ['required', 'boolean'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'repeated_by' => ['required'],
            'repeat_increment' => ['exclude_if:repeated_by,never'],
        ]);

        //return Inertia redirect back to page
        OpeningHours::create($validatedRequest);
        return redirect(route('cms.index'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show ($id)
    {
        //find opening hour with specific id
        return OpeningHours::find($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request,$id)
    {
        //update specific hour entry with request data
        return OpeningHours::find($id)->update($request->all());
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        // delete specific hour entry
        return OpeningHours::destroy($id);
    }
}
