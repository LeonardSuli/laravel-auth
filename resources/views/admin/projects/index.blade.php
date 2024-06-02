@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-secondary">
        <div class="container">
            <h1>Projects</h1>
        </div>
    </header>

    <div class="container mt-5">

        {{-- Flash redirect --}}
        @include('partials.session-message')

        <div class="table-responsive-md">
            <table class="table table-striped table-hover table-borderless table-secondary align-middle">
                <thead class="table-dark">
                    <caption>
                        Projects
                    </caption>
                    <tr>
                        <th>ID</th>
                        <th>Cover Image</th>
                        <th>Name</th>
                        <th>URL</th>
                        <th>Source</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    @forelse ($projects as $project)
                        <tr class="table-dark">

                            <td scope="row">{{ $project->id }}</td>

                            <td>
                                @if (Str::startsWith($project->cover_image, 'https://'))
                                    <img loading='lazy' width="120px" src="{{ $project->cover_image }}" alt="">
                                @else
                                    <img loading='lazy' width="120px" src="{{ asset('storage/' . $project->cover_image) }}"
                                        alt="">
                                @endif
                            </td>

                            <td>{{ $project->name }}</td>

                            <td>
                                <a href="{{ $project->project_url }}" target="__blank">Previw</a>
                            </td>

                            <td>
                                <a href="{{ $project->source_code_url }}" target="__blank">Source code</a>
                            </td>

                            <td>

                                <a class="btn btn-primary btn-sm" href="{{ route('admin.projects.show', $project) }}">
                                    <i class="fas fa-eye fa-xs fa-fw"></i> View
                                </a>

                                <a class="btn btn-secondary btn-sm" href="{{ route('admin.projects.edit', $project) }}">
                                    <i class="fas fa-pencil fa-xs fa-fw"></i> Edit
                                </a>

                                @include('admin.projects.partials.delete-modal')


                                {{-- <i class="fas fa-trash fa-xs fa-fw"></i> --}}
                                {{-- Delete --}}
                            </td>

                        </tr>
                    @empty

                        <tr class="table-dark">
                            <td scope="row" colspan="6">No projects here.</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>

    </div>
@endsection
