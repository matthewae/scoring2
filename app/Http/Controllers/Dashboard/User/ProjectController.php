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
        $projects = Project::with(['documents', 'documentTypes'])
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
            'status.*' => 'nullable|in:approved,rejected',
            'documents' => 'nullable|array',
            'documents.*.file' => 'nullable|file|max:10240',
            'documents.*.catatan' => 'nullable|string',
            'documents.*.sumber' => 'nullable|string',
        ]);

        try {
            $project = new Project();
            $project->name = $validated['name'];
            $project->location = $validated['location'];
            $project->ministry_institution = $validated['ministry_institution'];
            $project->planning_consultant = $validated['planning_consultant'];
            $project->mk_consultant = $validated['mk_consultant'];
            $project->contractor = $validated['contractor'];
            $project->selection_method = $validated['selection_method'];
            $project->contract_value = $validated['contract_value'];
            $project->spmk_date = $validated['spmk_date'];
            $project->duration_days = $validated['duration_days'];
            $project->status = 'active';
            $project->user_id = Auth::id();
            $project->save();

            // Store document types and files
            if ($request->has('status')) {
                foreach ($request->status as $documentTypeCode => $status) {
                    // Create project document type record
                    $project->documentTypes()->create([
                        'document_type_code' => $documentTypeCode,
                        'is_required' => true
                    ]);

                    $documentData = [
                        'document_type_code' => $documentTypeCode,
                        'status' => $status,
                        'catatan' => $request->input("documents.{$documentTypeCode}.catatan"),
                        'sumber' => $request->input("documents.{$documentTypeCode}.sumber"),
                        'uploaded_by' => Auth::id()
                    ];

                    // Handle file upload if exists
                    if ($request->hasFile("documents.{$documentTypeCode}.file")) {
                        $file = $request->file("documents.{$documentTypeCode}.file");
                        $path = $file->store('project-documents/' . $project->id, 'public');
                        $documentData['file_path'] = $path;
                    }

                    $project->documents()->create($documentData);
                }
            }

            return redirect()->route('dashboard.user.projects.index')
                ->with('success', 'Project berhasil dibuat beserta dokumen-dokumennya.');

        } catch (\Exception $e) {
            \Log::error('Error creating project: ' . $e->getMessage());
            return back()
                ->with('error', 'Terjadi kesalahan saat menyimpan project. Silakan coba lagi.')
                ->withInput();
        }
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);
        return view('dashboard.user.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        $documentTypes = DocumentType::all();
        return view('dashboard.user.projects.edit', compact('project', 'documentTypes'));
    }

    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);

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
            'status.*' => 'nullable|in:approved,rejected',
            'documents' => 'nullable|array',
            'documents.*.file' => 'nullable|file|max:10240',
            'documents.*.catatan' => 'nullable|string',
            'documents.*.sumber' => 'nullable|string',
        ]);

        try {
            // Update project details
            $project->update([
                'name' => $validated['name'],
                'location' => $validated['location'],
                'ministry_institution' => $validated['ministry_institution'],
                'planning_consultant' => $validated['planning_consultant'],
                'mk_consultant' => $validated['mk_consultant'],
                'contractor' => $validated['contractor'],
                'selection_method' => $validated['selection_method'],
                'contract_value' => $validated['contract_value'],
                'spmk_date' => $validated['spmk_date'],
                'duration_days' => $validated['duration_days']
            ]);

            // Update document statuses and files
            foreach ($request->status as $documentTypeCode => $status) {
                $documentData = [
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

                // Update or create document
                $project->documents()->updateOrCreate(
                    ['document_type_code' => $documentTypeCode],
                    $documentData
                );
            }

            return redirect()
                ->route('dashboard.user.projects.index')
                ->with('success', 'Project berhasil diperbarui beserta dokumen-dokumennya.');

        } catch (\Exception $e) {
            \Log::error('Error updating project: ' . $e->getMessage());
            return back()
                ->with('error', 'Terjadi kesalahan saat memperbarui project. Silakan coba lagi.')
                ->withInput();
        }
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