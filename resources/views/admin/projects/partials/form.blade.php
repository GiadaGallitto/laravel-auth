    @if ($errors->any())
        <div class="alert alert-danger">
            <h4>Check errors</h4>
        </div>
    @endif

<form action="{{ route($route, $project->slug) }}" method="POST">
    @csrf
    @method($method)

    {{-- @if ($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}">
        @error ('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="argument" class="form-label">Argument</label>
        <input type="text" class="form-control @error('argument') is-invalid @enderror" id="argument" name="argument" value="{{ old('argument', $project->argument )}}">
        @error ('argument')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', $project->start_date )}}">
        @error ('start_date')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="author">Author</label>
        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author',$project->author) }}">
        @error ('author')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $project->description) }}">
        @error ('description')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="concluded" class="form-label me-3">Concluded</label>
        <input type="checkbox" class="form-check-input @error('concluded') is-invalid @enderror" id="concluded" name="concluded" value="1" {{ old('concluded', $project->concluded) ? 'checked' : ''}}>
    </div>

    <div class="buttons">
        <a href="{{route('admin.projects.index')}}" class="btn btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
