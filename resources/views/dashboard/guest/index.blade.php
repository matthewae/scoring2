@extends('layouts.app-with-sidebar')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <h2 class="text-2xl font-bold mb-4">Selamat Datang di Dashboard Guest</h2>
    <p class="text-gray-600 mb-4">Sebagai guest, Anda dapat mengajukan penilaian dokumen konstruksi dan melihat riwayat pengajuan Anda.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Pengajuan Dokumen -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-xl font-semibold mb-4">
            <i class="fas fa-file-upload text-blue-500 mr-2"></i>
            Pengajuan Dokumen
        </h3>
        <p class="text-gray-600 mb-4">Ajukan dokumen konstruksi Anda untuk dinilai oleh tim ahli kami.</p>
        <a href="#" class="block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-center">
            Ajukan Dokumen
        </a>
    </div>

    <!-- Riwayat Pengajuan -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-xl font-semibold mb-4">
            <i class="fas fa-history text-green-500 mr-2"></i>
            Riwayat Pengajuan
        </h3>
        <p class="text-gray-600 mb-4">Lihat status dan riwayat pengajuan dokumen Anda.</p>
        <a href="#" class="block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 text-center">
            Lihat Riwayat
        </a>
    </div>

    <!-- Panduan -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-xl font-semibold mb-4">
            <i class="fas fa-book text-purple-500 mr-2"></i>
            Panduan Penggunaan
        </h3>
        <p class="text-gray-600 mb-4">Pelajari cara menggunakan sistem scoring dokumen konstruksi.</p>
        <a href="#" class="block bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 text-center">
            Baca Panduan
        </a>
    </div>
</div>
@endsection