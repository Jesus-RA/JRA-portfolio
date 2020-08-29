<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Technology;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::all();
        $technologies = Technology::all();
        return view('welcome', compact('projects', 'technologies'));
    }
}
