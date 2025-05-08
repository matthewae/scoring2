<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserDocumentController extends Controller
{
    public function create()
    {
        $documentTypes = DocumentType::all();
        return view('dashboard.user.documents.upload', compact('documentTypes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'tahapan' => 'required|string',
            'document_type_id' => 'required|exists:document_types,id',
            'sub_document_type_id' => 'nullable|exists:document_types,id',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'source' => 'required|string|max:255',
            'notes' => 'nullable|string'
        ]);

        $file = $request->file('file');
        $path = $file->store('documents/user', 'public');

        $document = auth()->user()->documents()->create([
            'tahapan' => $request->tahapan,
            'document_type_id' => $request->document_type_id,
            'sub_document_type_id' => $request->sub_document_type_id,
            'file_path' => $path,
            'source' => $request->source,
            'notes' => $request->notes
        ]);

        return redirect()->back()->with('success', 'Dokumen berhasil diupload.');
    }
}