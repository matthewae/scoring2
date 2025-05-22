<?php

namespace App\Http\Controllers\Dashboard\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\DocumentType;
use App\Models\ProjectDocument;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewProjectDocumentSubmission;

class ProjectDocumentController extends Controller
{
    public function create()
    {
        $documentTypes = DocumentType::orderBy('no')->get();
        $projects = Project::where('guest_id', Auth::id())
            ->orderBy('name')
            ->get();
        return view('dashboard.guest.project-documents.create', compact('documentTypes', 'projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'document_type_id' => 'required|exists:document_types,id',
            'file' => 'required|file|max:10240',
            'catatan' => 'nullable|string',
            'sumber' => 'nullable|string'
        ]);

        $project = Project::where('id', $request->project_id)
            ->where('guest_id', Auth::id())
            ->firstOrFail();

        $documentType = DocumentType::findOrFail($request->document_type_id);

        // Create project document
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

        // Send notification to all users
        $users = User::where('role', 'user')->get();
        Notification::send($users, new NewProjectDocumentSubmission($project));

        return redirect()
            ->route('dashboard.guest')
            ->with('success', 'Dokumen berhasil diajukan dan akan segera diproses oleh tim kami.');
    }

    public function download(ProjectDocument $projectDocument)
    {
        // Verify if the authenticated user has access to this document
        $project = Project::where('id', $projectDocument->project_id)
            ->where('guest_id', Auth::id())
            ->firstOrFail();

        // Check if file exists
        if (!Storage::exists($projectDocument->file_path)) {
            return back()->with('error', 'File tidak ditemukan.');
        }

        // Get original file name or use a default name
        $fileName = basename($projectDocument->file_path);

        // Return file download response
        return Storage::download($projectDocument->file_path, $fileName);
    }
}