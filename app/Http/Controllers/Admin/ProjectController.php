<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Project::all());

        return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate(10)]);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }





    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // dd($request->all());

        $validated = $request->validated();

        if ($request->has('cover_image')) {

            $validated['cover_image'] = Storage::put('uploads', $request->cover_image);
        }

        // dd($validated);

        $project = Project::create($validated);

        if ($request->has('technologies')) {

            $project->technologies()->attach($validated['technologies']);
        }

        return to_route('admin.projects.index')->with('message', 'Project added correctly!!');
    }





    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }





    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // dd($request->all());

        // validate inputs
        $validated = $request->validated();

        // aggiorno la cover_image
        if ($request->has('cover_image')) {

            if ($project->cover_image) {

                Storage::delete($project->cover_image);
            }

            $image_path = Storage::put('uploads', $request->cover_image);

            $validated['cover_image'] = $image_path;
        }

        // dd($validated);

        // Aggiorno modello
        $project->update($validated);

        if ($request->has('technologies')) {

            $project->technologies()->sync($validated['technologies']);
        }

        return to_route('admin.projects.index')->with('message', 'Project updated correctly!!');
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Da fare solo se non c'è 'cascadeOnDelete' nella migrations
        // $project->technologies()->detach();

        if ($project->cover_image && !Str::startsWith($project->cover_image, 'https://')) {

            Storage::delete($project->cover_image);
        }

        $project->delete();

        return to_route('admin.projects.index')->with('message', 'Project deleted correctly!!');
    }
}
