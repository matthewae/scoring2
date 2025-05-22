<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['documentTypes', 'guest'])->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $documentTypes = DocumentType::all();
        return view('projects.create', compact('documentTypes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'ministry_institution' => 'required|string|max:255',
            'planning_consultant' => 'required|string|max:255',
            'mk_consultant' => 'required|string|max:255',
            'contractor' => 'required|string|max:255',
            'selection_method' => 'required|string|max:255',
            'contract_value' => 'required|numeric',
            'spmk_date' => 'required|date',
            'duration_days' => 'required|integer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'guest_id' => 'nullable|exists:users,id',
            'status.*' => 'nullable|in:approved,rejected',
            'documents.*.file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'documents.*.catatan' => 'nullable|string',
            'documents.*.sumber' => 'nullable|string'
        ]);

        $project = Project::create($validatedData);

        if ($request->has('documents')) {
            foreach ($request->documents as $code => $document) {
                if (isset($document['file'])) {
                    $file = $document['file'];
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('project-documents', $fileName, 'public');

                    $project->documents()->create([
                        'document_type_code' => $code,
                        'file_path' => $filePath,
                        'notes' => $document['catatan'] ?? null,
                        'source' => $document['sumber'] ?? null,
                        'status' => $request->input('status.' . $code, 'pending'),
                        'uploaded_by' => Auth::id()
                    ]);
                }
            }
        }

        return redirect()->route('projects.show', $project)
            ->with('success', 'Project berhasil dibuat.');
    }

    public function show(Project $project)
    {
        $project->load(['documentTypes', 'guest']);
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $documentTypes = DocumentType::all();
        return view('projects.edit', compact('project', 'documentTypes'));
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'ministry_institution' => 'required|string|max:255',
            'planning_consultant' => 'required|string|max:255',
            'mk_consultant' => 'required|string|max:255',
            'contractor' => 'required|string|max:255',
            'selection_method' => 'required|string|max:255',
            'contract_value' => 'required|numeric',
            'spmk_date' => 'required|date',
            'duration_days' => 'required|integer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'guest_id' => 'nullable|exists:users,id'
        ]);

        $project->update($validatedData);

        if ($request->has('document_types')) {
            $project->documentTypes()->sync($request->document_types);
        }

        return redirect()->route('projects.show', $project)
            ->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil dihapus.');
    }
}