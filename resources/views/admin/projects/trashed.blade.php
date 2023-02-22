@extends('layouts.admin')

@include('partials.popup')

@section('content')
    <div class="container">

        @if (session('message'))
            <div class="alert alert-{{ session('message_class') }}">
                {{ session('message') }}
            </div>
        @endif
        <div class="row justify-content-around">
            <div class="col-12 d-flex justify-content-end my-3">
                @if (count($projects))
                    <form class="d-inline delete double-confirm" action="{{ route('admin.projects.restore-all') }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary" title="restore all">Restore all</button>
                    </form>
                @endif
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Author</th>
                        <th class="col">Concluded</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->start_date }}</td>
                            <td>{{ $project->author }}</td>
                            <td>{{ $project->concluded }}</td>
                            <td>
                                <form class="d-inline-block" action="{{ route('admin.projects.restore', $project->slug) }}"
                                    method="POST" data-element-name="{{ $project->title }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-success">Restore</button>
                                </form>

                                <form class="d-inline-block form-delete double-confirm"
                                    action="{{ route('admin.projects.force-delete', $project->slug) }}" method="POST"
                                    data-element-name="{{ $project->title }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($projects->isEmpty())
                <div class="empty-message mt-3 text-muted">
                    <h5>No items in the bin</h5>
                </div>
            @endif
        </div>

    </div>
@endsection

@section('script')
    @vite('resources/js/delete.js')
@endsection
