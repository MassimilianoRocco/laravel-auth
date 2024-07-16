@extends('layouts.adminDash')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap">
                @foreach ($techs as $tech)
                    <div class="card my-4 mx-2" style="width: 18rem;">
                        <div class="card-body d-flex flex-column justify-content-between">

                            <div>
                                <p class="card-text text-dark">
                                    <a href="{{ route('admin.technologies.show', $tech->id) }}">
                                        <i class="{{ $tech->icon }} text-dark">Non capisco perchè non spunta l'icon</i>
                                    </a>
                                </p>

                                <h2 class="card-title">{{ $tech->name }}</h2>
                                <h5>Projects: </h5><br>
                                <ul> 
                                    @foreach($tech->projects as $project)
                                      <li>
                                        <a href="{{ route('admin.projects.show', $project->id) }}" class="text-primary text-decoration-underline">
                                            {{ $project->titolo }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <p class="descrizone card-text overflow-auto">{{ $tech->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
