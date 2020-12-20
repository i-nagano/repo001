<?php

namespace App\Http\Controllers;

use App\Models\Sweet;
use Illuminate\Http\Request;

class SweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sweets = Sweet::all();
        return response()->json($sweets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (request()->file) {
            $original_name = request()->file->getClientOriginalName();
            $file_name = $original_name . '.' . time();
            $request->file->storeAs('public/images', $file_name);
        
        $sweet = new Sweet();
        $sweet->sweet_id = $request->sweet_id;
        $sweet->sweet_name = $request->sweet_name;
        $sweet->unit_price = $request->unit_price;
        $sweet->image_path = 'storage/images/' . $file_name;
        $sweet->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sweet  $sweet
     * @return \Illuminate\Http\Response
     */
    public function show(Sweet $sweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sweet  $sweet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sweet $sweet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sweet  $sweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sweet $sweet)
    {
        //
    }
}
