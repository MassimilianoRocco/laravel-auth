<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'titolo',
        'descrizione',
        'immagine'
    ];

    public function getTypeName()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    // This tells Eloquent that the type_id column in the projects table is the foreign key that references the id column in the types table.
    // Once you've updated the relationship, you should be able to access the 'nome' like this <p>Tipo: {{$progetto->getTypeName->nome}}</p>
}
