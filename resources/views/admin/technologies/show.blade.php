@extends('layouts.adminDash')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>{{ $tech->name }}</h1>
            </div>
            {{-- <div class="col-8">
                <img src="{{ $tech->immagine }}" class="rounded img-fluid ">
            </div> --}}
            <div class="col-8">
                <p>Descrizione: {{ $tech->description }}</p>
            </div>
        </div>
    </div>
@endsection
