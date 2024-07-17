@extends('layouts.dash')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1>{{ $project->titolo }}</h1>
            </div>


            <div class="col-4">
            @if (Str::startsWith($project->immagine, 'http'))
                <img src="{{ $project->immagine }}" alt="" class="rounded img-fluid ">
            @else
                <img src="{{ asset('storage/' . $project->immagine) }}" alt="" class="rounded img-fluid ">
            @endif


            </div>
            <div class="col-10 py-3">
                <p>Descrizione: {{ $project->descrizione }}</p>
            </div>
        </div>
    </div>
@endsection
