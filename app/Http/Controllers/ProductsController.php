<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductsController extends Controller
{
        /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        // return all hours
        return Product::all();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store (Request $request)
    {
        //validate request input
        $validatedRequest = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'min' => ['required'],
            'max' => ['required'],
        ]);

        //return Inertia redirect back to page
        Product::create($validatedRequest);
        return redirect(route('cms.products'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show ($id)
    {
        //find opening hour with specific id
        return Product::find($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request,$id)
    {
        //update specific hour entry with request data
        return Product::find($id)->update($request->all());
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        // delete specific hour entry
        return Product::destroy($id);
    }
}
