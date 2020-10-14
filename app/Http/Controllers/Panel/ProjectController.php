<?php

namespace App\Http\Controllers\Panel;

use App\Image;
use App\Project;
use App\Technology;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

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
        $technologies = Technology::all(['id', 'name']);
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
        $project = Project::make($request->all());
        $project->owner_id = auth()->user()->id;
        $project->save();

        $images = $request->file('image');

        foreach($images as $image){

            $options = [
                'folder' => 'projects-uploads',
            ];
    
            $response = \Cloudinary\Uploader::upload( $image->getRealPath(), $options );

            $project->images()->save(
                Image::make([
                    'path' => $response['secure_url'],
                    'public_id' => $response['public_id'
                ]])
            );
        }

        $technologies = explode(",", $request->technologies);
        foreach ($technologies as $technology) {
            $tech = Technology::find($technology);
            $project->technologies()->save($tech);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $technologies = Technology::all(['id', 'name']);
        
        $projectTechnologies = $project->technologies->map(function($technology){
            return $technology->id;
        });

        $projectTechnologies = implode(',' , $projectTechnologies->toArray());

        return view('projects.edit', compact('project', 'technologies', 'projectTechnologies'));
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
            'name' => ['required'],
            'description' => ['required'],
            'technologies' => ['required'],
        ]);

        if($request->hasFile('image')){            
            
            $options = [
                'folder' => 'projects-uploads',
            ];
            $response = \Cloudinary\Uploader::upload( $request->file('image')->getRealPath(), $options );

            $project->images()->save(
                Image::make([
                    'path' => $response['secure_url'],
                    'public_id' => $response['public_id']
                ])
            );
        }

        $project->fill($request->all());
        $project->save();

        $technologies = explode(",", $request->technologies);
        $project->technologies()->sync($technologies);

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
        foreach ($project->images as $image) {
            \Cloudinary\Uploader::destroy($image->public_id);
            // Storage::disk('public')->delete($image->path);
        }
        $project->images()->delete();
        $project->technologies()->detach();
        $project->delete();

        // return redirect()->route('projects.index')->withSuccess("$project->name was deleted successfully!");
        return $project->name;
    }

    public function removeImage(Image $image){
        $image->delete();
        \Cloudinary\Uploader::destroy($image->public_id);
        // Storage::disk('public')->delete($image->path);
        return  ['success' => 'Image deleted'];
    }

}
