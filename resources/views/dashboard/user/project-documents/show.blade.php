@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Dokumen</h1>
            <a href="{{ route('dashboard.user.projects.show', $project) }}" class="text-blue-600 hover:text-blue-800">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Proyek
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Informasi Dokumen</h2>
                <div class="space-y-3">
                    <div>
                        <span class="text-gray-600 font-medium">Tipe Dokumen:</span>
                        <span class="ml-2">{{ $document->documentType->name }}</span>
                    </div>
                    <div>
                        <span class="text-gray-600 font-medium">Status:</span>
                        <span class="ml-2 px-3 py-1 rounded-full text-sm {{ $document->status === 'approved' ? 'bg-green-100 text-green-800' : ($document->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ ucfirst($document->status) }}
                        </span>
                    </div>
                    @if($document->score)
                    <div>
                        <span class="text-gray-600 font-medium">Skor:</span>
                        <span class="ml-2">{{ $document->score }}</span>
                    </div>
                    @endif
                    @if($document->remarks)
                    <div>
                        <span class="text-gray-600 font-medium">Catatan:</span>
                        <p class="mt-1 text-gray-700">{{ $document->remarks }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div>
                <h2 class="text-lg font-semibold text-gray-700 mb-2">File Dokumen</h2>
                <div class="border rounded-lg p-4 bg-gray-50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="far fa-file-pdf text-red-500 text-2xl mr-3"></i>
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ basename($document->file_path) }}</p>
                                <p class="text-xs text-gray-500">Diunggah pada: {{ $document->created_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                        <a href="{{ Storage::url($document->file_path) }}" 
                            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition-colors duration-200"
                            target="_blank"
                            download>
                            <i class="fas fa-download mr-2"></i>
                            Download
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @can('update', $project)
        <div class="mt-6 border-t pt-6">
            <form action="{{ route('dashboard.user.project-documents.destroy', [$project, $document]) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">
                    <i class="fas fa-trash-alt mr-2"></i>Hapus Dokumen
                </button>
            </form>
        </div>
        @endcan
    </div>
</div>
@endsection