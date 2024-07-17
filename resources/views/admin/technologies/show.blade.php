@extends('layouts.adminDash')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    {{ $tech->name }}
                    <i class="{{ $tech->icon }}" style="color: #FFD43B;"></i>
                </h1>
            </div>

            <div class="col-12">
                <p>Descrizione: {{ $tech->description }}</p>
            </div>
        </div>
    </div>
@endsection
