<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    public function index()
    {
        $documentTypes = DocumentType::withCount('projects')->get();
        return view('document-types.index', compact('documentTypes'));
    }

    public function create()
    {
        return view('document-types.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:document_types',
            'description' => 'required|string',
            'weight' => 'required|numeric|min:0|max:100',
            'is_required' => 'boolean'
        ]);

        DocumentType::create($validatedData);

        return redirect()->route('document-types.index')
            ->with('success', 'Tipe dokumen berhasil dibuat.');
    }

    public function show(DocumentType $documentType)
    {
        $documentType->load('projects');
        return view('document-types.show', compact('documentType'));
    }

    public function edit(DocumentType $documentType)
    {
        return view('document-types.edit', compact('documentType'));
    }

    public function update(Request $request, DocumentType $documentType)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:document_types,name,' . $documentType->id,
            'description' => 'required|string',
            'weight' => 'required|numeric|min:0|max:100',
            'is_required' => 'boolean'
        ]);

        $documentType->update($validatedData);

        return redirect()->route('document-types.show', $documentType)
            ->with('success', 'Tipe dokumen berhasil diperbarui.');
    }

    public function destroy(DocumentType $documentType)
    {
        if ($documentType->projects()->exists()) {
            return redirect()->route('document-types.index')
                ->with('error', 'Tidak dapat menghapus tipe dokumen yang masih digunakan oleh project.');
        }

        $documentType->delete();
        return redirect()->route('document-types.index')
            ->with('success', 'Tipe dokumen berhasil dihapus.');
    }
}