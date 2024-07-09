@extends('layouts.app')
@section('content')
    @foreach ($progetti as $progetto)
        <p>{{ $progetto->titolo }}</p>
    @endforeach
@endsection
