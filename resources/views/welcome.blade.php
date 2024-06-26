@extends('layouts.app')

@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">

            <div class="row">

                <div class="col-auto">
                    <div class="profile">
                        <img width="200" class="img-fluid rounded-4" src="/img/leo.jpg" alt="">
                    </div>
                </div>

                <div class="col">

                    <h1 class="display-5 fw-bold">
                        My Boolfolio
                    </h1>

                    <p class="col-md-8 fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis minima amet
                        placeat provident velit distinctio rem maiores commodi quod perferendis.
                    </p>

                    <a href="{{ route('guests.projects.index') }}" class="btn btn-primary btn-lg" type="button">Check my
                        project!
                    </a>

                </div>
            </div>

        </div>
    </div>

    <div class="content">
        <div class="container">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi
                deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis
                accusamus dolores!
            </p>

            <div class="row">

                @forelse ($projects as $project)
                    <div class="col">

                        <div class="card">

                            @if (Str::startsWith($project->cover_image, 'https://'))
                                <img loading='lazy' width="100%" src="{{ $project->cover_image }}" alt="">
                            @else
                                <img loading='lazy' width="100%" src="{{ asset('storage/' . $project->cover_image) }}"
                                    alt="">
                            @endif

                            <div class="card-body">

                                <h3>{{ $project->name }}</h3>

                            </div>

                            <div class="card-footer">

                                <a name="" id="" class="btn btn-primary"
                                    href="{{ route('guests.projects.show', $project) }}" role="button">View
                                </a>

                            </div>
                        </div>
                    </div>

                @empty

                    <div class="col">Nothing to show</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
