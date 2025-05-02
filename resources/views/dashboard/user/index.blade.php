<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Scoring Dokumen Konstruksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="text-xl font-semibold text-gray-800">Scoring Dokumen Konstruksi</div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">Welcome, {{ Auth::user()->username }}</span>
                    <span class="px-2 py-1 bg-green-200 text-green-800 rounded-full text-xs">User</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-2xl font-bold mb-4">Selamat Datang di Dashboard User</h2>
            <p class="text-gray-600 mb-4">Sebagai user, Anda memiliki akses penuh untuk mengelola dan menilai dokumen konstruksi.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Kelola Dokumen -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4">Kelola Dokumen</h3>
                <p class="text-gray-600 mb-4">Upload, edit, dan hapus dokumen konstruksi.</p>
                <div class="space-y-2">
                    <a href="#" class="block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-center">Upload Dokumen</a>
                    <a href="#" class="block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-center">Daftar Dokumen</a>
                </div>
            </div>

            <!-- Pengajuan Penilaian -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4">Pengajuan Penilaian</h3>
                <p class="text-gray-600 mb-4">Daftar pengajuan penilaian dari guest.</p>
                <div class="space-y-4">
                    @forelse($assessmentRequests as $request)
                        <div class="border rounded-lg p-4 space-y-2">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-semibold">{{ $request->project->name }}</h4>
                                    <p class="text-sm text-gray-500">Diajukan oleh: {{ $request->guest->username }}</p>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full {{ $request->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($request->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($request->status) }}
                                </span>
                            </div>
                            <p class="text-gray-600 text-sm">{{ $request->description }}</p>
                            <div class="flex space-x-2">
                                @if($request->status === 'pending')
                                    <form action="{{ route('assessment.approve', $request->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-sm bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Setujui</button>
                                    </form>
                                    <form action="{{ route('assessment.reject', $request->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-sm bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Tolak</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500">Tidak ada pengajuan penilaian saat ini.</p>
                    @endforelse
                </div>
            </div>

            <!-- Manajemen Pengguna -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4">Manajemen Pengguna</h3>
                <p class="text-gray-600 mb-4">Lihat dan kelola daftar pengguna yang memberikan penilaian.</p>
                <div class="space-y-2">
                    <a href="#" class="block bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 text-center">Daftar Pengguna</a>
                    <a href="#" class="block bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 text-center">Aktivitas Pengguna</a>
                </div>
            </div>

            <!-- Kriteria Penilaian -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4">Kriteria Penilaian</h3>
                <p class="text-gray-600 mb-4">Atur dan kelola kriteria penilaian dokumen.</p>
                <div class="space-y-2">
                    <a href="#" class="block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-center">Kelola Kriteria</a>
                    <a href="#" class="block bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700 text-center">Template Penilaian</a>
                </div>
            </div>

            <!-- Riwayat Penilaian -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4">Riwayat Penilaian</h3>
                <p class="text-gray-600 mb-4">Lihat dan kelola riwayat penilaian dokumen.</p>
                <div class="space-y-2">
                    <a href="#" class="block bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 text-center">Semua Riwayat</a>
                    <a href="#" class="block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 text-center">Filter Riwayat</a>
                </div>
            </div>

            <!-- Pengaturan -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4">Pengaturan</h3>
                <p class="text-gray-600 mb-4">Konfigurasi sistem dan preferensi pengguna.</p>
                <div class="space-y-2">
                    <a href="#" class="block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 text-center">Pengaturan Sistem</a>
                    <a href="#" class="block bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-900 text-center">Preferensi</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>