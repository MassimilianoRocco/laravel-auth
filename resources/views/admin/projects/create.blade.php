@extends('layouts.adminDash')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Aggiungi un Progetto</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <form method="POST" action="{{ route('admin.projects.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Titolo</label>
                        <input type="text" class="form-control" name="titolo" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrizione</label>
                        <textarea type="text" class="form-control" name="descrizione" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Percorso immagione</label>
                        <input type="text" class="form-control" name="immagine" required>
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

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
