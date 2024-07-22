@extends('layouts.dash')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap">
                @foreach ($progetti as $progetto)
                    <div class="card my-4 mx-2" style="width: 18rem;">
                        <div class="card-body d-flex flex-column justify-content-between">

                            <div>
                                <p class="card-text">
                                    <a href="{{ url('/show', $progetto)}}">
                                    @if (Str::startsWith($progetto->immagine, 'http'))
                                        <img src="{{ $progetto->immagine }}" alt="">
                                    @else
                                        <img src="{{ asset('storage/' . $progetto->immagine) }}" alt="">
                                    @endif
                                    </a>
                                </p>

                                <h5 class="card-title">{{ $progetto->titolo }}</h5>
                                <p>Tipo: {{$progetto->getTypeName->nome}}</p>
                                <p>Tech: 
                                    @foreach($progetto->technologies as $tech)
                                        {{ $tech->name }}
                                    @endforeach
                                </p>
                                <p class="descrizone card-text overflow-auto">{{ $progetto->descrizione }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
