@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap">
                @foreach ($progetti as $progetto)
                    <div class="card my-4 mx-2" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text"><img src="{{ $progetto->immagine }}" alt=""></p>
                            <h5 class="card-title">{{ $progetto->titolo }}</h5>
                            <p class="card-text">{{ $progetto->descrizione }}</p>
                            <button type="button" class="btn btn-primary"><a
                                    href="{{ route('projects.edit',$progetto->id) }}">Modifica</a></button>

                            <form class="my-1" action="{{route('projects.destroy', $progetto)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Elimina</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
