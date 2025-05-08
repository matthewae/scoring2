<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $documentTypes = DocumentType::all();
        return view('dashboard.user.projects.create', compact('documentTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'ministry_institution' => 'required|string',
            'planning_consultant' => 'required|string',
            'mk_consultant' => 'required|string',
            'contractor' => 'required|string',
            'selection_method' => 'required|in:tender,direct_appointment,direct_procurement',
            'contract_value' => 'required|numeric|min:0',
            'spmk_date' => 'required|date',
            'duration_days' => 'required|integer|min:1',
            'status.*' => 'required|in:approved,rejected',
            'documents.*.file' => 'nullable|file|max:10240',
            'documents.*.catatan' => 'nullable|string',
            'documents.*.sumber' => 'nullable|string',
        ]);

        try {
            $project = new Project();
            $project->name = $request->name;
            $project->location = $request->location;
            $project->ministry_institution = $request->ministry_institution;
            $project->planning_consultant = $request->planning_consultant;
            $project->mk_consultant = $request->mk_consultant;
            $project->contractor = $request->contractor;
            $project->selection_method = $request->selection_method;
            $project->contract_value = $request->contract_value;
            $project->spmk_date = $request->spmk_date;
            $project->duration_days = $request->duration_days;
            $project->status = 'planning';
            $project->user_id = Auth::id();
            $project->save();

            // Store document statuses and files
            foreach ($request->status as $documentTypeCode => $status) {
                $documentData = [
                    'document_type_code' => $documentTypeCode,
                    'status' => $status,
                    'catatan' => $request->input("documents.{$documentTypeCode}.catatan"),
                    'sumber' => $request->input("documents.{$documentTypeCode}.sumber"),
                ];

                // Handle file upload if exists
                if ($request->hasFile("documents.{$documentTypeCode}.file")) {
                    $file = $request->file("documents.{$documentTypeCode}.file");
                    $path = $file->store('project-documents/' . $project->id, 'public');
                    $documentData['file_path'] = $path;
                }

                $project->documents()->create($documentData);
            }

            return redirect()->route('dashboard.user.projects.index')
                ->with('success', 'Project berhasil dibuat beserta dokumen-dokumennya.');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan project. Silakan coba lagi.')
                ->withInput();
        }

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