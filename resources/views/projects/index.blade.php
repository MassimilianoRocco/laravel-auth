@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($progetti as $progetto)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <p class="card-text"><img src="{{ $progetto->immagine }}" alt=""></p>
                        <h5 class="card-title">{{ $progetto->titolo }}</h5>
                        <p class="card-text">{{ $progetto->descrizione }}</p>
                        <button type="button" class="btn btn-primary"><a
                                href="{{ route('projects.edit',$progetto->id) }}">Modifica</a></button>
                        <button type="button" class="btn btn-primary">Elimina</button>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
