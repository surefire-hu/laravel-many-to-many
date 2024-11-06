<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Project::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $projects = $query->with('type')->get();

        $types = Type::all(); // Assicurati di passare le tipologie se necessario

        return view('projects.index', compact('projects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'array|nullable',
            'technologies.*' => 'exists:technologies,id',
        ]);

        $project = Project::create($request->all());
        $project->technologies()->sync($request->technologies);

        return redirect()->route('projects.index')->with('success', 'Progetto creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'array|nullable',
            'technologies.*' => 'exists:technologies,id',
        ]);

        $project->update($request->all());
        $project->technologies()->sync($request->technologies);

        return redirect()->route('projects.index')->with('success', 'Progetto aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Progetto cancellato con successo!');
    }
}
