@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-secondary">
        <div class="container">
            <h1>New Projects</h1>
        </div>
    </header>

    <div class="container my-5">

        {{-- Errors --}}
        @include('partials.errors')

        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelper"
                    placeholder="New project" value="{{ old('name') }}" />
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
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="d-flex flex-wrap gap-2">

                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $technology->id }}"
                            id="technology-{{ $technology->id }}" name="technologies[]"
                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }} />
                        <label class="form-check-label" for="technology-{{ $technology->id }}"> {{ $technology->name }}
                        </label>
                    </div>
                @endforeach

            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Choose file</label>
                <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="Choose a file"
                    aria-describedby="cover_imageHelper" />
                <div id="cover_imageHelper" class="form-text">Upload a cover image</div>

                {{-- Error --}}
                @error('cover_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="project_url" class="form-label">Project URL</label>
                <input type="text" class="form-control" name="project_url" id="project_url"
                    aria-describedby="project_urlHelper" placeholder="www.google.it" value="{{ old('project_url') }}" />
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
                    value="{{ old('source_code_url') }}" />
                <small id="source_code_urlHelper" class="form-text text-muted">Type a source code for your project</small>

                {{-- Error --}}
                @error('source_code_url')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>

                {{-- Error --}}
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Create
            </button>


        </form>
    </div>
@endsection
