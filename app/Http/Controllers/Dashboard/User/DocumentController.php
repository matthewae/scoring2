<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\DocumentType;
use App\Models\ProjectDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = ProjectDocument::where('uploaded_by', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('dashboard.user.documents.index', compact('documents'));
    }

    public function create()
    {
        $documentTypes = DocumentType::all();
        return view('dashboard.user.documents.upload', compact('documentTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahapan' => 'required|string|max:255',
            'document_type_id' => 'required|exists:document_types,id',
            'sub_document_type_id' => 'nullable|exists:document_types,id',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'source' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $file = $request->file('file');
        $path = $file->store('documents/user', 'public');

        $document = new ProjectDocument([
            'tahapan' => $request->tahapan,
            'document_type_id' => $request->document_type_id,
            'sub_document_type_id' => $request->sub_document_type_id,
            'file_path' => $path,
            'source' => $request->source,
            'notes' => $request->notes,
            'uploaded_by' => auth()->id(),
            'status' => 'pending',
        ]);

        $document->save();

        return redirect()->route('dashboard.user.documents.index')
            ->with('success', 'Dokumen berhasil diupload.');
    }
}