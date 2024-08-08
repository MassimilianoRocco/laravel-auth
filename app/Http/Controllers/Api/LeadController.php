<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewLeadMessageMarkdown;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        // dd($request->all());

        // validate user inputs
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required|min:5|max:200'
        ]);
        // in questo caso non posso utilizzare il solito validator di laravel(request->validate()) perchè se ci fossero errori mi restituirebbe una pagina web, quindi non mi darebbe una response in formato json che è quello che a me serve dato che dal front arriva una chiamata axios/ajax, quindi serve creare una nuova istanza del validator che dovrà validare tutti i dati della request. Il make vuole due parametri: nel primo vuole l'elemento da validare, nel secondo le regole di validazione.
        // Inserisco tutto nella variabile validator così da poter poi,sotto, utilizzare il metodo fails() e poi errors() per controllare se ritornano degli errori o meno e in caso restituirli nella response.
    
        //check validation errors and return them if true as json
        if($validator->fails()){
            return response()->json([
                'success'=> false,
                'errors' => $validator->errors(),
            ]);
        };

        //save lead into database
        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        //send email to admin
        Mail::to('info@prova.com')->send(new NewLeadMessageMarkdown($newLead));

        //return success json response

        return response()->json([
            'success'=> true
        ]);

    }
}
