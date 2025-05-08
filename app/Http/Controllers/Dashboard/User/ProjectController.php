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
            'institution' => 'required|string',
            'planning_consultant' => 'required|string',
            'supervision_consultant' => 'required|string',
            'contractor' => 'required|string',
            'selection_method' => 'required|in:tender,direct_appointment,direct_procurement',
            'contract_value' => 'required|numeric|min:0',
            'spmk_date' => 'required|date',
            'duration' => 'required|integer|min:1',
        ]);

        // Validasi dokumen wajib
        $documentTypes = DocumentType::where('is_file_required', true)->get();
        foreach ($documentTypes as $docType) {
            if (!$request->hasFile("documents.{$docType->code}.file")) {
                return back()
                    ->withErrors(["documents.{$docType->code}.file" => "Dokumen {$docType->uraian} wajib diupload."])
                    ->withInput();
            }
        }

        $project = new Project($validated);
        $project->user_id = Auth::id();
        $project->save();

        // Simpan semua tipe dokumen dari seeder
        $allDocumentTypes = DocumentType::all();
        foreach ($allDocumentTypes as $docType) {
            $documentData = [
                'no' => $docType->no,
                'tahapan' => $docType->tahapan,
                'uraian' => $docType->uraian,
                'kelengkapan' => false,
                'catatan' => null,
                'sumber' => null,
                'file_path' => null
            ];

            // Jika ada file yang diupload untuk dokumen ini
            if ($request->hasFile("documents.{$docType->code}.file")) {
                $file = $request->file("documents.{$docType->code}.file");
                $documentData['file_path'] = $file->store('project-documents/' . $project->id);
                $documentData['kelengkapan'] = true;
                $documentData['catatan'] = $request->input("documents.{$docType->code}.catatan");
                $documentData['sumber'] = $request->input("documents.{$docType->code}.sumber");
            }

            $project->documents()->create($documentData);
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