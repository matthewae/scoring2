@extends('layouts.app-with-sidebar')

@section('content')
<div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-lg shadow-lg p-8 mb-8 text-white transform hover:scale-[1.02] transition-transform duration-300">
    <h2 class="text-3xl font-bold mb-4 text-white">Selamat Datang di Dashboard User</h2>
    <p class="text-gray-100 mb-4 text-lg">Sebagai user, Anda memiliki akses untuk mengelola dan menilai dokumen konstruksi.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <!-- Kelola Dokumen -->
    <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-[1.02] transition-all duration-300 border border-gray-100">
        <h3 class="text-xl font-semibold mb-4">
            <i class="fas fa-file-alt text-blue-500 mr-2"></i>
            Kelola Dokumen
        </h3>
        <p class="text-gray-600 mb-4">Upload dan kelola dokumen konstruksi.</p>
        <div class="space-y-2">
            <a href="{{ route('dashboard.user.documents.upload') }}" class="block bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-6 py-3 rounded-lg hover:from-purple-700 hover:to-indigo-700 transform hover:scale-[1.02] transition-all duration-300 text-center font-medium">
                <i class="fas fa-upload mr-2"></i> Upload Dokumen
            </a>
            <a href="#" class="block bg-gradient-to-r from-gray-600 to-gray-700 text-white px-6 py-3 rounded-lg hover:from-gray-700 hover:to-gray-800 transform hover:scale-[1.02] transition-all duration-300 text-center font-medium">
                <i class="fas fa-list mr-1"></i> Daftar Dokumen
            </a>
        </div>
    </div>

    <!-- Pengajuan Penilaian -->
    <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-[1.02] transition-all duration-300 border border-gray-100">
        <h3 class="text-xl font-semibold mb-4">
            <i class="fas fa-tasks text-green-500 mr-2"></i>
            Pengajuan Penilaian
        </h3>
        <p class="text-gray-600 mb-4">Daftar pengajuan penilaian dari guest.</p>
        <div class="space-y-4">
            @forelse($assessmentRequests as $request)
                <div class="border border-gray-200 rounded-xl p-5 space-y-3 hover:shadow-md transition-shadow duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-medium">{{ $request->project->name }}</h4>
                            <p class="text-sm text-gray-500">Oleh: {{ $request->guest->name }}</p>
                        </div>
                        <span class="px-3 py-1.5 text-xs font-medium rounded-full {{ $request->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }} shadow-sm">
                            {{ ucfirst($request->status) }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-600">{{ $request->description }}</p>
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('dashboard.user.assessment-requests.show', $request->id) }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium hover:underline transition-all duration-300">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-center py-4">Tidak ada pengajuan penilaian saat ini.</p>
            @endforelse
            <div class="mt-4 text-center">
                <a href="{{ route('dashboard.user.assessment-requests.index') }}" class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transform hover:scale-[1.02] transition-all duration-300 text-center font-medium">
                    <i class="fas fa-list mr-2"></i>Lihat Semua Pengajuan
                </a>
            </div>
                </div>
        </div>
    </div>

    <!-- Statistik -->
    <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-[1.02] transition-all duration-300 border border-gray-100">
        <h3 class="text-xl font-semibold mb-4">
            <i class="fas fa-chart-bar text-purple-500 mr-2"></i>
            Statistik
        </h3>
        <p class="text-gray-600 mb-4">Ringkasan aktivitas penilaian dokumen.</p>
        <div class="space-y-4">
            <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                <span class="text-gray-600">Total Dokumen</span>
                <span class="font-semibold">0</span>
            </div>
            <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                <span class="text-gray-600">Pengajuan Pending</span>
                <span class="font-semibold">{{ $assessmentRequests->where('status', 'pending')->count() }}</span>
            </div>
            <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                <span class="text-gray-600">Pengajuan Selesai</span>
                <span class="font-semibold">{{ $assessmentRequests->where('status', 'completed')->count() }}</span>
            </div>
        </div>
    </div>
</div>
@endsection