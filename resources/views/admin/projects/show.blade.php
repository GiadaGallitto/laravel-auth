@extends('layouts.admin')

@section('content')
    <div class="comic">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-12">
                    <div class="card mt-4 p-4">
                        <div class="card-title text-center">
                            <h2>{{$project->title}}</h2>
                        </div>
                        <div class="card-subtitle text-center">
                            <h4>{{$project->argument}}</h4>
                        </div>
                        <h5 class="my-3"><strong>Author: </strong>{{$project->author}}</h5>
                        <p><strong>Start date: </strong>{{$project->start_date}}</p>
                        <p><strong>Description: </strong><br>
                            {{$project->description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection