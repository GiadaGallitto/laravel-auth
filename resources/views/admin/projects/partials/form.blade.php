<form action="{{ route($route, $project->id) }}" method="POST">
    @csrf
    @method($method)

    @if ($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}">
    </div>

    <div class="mb-3">
        <label for="argument" class="form-label">Argument</label>
        <input type="text" class="form-control" id="argument" name="argument" value="{{ old('argument', $project->argument )}}">
    </div>

    <div class="mb-3">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $project->start_date )}}">
    </div>

    <div class="mb-3">
        <label for="author">Author</label>
        <input type="text" class="form-control" id="author" name="author" value="{{ old('author',$project->author) }}">
    </div>

    <div class="mb-3">
        <label for="concluded" class="form-label">Concluded</label>
        <input type="text" class="form-control" id="concluded" name="concluded" value="{{ old('concluded', $project->concluded) }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" id="description" class="form-control" name="description" value="{{ old('description', $project->description) }}">
    </div>

    <button type="submit" class="btn btn-primary">Inserisci</button>
</form>
