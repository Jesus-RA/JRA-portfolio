<?php

namespace App\Http\Controllers\Panel;

use App\Image;
use App\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required|image',
        ]);

        $technology = new Technology();
        $technology->fill($request->all());
        $technology->save();
        
        $image = new Image();
        $image->path =  $request->file('icon')->store('technologies-uploads', 'public');
        $technology->icon()->save($image);
        
        return redirect()->route('technologies.index')->withSuccess("$technology->name was created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $technology->fill($request->all());
        $technology->save();

        if($request->hasFile('icon')){
            $image = new Image();
            $image->path = $request->file('icon')->store('technologies-uploads', 'public');
            
            $technology->icon()->delete();
            $technology->icon()->save($image);
        }

        return redirect()->route('technologies.index')->withSuccess("$technology->name updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        Storage::disk('public')->delete($technology->icon->path);

        $technology->icon()->delete();
        $technology->delete();

        return $technology->name;
    }
}
