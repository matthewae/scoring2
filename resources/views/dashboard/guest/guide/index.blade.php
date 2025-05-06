@extends('layouts.app-with-sidebar')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Panduan Penggunaan Sistem</h2>
        <a href="{{ route('dashboard.guest') }}" class="text-gray-600 hover:text-gray-800">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
        </a>
    </div>

    <!-- Daftar Isi -->
    <div class="mb-8">
        <h3 class="text-lg font-semibold mb-4">Daftar Isi</h3>
        <ul class="space-y-2">
            <li>
                <a href="#pengajuan" class="text-blue-600 hover:text-blue-800">1. Cara Mengajukan Dokumen</a>
            </li>
            <li>
                <a href="#status" class="text-blue-600 hover:text-blue-800">2. Memantau Status Pengajuan</a>
            </li>
            <li>
                <a href="#penilaian" class="text-blue-600 hover:text-blue-800">3. Memahami Sistem Penilaian</a>
            </li>
        </ul>
    </div>

    <!-- Cara Mengajukan Dokumen -->
    <div id="pengajuan" class="mb-8">
        <h3 class="text-xl font-semibold mb-4">
            <i class="fas fa-file-upload text-blue-500 mr-2"></i>
            1. Cara Mengajukan Dokumen
        </h3>
        <div class="space-y-4">
            <p class="text-gray-700">Untuk mengajukan dokumen konstruksi, ikuti langkah-langkah berikut:</p>
            <ol class="list-decimal list-inside space-y-3 text-gray-700">
                <li>Klik tombol "Ajukan Dokumen" pada dashboard</li>
                <li>Pilih project yang akan diajukan</li>
                <li>Lengkapi informasi yang diperlukan pada form pengajuan</li>
                <li>Upload file dokumen konstruksi yang akan dinilai</li>
                <li>Periksa kembali semua informasi yang telah diisi</li>
                <li>Klik tombol "Submit" untuk mengirim pengajuan</li>
            </ol>
        </div>
    </div>

    <!-- Memantau Status Pengajuan -->
    <div id="status" class="mb-8">
        <h3 class="text-xl font-semibold mb-4">
            <i class="fas fa-history text-green-500 mr-2"></i>
            2. Memantau Status Pengajuan
        </h3>
        <div class="space-y-4">
            <p class="text-gray-700">Anda dapat memantau status pengajuan dokumen melalui:</p>
            <ul class="list-disc list-inside space-y-3 text-gray-700">
                <li>Menu "Riwayat Pengajuan" di dashboard</li>
                <li>Status pengajuan akan ditampilkan dengan indikator warna:
                    <div class="mt-2 space-y-2">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></span>
                            <span>Pending - Dokumen sedang dalam antrian review</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                            <span>In Review - Dokumen sedang dinilai</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                            <span>Completed - Penilaian telah selesai</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Memahami Sistem Penilaian -->
    <div id="penilaian" class="mb-8">
        <h3 class="text-xl font-semibold mb-4">
            <i class="fas fa-star text-yellow-500 mr-2"></i>
            3. Memahami Sistem Penilaian
        </h3>
        <div class="space-y-4">
            <p class="text-gray-700">Sistem penilaian dokumen konstruksi meliputi beberapa aspek:</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="font-semibold mb-2">Kelengkapan Dokumen</h4>
                    <p class="text-gray-600">Menilai kelengkapan dan kesesuaian dokumen dengan standar yang berlaku</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="font-semibold mb-2">Kualitas Teknis</h4>
                    <p class="text-gray-600">Evaluasi aspek teknis dan engineering dari dokumen konstruksi</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="font-semibold mb-2">Keamanan & Keselamatan</h4>
                    <p class="text-gray-600">Penilaian aspek keamanan dan keselamatan dalam desain</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="font-semibold mb-2">Efisiensi & Inovasi</h4>
                    <p class="text-gray-600">Evaluasi efisiensi dan inovasi dalam solusi konstruksi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bantuan Tambahan -->
    <div class="bg-blue-50 p-6 rounded-lg">
        <h3 class="text-lg font-semibold mb-4">Butuh Bantuan?</h3>
        <p class="text-gray-700 mb-4">Jika Anda memiliki pertanyaan lebih lanjut atau mengalami kesulitan, silakan hubungi tim support kami:</p>
        <div class="flex items-center space-x-4">
            <a href="mailto:support@scoring.com" class="flex items-center text-blue-600 hover:text-blue-800">
                <i class="fas fa-envelope mr-2"></i>
                support@scoring.com
            </a>
            <span class="text-gray-300">|</span>
            <a href="tel:+6281234567890" class="flex items-center text-blue-600 hover:text-blue-800">
                <i class="fas fa-phone mr-2"></i>
                +62 812-3456-7890
            </a>
        </div>
    </div>
</div>
@endsection