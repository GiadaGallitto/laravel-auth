@extends('layouts.admin')

@section('content')
<div class="container">

    @if(session('message'))
        <div class="alert alert-{{session('message_class')}}">
            {{session('message')}}
        </div>
    @endif
    <div class="row justify-content-around">
        <div class="col-12 d-flex justify-content-end my-3">
            <a class="btn btn-outline-primary" href="{{route('admin.projects.create')}}">
                Add new Project
            </a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Argument</th>
                    <th scope="col">Author</th>
                    <th class="col">Concluded</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{$project->id}}</th>
                    <td>{{$project->title}}</td>
                    <td>{{$project->argument}}</td>
                    <td>{{$project->author}}</td>
                    <td>{{$project->concluded}}</td>
                    <td>
                        <a class="btn btn-sm btn-outline-primary" href="{{route('admin.projects.show', $project->slug)}}">Show</a>
                        <a class="btn btn-sm btn-outline-warning" href="{{route('admin.projects.edit', $project->slug)}}">Edit</a>
                        <form class="d-inline-block form-delete" action="{{route('admin.projects.destroy', $project->slug)}}" method="POST" data-element-name="{{$project->title}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $projects->links() }}
</div>
@endsection

@section('script')
    @vite('resources/js/delete.js')
@endsection
