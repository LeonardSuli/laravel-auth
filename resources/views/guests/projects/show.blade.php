@extends('layouts.app')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <h1 class="display-5 fw-bold">{{ $project->name }}</h1>

        </div>
    </div>


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

                <h3><strong>Project name: </strong> {{ $project->name }}</h3>

                <p class="my-4"><strong>Description: </strong> {{ $project->description }}</p>

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
