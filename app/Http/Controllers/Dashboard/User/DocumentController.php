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
            'file' => 'required|file|max:1048576', // 1GB max
            'source' => 'required|string|max:255',
            'notes' => 'nullable|string|max:1000',
        ]);

        try {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Get document type code from selected document type
            $documentType = DocumentType::findOrFail($request->document_type_id);
            
            // Read file content
            $fileContent = file_get_contents($file->getRealPath());
            
            // Create document record
            $document = new ProjectDocument([
                'tahapan' => $request->tahapan,
                'document_type_code' => $documentType->code,
                'document_type_id' => $request->document_type_id,
                'sub_document_type_id' => $request->sub_document_type_id,
                'file_name' => $fileName,
                'file_type' => $file->getClientOriginalExtension(),
                'file_size' => $file->getSize(),
                'file_content' => $fileContent,
                'source' => $request->source,
                'notes' => $request->notes,
                'uploaded_by' => auth()->id(),
                'status' => 'pending',
            ]);

            $document->save();

            return redirect()->route('dashboard.user.documents.index')
                ->with('success', 'Dokumen berhasil diupload.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error uploading document: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $document = ProjectDocument::with(['documentType'])
            ->where('uploaded_by', auth()->id())
            ->findOrFail($id);

        return view('dashboard.user.documents.show', compact('document'));
    }

    public function download($id)
    {
        $document = ProjectDocument::where('uploaded_by', auth()->id())
            ->findOrFail($id);

        return response($document->file_content)
            ->header('Content-Type', $document->file_type)
            ->header('Content-Disposition', 'attachment; filename="' . $document->file_name . '"');
    }
}