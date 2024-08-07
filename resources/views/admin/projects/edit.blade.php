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

                <form method="POST" action="{{ route('admin.projects.update', $progetto->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Titolo</label>
                        <input type="text" class="form-control" name="titolo" value="{{old('titolo',$progetto->titolo)}}" required>
                        @error('titolo')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrizione</label>
                        <input type="text" class="form-control" name="descrizione" value="{{old('descrizione', $progetto->descrizione) }}" required>
                        @error('descrizione')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="immagine" class="form-label">Choose file</label>
                        <input type="file" class="form-control" name="immagine" id="immagine" placeholder="" aria-describedby="coverImageHelper" />
                        <div id="immagineHelper" class="form-text">Upload a new image for the curret project</div>
                        @error('immagine')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <p>Tipo Progetto</p>
                        <select class="form-select" aria-label="Default select example" name="type_id" required>
                           
                            @if($progetto->type_id == 1)
                                <option value="1" selected>Front-end</option>
                            @else
                                <option value="1">Front-end</option>
                            @endif
                            @if($progetto->type_id == 2)
                                <option value="2" selected>Back-end</option>
                            @else
                                <option value="2">Back-end</option>
                            @endif
                            @if($progetto->type_id == 3)
                                <option value="3" selected>Full-Stack</option>
                            @else
                                <option value="3">Full-Stack</option>
                            @endif
                            @if($progetto->type_id == 4)
                                <option value="4" selected>Design</option>
                            @else
                                <option value="4">Design</option>
                            @endif
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
