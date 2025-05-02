@extends('layouts.app-with-sidebar')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <h2 class="text-2xl font-bold mb-4">Selamat Datang di Dashboard User</h2>
    <p class="text-gray-600 mb-4">Sebagai user, Anda memiliki akses untuk mengelola dan menilai dokumen konstruksi.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Kelola Dokumen -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-xl font-semibold mb-4">
            <i class="fas fa-file-alt text-blue-500 mr-2"></i>
            Kelola Dokumen
        </h3>
        <p class="text-gray-600 mb-4">Upload dan kelola dokumen konstruksi.</p>
        <div class="space-y-2">
            <a href="#" class="block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-center">
                <i class="fas fa-upload mr-1"></i> Upload Dokumen
            </a>
            <a href="#" class="block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-center">
                <i class="fas fa-list mr-1"></i> Daftar Dokumen
            </a>
        </div>
    </div>

    <!-- Pengajuan Penilaian -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-xl font-semibold mb-4">
            <i class="fas fa-tasks text-green-500 mr-2"></i>
            Pengajuan Penilaian
        </h3>
        <p class="text-gray-600 mb-4">Daftar pengajuan penilaian dari guest.</p>
        <div class="space-y-4">
            @forelse($assessmentRequests as $request)
                <div class="border rounded-lg p-4 space-y-2">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-medium">{{ $request->project->name }}</h4>
                            <p class="text-sm text-gray-500">Oleh: {{ $request->guest->name }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs rounded-full {{ $request->status === 'pending' ? 'bg-yellow-200 text-yellow-800' : 'bg-green-200 text-green-800' }}">
                            {{ ucfirst($request->status) }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-600">{{ $request->description }}</p>
                    <div class="flex justify-end space-x-2">
                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-center py-4">Tidak ada pengajuan penilaian saat ini.</p>
            @endforelse
        </div>
    </div>

    <!-- Statistik -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-xl font-semibold mb-4">
            <i class="fas fa-chart-bar text-purple-500 mr-2"></i>
            Statistik
        </h3>
        <p class="text-gray-600 mb-4">Ringkasan aktivitas penilaian dokumen.</p>
        <div class="space-y-4">
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                <span class="text-gray-600">Total Dokumen</span>
                <span class="font-semibold">0</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                <span class="text-gray-600">Pengajuan Pending</span>
                <span class="font-semibold">{{ $assessmentRequests->where('status', 'pending')->count() }}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                <span class="text-gray-600">Pengajuan Selesai</span>
                <span class="font-semibold">{{ $assessmentRequests->where('status', 'completed')->count() }}</span>
            </div>
        </div>
    </div>
</div>
@endsection