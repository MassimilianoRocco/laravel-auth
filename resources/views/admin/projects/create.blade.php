@extends('layouts.adminDash')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Aggiungi un Progetto</h1>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- con questo blocco di codice faccio sì che, dopo la submit del form, se la validazione da controller store fallisce, indica all'utente quali siano stati i problemi --}}
        </div>

        <div class="row">
            <div class="col-12">

                <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Titolo</label>
                        <input type="text" class="form-control" name="titolo" required>
                        @error("titolo")
                        {{-- <div>errore sul campo "Titolo"</div> Così inserisco un messaggio personalizzato --}}
                        <div class="alert alert-danger">{{ $message }}</div>
                        {{-- con questo invece faccio stampare esattamente lo stesso messaggio che mi stampa sotto il titolo (Aggiungi un progetto) ma riferito solo al campo titolo, dato che è in scope @error("titolo") --}}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrizione</label>
                        <textarea type="text" class="form-control" name="descrizione" required></textarea>
                        @error("descrizione")
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label">Percorso immagione</label>
                        <input type="text" class="form-control" name="immagine" required>
                        @error("immagine")
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    <div class="mb-3">
                        <label for="immagine" class="form-label">Choose file</label>
                        <input type="file" class="form-control" name="immagine" id="immagine" placeholder="" aria-describedby="coverImageHelper" />
                        <div id="immagineHelper" class="form-text">Upload an image for the curret project</div>
                        @error('immagine')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <p>Tipo Progetto</p>
                        <select class="form-select" aria-label="Default select example" name="type_id" required>
                            <option value="1" selected>Front-end</option>
                            <option value="2">Back-end</option>
                            <option value="3">Full-Stack</option>
                            <option value="4">Design</option>
                        </select>
                    </div>


                    {{-- CHECKBOX TECHNOLOGIES --}}
                    <div class="mb-3">
                        <p>Tecnologie</p>

                        @foreach ($techs as $tech )
                            
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$tech->id}}" name="techs[]" id="techs">
                            <label class="form-check-label" for="flexCheckDefault">
                              {{$tech->name}}
                            </label>
                        </div>
                        @endforeach

                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
