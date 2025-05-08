@extends('layouts.app-with-sidebar')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-4">Upload Dokumen</h2>

    <form action="{{ route('dashboard.user.documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="tahapan" class="block text-sm font-medium text-gray-700">Tahapan</label>
            <input type="text" name="tahapan" id="tahapan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        </div>

        <div>
            <label for="document_type_id" class="block text-sm font-medium text-gray-700">Tipe Dokumen</label>
            <select name="document_type_id" id="document_type_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                <option value="">Pilih Tipe Dokumen</option>
                @foreach($documentTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="sub_document_type_id" class="block text-sm font-medium text-gray-700">Sub Tipe Dokumen (Opsional)</label>
            <select name="sub_document_type_id" id="sub_document_type_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Pilih Sub Tipe Dokumen</option>
                @foreach($documentTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="file" class="block text-sm font-medium text-gray-700">File Dokumen</label>
            <input type="file" name="file" id="file" class="mt-1 block w-full text-sm text-gray-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-md file:border-0
                file:text-sm file:font-semibold
                file:bg-blue-50 file:text-blue-700
                hover:file:bg-blue-100
            " required accept=".pdf,.doc,.docx,.xls,.xlsx">
            <p class="mt-1 text-sm text-gray-500">Format yang diizinkan: PDF, DOC, DOCX, XLS, XLSX (Max. 10MB)</p>
        </div>

        <div>
            <label for="source" class="block text-sm font-medium text-gray-700">Sumber</label>
            <input type="text" name="source" id="source" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        </div>

        <div>
            <label for="notes" class="block text-sm font-medium text-gray-700">Catatan (Opsional)</label>
            <textarea name="notes" id="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                <i class="fas fa-upload mr-1"></i> Upload Dokumen
            </button>
        </div>
    </form>
</div>
@endsection