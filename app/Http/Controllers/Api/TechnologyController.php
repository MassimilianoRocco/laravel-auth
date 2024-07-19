<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function index(){
        return response()->json([
            'success'=>true,
            'techs'=>Technology::with('projects')-> orderByDesc('id')->paginate(9),
            // il with mi aggiunge la relazione a projects presente nel model Technology. Ovviamente qualora ci fossero altre relazioni metterei una virgola e li aggiungerei dopo projects.
        ]);
    }
}
