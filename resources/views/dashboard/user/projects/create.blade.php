@extends('layouts.app-with-sidebar')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Buat Project Baru</h2>
        <a href="{{ route('dashboard.user.projects.index') }}" class="text-gray-600 hover:text-gray-800">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>

    <form action="{{ route('dashboard.user.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="space-y-4">
            <!-- Data Utama Project -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Pekerjaan</label>
                    <input type="text" name="name" id="name" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror" 
                           value="{{ old('name') }}" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                    <input type="text" name="location" id="location" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('location') border-red-500 @enderror" 
                           value="{{ old('location') }}" required>
                    @error('location')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="institution" class="block text-sm font-medium text-gray-700 mb-1">Kementerian/Lembaga/Perangkat Daerah/Institusi</label>
                    <input type="text" name="institution" id="institution" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('institution') border-red-500 @enderror" 
                           value="{{ old('institution') }}" required>
                    @error('institution')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="planning_consultant" class="block text-sm font-medium text-gray-700 mb-1">Konsultan Perencana</label>
                    <input type="text" name="planning_consultant" id="planning_consultant" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('planning_consultant') border-red-500 @enderror" 
                           value="{{ old('planning_consultant') }}" required>
                    @error('planning_consultant')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="supervision_consultant" class="block text-sm font-medium text-gray-700 mb-1">Konsultan MK</label>
                    <input type="text" name="supervision_consultant" id="supervision_consultant" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('supervision_consultant') border-red-500 @enderror" 
                           value="{{ old('supervision_consultant') }}" required>
                    @error('supervision_consultant')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="contractor" class="block text-sm font-medium text-gray-700 mb-1">Kontraktor Pelaksana</label>
                    <input type="text" name="contractor" id="contractor" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('contractor') border-red-500 @enderror" 
                           value="{{ old('contractor') }}" required>
                    @error('contractor')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="selection_method" class="block text-sm font-medium text-gray-700 mb-1">Metode Pemilihan</label>
                    <select name="selection_method" id="selection_method" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('selection_method') border-red-500 @enderror"
                            required>
                        <option value="tender" {{ old('selection_method') === 'tender' ? 'selected' : '' }}>Tender</option>
                        <option value="direct_appointment" {{ old('selection_method') === 'direct_appointment' ? 'selected' : '' }}>Penunjukan Langsung</option>
                        <option value="direct_procurement" {{ old('selection_method') === 'direct_procurement' ? 'selected' : '' }}>Pengadaan Langsung</option>
                    </select>
                    @error('selection_method')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="contract_value" class="block text-sm font-medium text-gray-700 mb-1">Nilai Kontrak</label>
                    <input type="number" name="contract_value" id="contract_value" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('contract_value') border-red-500 @enderror" 
                           value="{{ old('contract_value') }}" required>
                    @error('contract_value')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="spmk_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal SPMK</label>
                    <input type="date" name="spmk_date" id="spmk_date" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('spmk_date') border-red-500 @enderror" 
                           value="{{ old('spmk_date') }}" required>
                    @error('spmk_date')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">Jangka Waktu (Hari)</label>
                    <input type="number" name="duration" id="duration" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('duration') border-red-500 @enderror" 
                           value="{{ old('duration') }}" required>
                    @error('duration')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Checklist Dokumen -->
        <div class="mt-8">
            <h3 class="text-lg font-semibold mb-4">Checklist Dokumen yang Diperlukan</h3>
            
            <!-- Navigasi Tahapan -->
            <div class="flex items-center justify-between mb-6">
                <button type="button" onclick="prevSlide()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    <i class="fas fa-chevron-left mr-2"></i>Sebelumnya
                </button>
                <div class="text-gray-600">
                    Tahap <span id="currentSlide">1</span> dari <span id="totalSlides">8</span>
                </div>
                <button type="button" onclick="nextSlide()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Selanjutnya<i class="fas fa-chevron-right ml-2"></i>
                </button>
            </div>
            
            @php
                $tahapan = [
                    'Pra-Tender',
                    'Tender', 
                    'Persiapan Pelaksanaan Pekerjaan Konstruksi',
                    'Pelaksanaan Pekerjaan Konstruksi',
                    'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
                    'Perubahan Kontrak (Addendum)',
                    'Kontrak Kritis',
                    'Pemutusan Kontrak sampai dengan Penetapan Sanksi Daftar Hitam'
                ];
            @endphp

            @foreach($tahapan as $index => $tahap)
                <div class="mb-6 slide-content" style="display: {{ $index === 0 ? 'block' : 'none' }};">
                    <h4 class="text-md font-medium text-gray-800 mb-3">{{ $tahap }}</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahapan</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Uraian Teknis Administrasi</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelengkapan Dokumen</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Upload File</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @php $no = 1; @endphp
                                @foreach($documentTypes->where('tahapan', $tahap)->whereNull('parent_code') as $type)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $no++ }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $tahap }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $type->uraian }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <span id="kelengkapan_{{ $type->code }}" class="px-2 py-1 text-sm rounded-full {{ old('status.' . $type->code) === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ old('status.' . $type->code) === 'approved' ? 'Ada' : 'Tidak Ada' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <select name="status[{{ $type->code }}]" onchange="updateKelengkapan('{{ $type->code }}', this.value)" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                <option value="">Pilih Status</option>
                                                <option value="approved" {{ old('status.' . $type->code) === 'approved' ? 'selected' : '' }}>Approve</option>
                                                <option value="rejected" {{ old('status.' . $type->code) === 'rejected' ? 'selected' : '' }}>Reject</option>
                                            </select>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if($type->is_file_required)
                                                <input type="file" name="document[{{ $type->code }}]" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                            @else
                                                <span class="text-gray-500 italic">Tidak memerlukan file</span>
                                            @endif
                                        </td>
                                    </tr>
                                    
                                    <!-- Sub-documents -->
                                    @foreach($documentTypes->where('parent_code', $type->code) as $subType)
                                        <tr class="hover:bg-gray-50 bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $no++ }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $tahap }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900 pl-6">{{ $subType->uraian }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <span id="kelengkapan_{{ $subType->code }}" class="px-2 py-1 text-sm rounded-full {{ old('status.' . $subType->code) === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ old('status.' . $subType->code) === 'approved' ? 'Ada' : 'Tidak Ada' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <select name="status[{{ $subType->code }}]" onchange="updateKelengkapan('{{ $subType->code }}', this.value)" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                    <option value="">Pilih Status</option>
                                                    <option value="approved" {{ old('status.' . $subType->code) === 'approved' ? 'selected' : '' }}>Approve</option>
                                                    <option value="rejected" {{ old('status.' . $subType->code) === 'rejected' ? 'selected' : '' }}>Reject</option>
                                                </select>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                @if($subType->is_file_required)
                                                    <input type="file" name="document[{{ $subType->code }}]" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                                @else
                                                    <span class="text-gray-500 italic">Tidak memerlukan file</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-end mt-6">
            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Simpan Project
            </button>
        </div>
    </form>
</div>
<script>
let currentSlideIndex = 0;
const totalSlides = 8;

function showSlide(index) {
    const slides = document.querySelectorAll('.slide-content');
    slides.forEach(slide => slide.style.display = 'none');
    slides[index].style.display = 'block';
    document.getElementById('currentSlide').textContent = index + 1;
}

function nextSlide() {
    if (currentSlideIndex < totalSlides - 1) {
        currentSlideIndex++;
        showSlide(currentSlideIndex);
    }
}

function prevSlide() {
    if (currentSlideIndex > 0) {
        currentSlideIndex--;
        showSlide(currentSlideIndex);
    }
}

function updateKelengkapan(code, value) {
    const kelengkapanEl = document.getElementById(`kelengkapan_${code}`);
    if (value === 'approved') {
        kelengkapanEl.textContent = 'Ada';
        kelengkapanEl.className = 'px-2 py-1 text-sm rounded-full bg-green-100 text-green-800';
    } else if (value === 'rejected') {
        kelengkapanEl.textContent = 'Tidak Ada';
        kelengkapanEl.className = 'px-2 py-1 text-sm rounded-full bg-red-100 text-red-800';
    }
}
</script>
@endsection