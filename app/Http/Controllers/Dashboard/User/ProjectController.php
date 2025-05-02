<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('dashboard.user.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('dashboard.user.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string',
            'estimated_cost' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:planning,in_progress,completed,on_hold',
        ]);

        $project = new Project($validated);
        $project->user_id = Auth::id();
        $project->save();

        return redirect()
            ->route('dashboard.user.projects.index')
            ->with('success', 'Project berhasil dibuat!');
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);
        return view('dashboard.user.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        return view('dashboard.user.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string',
            'estimated_cost' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:planning,in_progress,completed,on_hold',
        ]);

        $project->update($validated);

        return redirect()
            ->route('dashboard.user.projects.index')
            ->with('success', 'Project berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();

        return redirect()
            ->route('dashboard.user.projects.index')
            ->with('success', 'Project berhasil dihapus!');
    }
}