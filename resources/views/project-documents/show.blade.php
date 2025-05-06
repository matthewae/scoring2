@extends('layouts.app-with-sidebar')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Detail Dokumen Project</h2>
        <a href="{{ route('dashboard.user.project-documents.create', $project) }}" class="text-gray-600 hover:text-gray-800">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Form Upload
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Project Information -->
    <div class="mb-8">
        <h3 class="text-lg font-semibold mb-4">Informasi Project</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-600">Nama Project:</p>
                <p class="font-medium">{{ $project->name }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Status:</p>
                <span class="px-3 py-1 text-sm rounded-full inline-flex items-center
                    {{ $project->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                        ($project->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                    {{ ucfirst($project->status) }}
                </span>
            </div>
            <div class="col-span-2">
                <p class="text-sm text-gray-600">Deskripsi:</p>
                <p>{{ $project->description }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Diajukan Oleh:</p>
                <p>{{ $project->guest->name }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Tanggal Pengajuan:</p>
                <p>{{ $project->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>
    </div>

    <!-- Document Files -->
    <div class="mb-8">
        <h3 class="text-lg font-semibold mb-4">Dokumen</h3>
        <div class="space-y-4">
            @forelse($project->documents as $document)
                <div class="flex items-center justify-between p-4 border rounded-lg">
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                        <div>
                            <p class="font-medium">{{ $document->original_name }}</p>
                            <p class="text-sm text-gray-500">Uploaded {{ $document->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <a href="{{ route('project-documents.download', $document) }}" 
                        class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-download mr-1"></i> Download
                    </a>
                </div>
            @empty
                <p class="text-gray-500 text-center py-4">Tidak ada dokumen yang tersedia.</p>
            @endforelse
        </div>
    </div>

    <!-- Assessment Form -->
    @if($project->status === 'pending')
        <div class="border-t pt-6">
            <h3 class="text-lg font-semibold mb-4">Form Penilaian</h3>
            <form action="{{ route('project-documents.update-status', $project) }}" method="POST" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <div class="space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="status" value="approved" class="text-blue-600" required>
                            <span class="ml-2">Setuju</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="status" value="rejected" class="text-blue-600" required>
                            <span class="ml-2">Tolak</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="feedback" class="block text-sm font-medium text-gray-700 mb-2">Feedback</label>
                    <textarea name="feedback" id="feedback" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                        <i class="fas fa-save mr-2"></i>Simpan Penilaian
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
@endsection