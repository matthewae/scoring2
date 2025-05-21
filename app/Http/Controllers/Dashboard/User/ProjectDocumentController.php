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
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240', // 10MB max
            'catatan' => 'nullable|string|max:1000',
            'sumber' => 'nullable|string|max:255'
        ]);

        $documentType = DocumentType::findOrFail($request->document_type_id);

        try {
            $document = new ProjectDocument([
                'project_id' => $project->id,
                'document_type_code' => $documentType->code,
                'status' => 'pending',
                'remarks' => $request->catatan,
                'uploaded_by' => auth()->id()
            ]);

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs(
                    'project-documents/' . $project->id,
                    $fileName,
                    'public'
                );
                $document->file_path = $filePath;
            }

            $document->save();

            return redirect()
                ->route('dashboard.user.projects.show', $project)
                ->with('success', 'Dokumen berhasil diunggah!');
        } catch (\Exception $e) {
            \Log::error('Error uploading document: ' . $e->getMessage());
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat mengunggah dokumen. Silakan coba lagi.');
        }
            ->route('dashboard.user.projects.show', $project)
            ->with('success', 'Dokumen berhasil ditambahkan!');
    }

    public function show(Project $project, ProjectDocument $document)
    {
        $this->authorize('view', $project);
        return view('dashboard.user.project-documents.show', compact('project', 'document'));
    }

    public function download(Project $project, ProjectDocument $document)
    {
        $this->authorize('view', $project);

        if (!Storage::disk('public')->exists($document->file_path)) {
            return back()->with('error', 'File tidak ditemukan.');
        }

        return Storage::disk('public')->download($document->file_path, basename($document->file_path));
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