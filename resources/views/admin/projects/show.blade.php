@extends('layouts.adminDash')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1>{{ $project->titolo }}</h1>
            </div>
            <div class="col-4">
                @if (Str::startsWith($project->immagine, 'http'))
                <img src="{{ $project->immagine }}" alt="">
            @else
                <img src="{{ asset('storage/' . $project->immagine) }}" alt="">
            @endif
                
            </div>
            <div class="col-12 py-3">
                <p>Descrizione: {{ $project->descrizione }}</p>
            </div>
        </div>
    </div>
@endsection
