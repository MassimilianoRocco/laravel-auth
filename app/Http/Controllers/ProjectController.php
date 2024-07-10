<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request as HttpRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progetti = Project::all();

        $data = [
            "progetti" => $progetti
        ];

        return view('projects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HttpRequest $request)
    {

        $data = $request->all();

        $newProject = new Project();
        $newProject->titolo = $data['titolo'];
        $newProject->descrizione = $data['descrizione'];
        $newProject->immagine = $data['immagine'];
        $newProject->save();

        return redirect()->route('projects.index', $newProject->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HttpRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
