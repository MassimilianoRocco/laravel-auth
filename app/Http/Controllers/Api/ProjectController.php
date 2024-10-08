<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        return response()->json([
            'success'=>true,
            'projects'=>Project::with('technologies')-> orderByDesc('id')->paginate(3),
            // il with mi aggiunge la relazione a technologies presente nel model Project. Ovviamente qualora ci fossero altre relazioni metterei una virgola e li aggiungerei dopo technologies.
        ]);
    }

    public function show(Project $project){

        $proj= Project::with('technologies')->find($project->id);

        if($proj){
            return response()->json([
                'success'=>true,
                'project'=>Project::with('technologies')->find($project->id),
                ]);
        }
        else{
            return response()->json([
                'success'=>false,
                'message'=>'Project not found',
                ]);
        }
        
    }


}
