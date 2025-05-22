<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\ProjectDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestProjectDocumentController extends Controller
{
    public function history(Request $request)
    {
        $projectDocuments = ProjectDocument::with(['project', 'documentType'])
            ->whereHas('project', function ($query) use ($request) {
                $query->where('guest_id', auth()->id());
            })
            ->latest()
            ->paginate(10);

        return view('dashboard.guest.project-documents.history', compact('projectDocuments'));
    }

    public function show(ProjectDocument $projectDocument)
    {
        // Authorize that the authenticated guest owns this document
        if ($projectDocument->project->guest_id !== auth()->id()) {
            abort(403);
        }

        return view('dashboard.guest.project-documents.show', compact('projectDocument'));
    }

    public function download(ProjectDocument $projectDocument)
    {
        // Authorize that the authenticated guest owns this document
        if ($projectDocument->project->guest_id !== auth()->id()) {
            abort(403);
        }

        // Ensure the file exists
        if (!Storage::exists($projectDocument->file_path)) {
            abort(404);
        }

        return Storage::download($projectDocument->file_path, $projectDocument->original_filename);
    }
}