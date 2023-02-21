@extends('layouts.admin')

@section('content')
    <div class="project">
        <div class="container">
            <div class="card mt-4 p-4 text-center">
                <div class="card-header">
                    <strong>Author: </strong>{{ $project->author }}
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $project->title }}</h2>
                    </div>
                    <div class="card-subtitle">
                        <h4>{{ $project->argument }}</h4>
                    </div>
                    <p><strong>Description: </strong><br>
                        {{ $project->description }}
                    </p>
                    <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-outline-warning">
                        Edit
                    </a>
                    <form class="d-inline-block form-delete" action="{{route('admin.projects.destroy', $project->slug)}}" method="POST" data-element-name="{{$project->title}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger">Delete</button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    <span><strong>Start date: </strong>{{ $project->start_date }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite('resources/js/delete.js')
@endsection
