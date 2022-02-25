<?php

namespace App\Http\Controllers;

use App\Glass;
use Illuminate\Http\Request;

class GlassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $glasses = Glass::all();
        return view('admin.glasses.index', ['glasses' => $glasses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.glasses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
        'name'=> 'required | max:80',
        'type'=> 'required | max:80',
        'material'=> 'required | max:80',
        'capacity'=> 'required | integer',
        'height'=> 'required | integer',
        'diameter'=> 'required | integer',
    ]);
        $newGlass = new Glass();
        $newGlass->fill($request->all());
        $newGlass->save();
        return redirect()->route('glasses.show', $newGlass);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Glass  $glass
     * @return \Illuminate\Http\Response
     */
    public function show(Glass $glass)
    {
        return view('admin.glasses.show', ['glass' => $glass]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Glass  $glass
     * @return \Illuminate\Http\Response
     */
    public function edit(Glass $glass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Glass  $glass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Glass $glass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Glass  $glass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Glass $glass)
    {
        $glass->delete();
        return redirect()
        ->route('glasses.index')
        ->with('status', "Hai eliminato correttamente il dato");
    }
}
