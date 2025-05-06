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

            <!-- Tabel Dokumen -->
            <div class="mt-8">
                <h3 class="text-lg font-semibold mb-4">Checklist Pemeriksaan Kelengkapan Dokumen Administrasi</h3>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">No.</th>
                                <th class="border border-gray-300 px-4 py-2">Tahapan</th>
                                <th class="border border-gray-300 px-4 py-2">Uraian Teknis Administrasi</th>
                                <th class="border border-gray-300 px-4 py-2">Catatan</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                                <th class="border border-gray-300 px-4 py-2">Skor</th>
                                <th class="border border-gray-300 px-4 py-2">Sumber</th>
                                <th class="border border-gray-300 px-4 py-2">File</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $documentTypes = \App\Models\DocumentType::orderBy('no')->get();
                            $parentDocs = $documentTypes->whereNull('parent_code');
                        @endphp

                        @foreach($parentDocs as $parent)
                            <tr class="bg-gray-50">
                                <td class="border border-gray-300 px-4 py-2">{{ $parent->no }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $parent->tahapan }}</td>
                                <td class="border border-gray-300 px-4 py-2 font-semibold">{{ $parent->uraian }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="text" name="documents[{{ $parent->code }}][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <select name="documents[{{ $parent->code }}][status]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                        <option value="pending">Pending</option>
                                        <option value="approved">Disetujui</option>
                                        <option value="rejected">Ditolak</option>
                                    </select>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="number" name="documents[{{ $parent->code }}][score]" value="0" class="w-full px-2 py-1 border border-gray-300 rounded" readonly>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="text" name="documents[{{ $parent->code }}][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="{{ $parent->tahapan }}" readonly>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    @if($parent->is_file_required)
                                        <input type="file" name="documents[{{ $parent->code }}][file]" class="w-full px-2 py-1">
                                    @endif
                                </td>
                            </tr>

                            @foreach($documentTypes->where('parent_code', $parent->code) as $child)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $child->no }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $child->tahapan }}</td>
                                    <td class="border border-gray-300 px-4 py-2 pl-8">{{ $child->uraian }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <input type="text" name="documents[{{ $child->code }}][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <select name="documents[{{ $child->code }}][status]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                            <option value="pending">Pending</option>
                                            <option value="approved">Disetujui</option>
                                            <option value="rejected">Ditolak</option>
                                        </select>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <input type="number" name="documents[{{ $child->code }}][score]" value="0" class="w-full px-2 py-1 border border-gray-300 rounded" readonly>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <input type="text" name="documents[{{ $child->code }}][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="{{ $child->tahapan }}" readonly>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        @if($child->is_file_required)
                                            <input type="file" name="documents[{{ $child->code }}][file]" class="w-full px-2 py-1">
                                        @endif
                                    </td>
                                </tr>

                                @foreach($documentTypes->where('parent_code', $child->code) as $grandchild)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $grandchild->no }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $grandchild->tahapan }}</td>
                                        <td class="border border-gray-300 px-4 py-2 pl-12">{{ $grandchild->uraian }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <input type="text" name="documents[{{ $grandchild->code }}][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <select name="documents[{{ $grandchild->code }}][status]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                                <option value="pending">Pending</option>
                                                <option value="approved">Disetujui</option>
                                                <option value="rejected">Ditolak</option>
                                            </select>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <input type="number" name="documents[{{ $grandchild->code }}][score]" value="0" class="w-full px-2 py-1 border border-gray-300 rounded" readonly>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <input type="text" name="documents[{{ $grandchild->code }}][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="{{ $grandchild->tahapan }}" readonly>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            @if($grandchild->is_file_required)
                                                <input type="file" name="documents[{{ $grandchild->code }}][file]" class="w-full px-2 py-1">
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const statusSelects = document.querySelectorAll('select[name$="[status]"]');
                        
                        statusSelects.forEach(select => {
                            select.addEventListener('change', function() {
                                const scoreInput = this.closest('tr').querySelector('input[name$="[score]"]');
                                scoreInput.value = this.value === 'approved' ? 1 : 0;
                            });
                        });
                    });
                </script>
                            <!-- Laporan Antara Pengembangan Rancangan Penyusunan -->
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">ii.</td>
                                <td class="border border-gray-300 px-4 py-2">Laporan Antara Pengembangan Rancangan Penyusunan</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <select name="documents[3][kelengkapan]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                        <option value="0">Tidak Ada (0)</option>
                                        <option value="1">Ada (1)</option>
                                    </select>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="text" name="documents[3][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="text" name="documents[3][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="Dokumen Perencana" readonly>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="file" name="documents[3][file]" class="w-full px-2 py-1">
                                </td>
                            </tr>
                            <!-- Laporan Akhir Master Plan -->
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">iii.</td>
                                <td class="border border-gray-300 px-4 py-2">Laporan Akhir Master Plan</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <select name="documents[4][kelengkapan]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                        <option value="0">Tidak Ada (0)</option>
                                        <option value="1">Ada (1)</option>
                                    </select>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="text" name="documents[4][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="text" name="documents[4][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="Dokumen Perencana" readonly>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="file" name="documents[4][file]" class="w-full px-2 py-1">
                                </td>
                            </tr>
                            <!-- Laporan Akhir Master Plan dan Detail Engineering -->
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">iv.</td>
                                <td class="border border-gray-300 px-4 py-2">Laporan Akhir Master Plan dan Detail Engineering</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <select name="documents[5][kelengkapan]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                        <option value="0">Tidak Ada (0)</option>
                                        <option value="1">Ada (1)</option>
                                    </select>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="text" name="documents[5][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="text" name="documents[5][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="Dokumen Perencana" readonly>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="file" name="documents[5][file]" class="w-full px-2 py-1">
                                </td>
                            </tr>
                            <!-- Rencana Kerja dan Syarat-Syarat (RKS) -->
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">v.</td>
                                <td class="border border-gray-300 px-4 py-2">Rencana Kerja dan Syarat-Syarat (RKS)</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <select name="documents[6][kelengkapan]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                        <option value="0">Tidak Ada (0)</option>
                                        <option value="1">Ada (1)</option>
                                    </select>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="text" name="documents[6][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="text" name="documents[6][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="Dokumen Perencana" readonly>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="file" name="documents[6][file]" class="w-full px-2 py-1">
                                </td>
                            </tr>
                            <!-- Gambar Perencanaan -->
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">vi.</td>
                                <td class="border border-gray-300 px-4 py-2">Gambar Perencanaan</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <select name="documents[7][kelengkapan]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                        <option value="0">Tidak Ada (0)</option>
                                        <option value="1">Ada (1)</option>
                                    </select>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="text" name="documents[7][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="text" name="documents[7][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="Dokumen Perencana" readonly>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="file" name="documents[7][file]" class="w-full px-2 py-1">
                                </td>
                            </tr>
                            <!-- Notulensi hasil rapat koordinasi proses review penyusunan -->
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">b.</td>
                                <td class="border border-gray-300 px-4 py-2">Notulensi hasil rapat koordinasi proses review penyusunan</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <select name="documents[8][kelengkapan]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                        <option value="0">Tidak Ada (0)</option>
                                        <option value="1">Ada (1)</option>
                                    </select>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="text" name="documents[8][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="text" name="documents[8][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="Risalah Rapat" readonly>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="file" name="documents[8][file]" class="w-full px-2 py-1">
                                </td>
                            </tr>
                         <!-- Laporan review penyusunan DED -->
                         <tr>
                             <td class="border border-gray-300 px-4 py-2">c.</td>
                             <td class="border border-gray-300 px-4 py-2" rowspan="8">Laporan review penyusunan DED</td>
                             <td class="border border-gray-300 px-4 py-2">i. Kesesuaian Desain (DED) dengan standar teknis dan spesifikasi</td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <select name="documents[9][kelengkapan]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                     <option value="0">Tidak Ada (0)</option>
                                     <option value="1">Ada (1)</option>
                                 </select>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[9][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[9][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="Gambar Reviu MK" readonly>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="file" name="documents[9][file]" class="w-full px-2 py-1">
                             </td>
                         </tr>
                         <tr>
                             <td class="border border-gray-300 px-4 py-2">ii.</td>
                             <td class="border border-gray-300 px-4 py-2">Kesesuaian Gambar Desain dengan RKS dan RAB</td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <select name="documents[10][kelengkapan]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                     <option value="0">Tidak Ada (0)</option>
                                     <option value="1">Ada (1)</option>
                                 </select>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[10][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[10][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="Terdapat pada BOQ dan RKS MK" readonly>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="file" name="documents[10][file]" class="w-full px-2 py-1">
                             </td>
                         </tr>
                         <tr>
                             <td class="border border-gray-300 px-4 py-2">iii.</td>
                             <td class="border border-gray-300 px-4 py-2">Review kewajaran harga pada RAB</td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <select name="documents[11][kelengkapan]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                     <option value="0">Tidak Ada (0)</option>
                                     <option value="1">Ada (1)</option>
                                 </select>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[11][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[11][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="RAB BOQ HPS" readonly>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="file" name="documents[11][file]" class="w-full px-2 py-1">
                             </td>
                         </tr>
                         <tr>
                             <td class="border border-gray-300 px-4 py-2">iv.</td>
                             <td class="border border-gray-300 px-4 py-2">Kesesuaian rencana waktu pelaksanaan</td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <select name="documents[12][kelengkapan]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                     <option value="0">Tidak Ada (0)</option>
                                     <option value="1">Ada (1)</option>
                                 </select>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[12][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[12][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="" readonly>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="file" name="documents[12][file]" class="w-full px-2 py-1">
                             </td>
                         </tr>
                         <tr>
                             <td class="border border-gray-300 px-4 py-2">v.</td>
                             <td class="border border-gray-300 px-4 py-2">Hasil evaluasi yang telah diperbaiki atau dilengkapi oleh perencana</td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <select name="documents[13][kelengkapan]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                     <option value="0">Tidak Ada (0)</option>
                                     <option value="1">Ada (1)</option>
                                 </select>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[13][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[13][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="Gambar Perencanaan" readonly>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="file" name="documents[13][file]" class="w-full px-2 py-1">
                             </td>
                         </tr>
                         <tr>
                             <td class="border border-gray-300 px-4 py-2">vi.</td>
                             <td class="border border-gray-300 px-4 py-2">Hasil review dokumen KAK terhadap SMKK</td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <select name="documents[14][kelengkapan]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                     <option value="0">Tidak Ada (0)</option>
                                     <option value="1">Ada (1)</option>
                                 </select>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[14][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[14][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="Dokumen KAK" readonly>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="file" name="documents[14][file]" class="w-full px-2 py-1">
                             </td>
                         </tr>
                         <tr>
                             <td class="border border-gray-300 px-4 py-2">vii.</td>
                             <td class="border border-gray-300 px-4 py-2">Program mutu pengawasan</td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <select name="documents[15][kelengkapan]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                     <option value="0">Tidak Ada (0)</option>
                                     <option value="1">Ada (1)</option>
                                 </select>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[15][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[15][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="" readonly>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="file" name="documents[15][file]" class="w-full px-2 py-1">
                             </td>
                         </tr>
                         <tr>
                             <td class="border border-gray-300 px-4 py-2">viii.</td>
                             <td class="border border-gray-300 px-4 py-2">Dokumen Notulensi terkait kegiatan aanwijzing</td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <select name="documents[16][kelengkapan]" class="w-full px-2 py-1 border border-gray-300 rounded">
                                     <option value="0">Tidak Ada (0)</option>
                                     <option value="1">Ada (1)</option>
                                 </select>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[16][catatan]" class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Catatan">
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="text" name="documents[16][sumber]" class="w-full px-2 py-1 border border-gray-300 rounded" value="Risalah Rapat" readonly>
                             </td>
                             <td class="border border-gray-300 px-4 py-2">
                                 <input type="file" name="documents[16][file]" class="w-full px-2 py-1">
                             </td>
                         </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex justify-end mt-6 space-x-3">
                <a href="{{ route('dashboard.user.projects.index') }}" class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors">
                    <i class="fas fa-times mr-2"></i>Batal
                </a>
                <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                    <i class="fas fa-save mr-2"></i>Simpan Project
                </button>
            </div>
        </div>
    </form>
</div>
@endsection