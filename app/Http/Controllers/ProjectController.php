<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progetti = Project::orderByDesc('id')->paginate()->all();

        $data = [
            "progetti" => $progetti
        ];
        
        return view('admin.projects.index', $data);

        // Oppure:
        // $progetti = Project::orderByDesc('id')->paginate();
        // return view('admin.projects.index', compact('progetti'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $techs = Technology::all();
        $data = [
            "techs" => $techs
        ];

        return view('admin.projects.create', $data)->with('message', 'Project created');
        // da passare anche technologies per averle nelle checkbox del create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HttpRequest $request)
    {
        //recupero e valido i dati inviati con il form necessari al mio model
        $data = $request -> validate([
            'titolo' => 'required|min:3|max:255',
            'descrizione' => 'required|min:3|max:65,535',
            'immagine' => 'required|image',
            'type_id' => 'required',
            'techs' => 'exists:technologies,id',
        ]);

                //Senza il validate data avrebbe contenuto anche altre cose che magari non c'entrano nulla con il project che voglio creare, mentre adesso abbiamo solo campi che ci siamo assicurati siano richiesti.


        if ($request->has('immagine')) {
            // save the image

            $image_path = Storage::disk("public")->put('uploads', $request->immagine);
            $data['immagine'] = $image_path;
            //dd($image_path, $val_data);
        }

        $newProject = new Project();
        $newProject->fill($data);

              //Questo metodo fill si può usare solo se lo abbiamo abilitato e si fa all'interno del Model.

        // $newProject = new Project();
        // $newProject->titolo = $data['titolo'];
        // $newProject->descrizione = $data['descrizione'];
        // $newProject->immagine = $data['immagine'];
        // $newProject->type_id = $data['type_id'];
        $newProject->save();

        if ($request->has('techs')) {
            $newProject->technologies()->attach($request->techs);
        }

        return redirect()->route('admin.projects.show', $newProject->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $data = [
            "project" => $project
        ];

        return view("admin.projects.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $data = [
            "progetto" => $project
        ];

        return view("admin.projects.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HttpRequest $request, Project $project)
    {
        $data = $request->all();


        $project->titolo = $data['titolo'];
        $project->descrizione = $data['descrizione'];
        $project->immagine = $data['immagine'];
        $project->type_id = $data['type_id'];
        $project->save();

        return redirect()->route('admin.projects.index', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        
        Storage::disk("public")->delete($project->immagine);

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
