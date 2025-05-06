<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\DocumentType;
use App\Models\ProjectDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectDocumentController extends Controller
{
    public function create(Project $project)
    {
        $this->authorize('update', $project);
        $documentTypes = DocumentType::all();
        return view('dashboard.user.project-documents.create', compact('project', 'documentTypes'));
    }

    public function store(Request $request, Project $project)
    {
        $this->authorize('update', $project);

        $request->validate([
            'document_type_id' => 'required|exists:document_types,id',
            'file' => 'required|file|max:10240',
            'catatan' => 'nullable|string',
            'sumber' => 'nullable|string'
        ]);

        $documentType = DocumentType::findOrFail($request->document_type_id);

        $document = new ProjectDocument([
            'no' => $documentType->no,
            'tahapan' => $documentType->tahapan,
            'uraian' => $documentType->uraian,
            'kelengkapan' => true,
            'catatan' => $request->catatan,
            'sumber' => $request->sumber
        ]);

        if ($request->hasFile('file')) {
            $document->file_path = $request->file('file')->store('project-documents/' . $project->id);
        }

        $project->documents()->save($document);

        return redirect()
            ->route('dashboard.user.projects.show', $project)
            ->with('success', 'Dokumen berhasil ditambahkan!');
    }

    public function show(Project $project, ProjectDocument $document)
    {
        $this->authorize('view', $project);
        return view('dashboard.user.project-documents.show', compact('project', 'document'));
    }

    public function destroy(Project $project, ProjectDocument $document)
    {
        $this->authorize('update', $project);

        if ($document->file_path) {
            Storage::delete($document->file_path);
        }

        $document->delete();

        return redirect()
            ->route('dashboard.user.projects.show', $project)
            ->with('success', 'Dokumen berhasil dihapus!');
    }
}