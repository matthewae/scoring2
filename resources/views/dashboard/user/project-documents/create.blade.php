@extends('layouts.app-with-sidebar')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Upload Dokumen Project</h2>
        <a href="{{ route('dashboard.user.projects.show', $project) }}" class="text-gray-600 hover:text-gray-800">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Detail Project
        </a>
    </div>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.user.project-documents.store', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="space-y-4">
            <div>
                <label for="document_type_id" class="block text-sm font-medium text-gray-700 mb-1">Jenis Dokumen</label>
                <select name="document_type_id" id="document_type_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Jenis Dokumen</option>
                    @foreach($documentTypes as $type)
                        <option value="{{ $type->id }}" {{ old('document_type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->no }} - {{ $type->uraian }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="file" class="block text-sm font-medium text-gray-700 mb-1">File Dokumen</label>
                <input type="file" name="file" id="file" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       accept=".pdf,.doc,.docx,.xls,.xlsx">
                <p class="mt-1 text-sm text-gray-500">Format yang diperbolehkan: PDF, DOC, DOCX, XLS, XLSX (Max. 10MB)</p>
            </div>

            <div>
                <label for="sumber" class="block text-sm font-medium text-gray-700 mb-1">Sumber</label>
                <input type="text" name="sumber" id="sumber"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ old('sumber') }}">
            </div>

            <div>
                <label for="catatan" class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
                <textarea name="catatan" id="catatan" rows="4"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('catatan') }}</textarea>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                <i class="fas fa-upload mr-2"></i>Upload Dokumen
            </button>
        </div>
    </form>
</div>
@endsection