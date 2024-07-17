<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    //Così abilito l'utilizzo del metodo Fill nel controller (per lo store)
    protected $fillable = [
        'titolo',
        'descrizione',
        'immagine',
        'type_id'
    ];

    public function getTypeName()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    // This tells Eloquent that the type_id column in the projects table is the foreign key that references the id column in the types table.
    // Once you've updated the relationship, you should be able to access the 'nome' like this <p>Tipo: {{$progetto->getTypeName->nome}}</p>


    //Relazione molti-molti
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
