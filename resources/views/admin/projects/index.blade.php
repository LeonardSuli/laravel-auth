@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-secondary">
        <div class="container">
            <h1>Projects</h1>
        </div>
    </header>

    <div class="container mt-5">
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
                                <img width="120px" src="{{ $project->cover_image }}" alt="">
                            </td>
                            <td>{{ $project->name }}</td>
                            <td>
                                <a href="{{ $project->project_url }}" target="__blank">Previw</a>
                            </td>
                            <td>
                                <a href="{{ $project->source_code_url }}" target="__blank">Source code</a>
                            </td>
                            <td>View Edit Delete</td>
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
