<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Technology;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $technologies = Technology::all(['id', 'name']);
        
        $profileTechnologies = $profile->technologies->map(function($technology){
            return $technology->id;
        });
        $profileTechnologies = implode(",", $profileTechnologies->toArray());

        return view('profiles.edit', compact('profile', 'technologies', 'profileTechnologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'biography' => 'required',
            'technologies' => 'required',
        ]);

        $profile->biography = $request->biography;

        $technologies = explode(',', $request->technologies);
        $profile->technologies()->sync($technologies);

        $profile->update();
        
        return redirect()->route('profiles.show', $profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
