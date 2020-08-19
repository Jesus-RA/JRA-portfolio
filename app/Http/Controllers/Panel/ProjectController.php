<?php

namespace App\Http\Controllers\Panel;

use App\Image;
use App\Project;
use App\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('owner_id', auth()->user()->id)->get();
        return view('projects.index', compact('projects'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = Technology::all();
        return view('projects.create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {   
        $project = new Project();
        $project->fill($request->all());
        $project->owner_id = auth()->user()->id;
        $project->save();

        $images = $request->file('image');

        foreach($images as $image){
            $newImage = new Image;
            $newImage->path = $image->store('project-images', 'public');
            $project->images()->save($newImage);
            $newImage->save();
        }

        return redirect()->route('projects.index')->withSuccess("$project->name added successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
        // return view('components.modal-project', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'repository' => 'required',
            'url' => 'required',
            'image' => 'image',
        ]);

        if($request->hasFile('image')){
            $request->image = $request->file('image')->store('projects-images', 'public');
    
            $image = new Image();
            $image->path = $request->image;
    
            $project->images()->save($image);
            
            $image->save();
        }

        $project->fill($request->all());
        $project->save();

        return redirect()->route('projects.index')->withSuccess("$project->name updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->images()->delete();
        $project->delete();

        // return redirect()->route('projects.index')->withSuccess("$project->name was deleted successfully!");
        return $project->name;
    }
}
