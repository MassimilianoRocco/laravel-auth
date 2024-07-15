@extends('layouts.dash')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>{{ $project->titolo }}</h1>
            </div>
            <div class="col-8">
                <img src="{{ $project->immagine }}" class="rounded img-fluid ">
            </div>
            <div class="col-8">
                <p>Descrizione: {{ $project->descrizione }}</p>
            </div>
        </div>
    </div>
@endsection
