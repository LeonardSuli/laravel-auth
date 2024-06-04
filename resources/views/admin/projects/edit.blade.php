@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-secondary">
        <div class="container">
            <h1>Edit: {{ $project->name }}</h1>
        </div>
    </header>

    <div class="container my-5">

        {{-- Errors --}}
        @include('partials.errors')

        <form action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelper"
                    placeholder="New project" value="{{ old('name', $project->name) }}" />
                <small id="nameHelper" class="form-text text-muted">Type a name for your project</small>

                {{-- Error --}}
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Project Type</label>
                <select class="form-select" name="type_id" id="type_id">

                    <option selected disabled>Select one</option>

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3 d-flex gap-4">

                @if (Str::startsWith($project->cover_image, 'https://'))
                    <img loading='lazy' width="120px" src="{{ $project->cover_image }}" alt="">
                @else
                    <img loading='lazy' width="120px" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
                @endif

                <div>
                    <label for="cover_image" class="form-label">Choose file</label>
                    <input type="file" class="form-control" name="cover_image" id="cover_image"
                        placeholder="Choose a file" aria-describedby="cover_imageHelper" />
                    <div id="cover_imageHelper" class="form-text">Upload a cover image</div>

                    {{-- Error --}}
                    @error('cover_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

            </div>


            <div class="mb-3">
                <label for="project_url" class="form-label">Project URL</label>
                <input type="text" class="form-control" name="project_url" id="project_url"
                    aria-describedby="project_urlHelper" placeholder="www.google.it"
                    value="{{ old('project_url', $project->project_url) }}" />
                <small id="project_urlHelper" class="form-text text-muted">Type a url for your project</small>

                {{-- Error --}}
                @error('project_url')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="source_code_url" class="form-label">Source code URL</label>
                <input type="text" class="form-control" name="source_code_url" id="source_code_url"
                    aria-describedby="source_code_urlHelper" placeholder="www.google.it"
                    value="{{ old('source_code_url', $project->source_code_url) }}" />
                <small id="source_code_urlHelper" class="form-text text-muted">Type a source code for your project</small>

                {{-- Error --}}
                @error('source_code_url')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $project->description) }}</textarea>

                {{-- Error --}}
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Update
            </button>


        </form>
    </div>
@endsection
