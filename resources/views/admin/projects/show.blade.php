@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-secondary">
        <div class="container d-flex justify-content-between align-items-center">

            <h1>Projects: {{ $project->name }}</h1>

            <a href="{{ route('admin.projects.index') }}">Back</a>

        </div>
    </header>

    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-2">

            <div class="col">
                @if (Str::startsWith($project->cover_image, 'https://'))
                    <img loading='lazy' width="100%" src="{{ $project->cover_image }}" alt="">
                @else
                    <img loading='lazy' width="100%" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
                @endif
            </div>

            <div class="col">

                <h3>
                    <strong>Project name: </strong> {{ $project->name }}
                </h3>

                <div class="metadata">
                    <strong>Category: </strong> {{ $project->type ? $project->type->name : 'N/A' }}

                    <div class="technologies d-flex gap-2">

                        <strong>Technologies: </strong>

                        @forelse ($project->technologies as $technology)
                            <span class="badge bg-primary">{{ $technology->name }}</span>

                        @empty

                            <span>N/A</span>
                        @endforelse
                    </div>

                </div>


                <p class="my-4">
                    <strong>Description: </strong> {{ $project->description }}
                </p>

                <div class="links">

                    <a class="btn btn-primary" href="{{ $project->source_code_url }}" role="button">
                        <i class="fas fa-link fa-sm fa-fw"></i> Source Code
                    </a>

                    <a class="btn btn-primary" href="{{ $project->project_url }}" role="button">
                        <i class="fas fa-link fa-sm fa-fw"></i> URL
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection
