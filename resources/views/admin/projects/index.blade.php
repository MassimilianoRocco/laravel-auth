@extends('layouts.adminDash')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap">
                @foreach ($progetti as $progetto)
                    <div class="card my-4 mx-2" style="width: 18rem;">
                        <div class="card-body d-flex flex-column justify-content-between">

                            <div>
                                <p class="card-text">
                                    <a href="{{ route('admin.projects.show', $progetto->id) }}">

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
                                        {{ $tech->name }} -
                                    @endforeach
                                </p>
                                <p class="descrizone card-text overflow-auto">{{ $progetto->descrizione }}</p>
                            </div>

                            <div class="my-3 d-flex flex-column">
                                <button type="button" class="btn btn-primary"><a
                                        href="{{ route('admin.projects.edit', $progetto->id) }}">Modifica</a>
                                </button>

                                <form class="my-1" action="{{ route('admin.projects.destroy', $progetto) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary  w-100">Elimina</button>
                                </form>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
