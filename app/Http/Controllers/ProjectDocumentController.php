<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\DocumentType;
use App\Models\ProjectDocument;
use App\Models\AssessmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectDocumentController extends Controller
{
    /**
     * Show the form for creating a new project document.
     */
    public function create()
    {
        $documentTypes = DocumentType::all();
        return view('project-documents.create', compact('documentTypes'));
    }

    /**
     * Store a newly created project document in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'document' => [
                    'required',
                    'file',
                    'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar,7z,txt,jpg,jpeg,png,gif',
                    'max:1048576', // 1GB max
                ],
            ]);

            $project = Project::create([
                'name' => $request->name,
                'description' => $request->description,
                'guest_id' => Auth::id() ?? null,
                'status' => 'pending'
            ]);

            if ($request->hasFile('document')) {
                $file = $request->file('document');
                
                // Generate unique filename
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                
                // Store file with unique name
                $path = $file->storeAs(
                    'project-documents/' . $project->id,
                    $filename,
                    'public'
                );
                
                // Create document record with detailed information
                ProjectDocument::create([
                    'project_id' => $project->id,
                    'file_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                    'file_size' => $file->getSize(),
                    'file_path' => $path,
                    'uploaded_by' => Auth::id() ?? 'guest',
                    'status' => 'pending',
                    'notes' => 'File uploaded successfully',
                    'source' => request()->ip()
                ]);
            }

        // Create assessment request
        AssessmentRequest::create([
            'project_id' => $project->id,
            'guest_id' => Auth::id(),
            'status' => 'pending',
            'description' => $request->description
        ]);

        return redirect()->route('dashboard.guest')->with('success', 'Dokumen berhasil diajukan untuk penilaian.');
    }

    /**
     * Display the specified project document.
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);
        return view('project-documents.show', compact('project'));
    }

    /**
     * Update the specified project document status.
     */
    public function updateStatus(Request $request, Project $project)
    {
        $this->authorize('update', $project);

        $request->validate([
            'status' => 'required|in:approved,rejected',
            'feedback' => 'required|string'
        ]);

        $project->update([
            'status' => $request->status,
            'feedback' => $request->feedback,
            'reviewed_by' => Auth::id(),
            'reviewed_at' => now()
        ]);

        // Update assessment request status
        $project->assessmentRequest->update([
            'status' => $request->status === 'approved' ? 'completed' : 'rejected'
        ]);

        return redirect()->back()->with('success', 'Status dokumen berhasil diperbarui.');
    }

    /**
     * Download the project document file.
     */
    public function download(ProjectDocument $document)
    {
        $this->authorize('view', $document->project);
        $this->authorize('download', $document->project);

        if (!$document->file_path || !Storage::disk('public')->exists($document->file_path)) {
            return back()->with('error', 'File tidak ditemukan.');
        }

        return Storage::disk('public')->download(
            $document->file_path,
            $document->file_name,
            [
                'Content-Type' => $document->file_type,
                'Content-Length' => $document->file_size
            ]
        );
    }

    /**
     * Update project document.
     */
    public function update(Request $request, ProjectDocument $document)
    {
        $request->validate([
            'no' => 'required|string',
            'tahapan' => 'required|string',
            'uraian' => 'required|string',
            'kelengkapan' => 'required|boolean',
            'catatan' => 'nullable|string',
            'sumber' => 'nullable|string',
            'file' => 'nullable|file|max:1048576' // 1GB max
        ]);

        $data = $request->except('file');

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Delete old file if exists
            if ($document->file_path) {
                Storage::disk('public')->delete($document->file_path);
            }
            $data['file_path'] = $request->file('file')->store('project-documents', 'public');
        }

        $document->update($data);

        return redirect()->back()->with('success', 'Dokumen berhasil diperbarui.');
    }

    /**
     * Delete project document.
     */
    public function destroy(ProjectDocument $document)
    {
        if ($document->file_path) {
            Storage::disk('public')->delete($document->file_path);
        }

        $document->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
    }
}