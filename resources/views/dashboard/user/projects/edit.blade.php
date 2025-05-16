<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project - Scoring App</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .sidebar {
            transition: transform 0.3s ease;
        }
        .sidebar.collapsed {
            transform: translateX(-240px);
        }
        .main-content {
            transition: margin-left 0.3s ease;
        }
        body {
            background: linear-gradient(135deg, #10B981 0%, #0EA5E9 50%, #6366F1 100%);
            min-height: 100vh;
        }
        .score-card {
            transition: all 0.3s ease;
        }
        .score-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="font-sans">
    <!-- Sidebar -->
    <aside class="sidebar fixed top-0 left-0 h-full w-60 glass-effect z-50 p-4">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold bg-gradient-to-r from-emerald-600 to-sky-600 text-transparent bg-clip-text">Scoring App</h1>
            <button id="toggleSidebar" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <nav class="space-y-4">
            <a href="{{ route('dashboard.user.index') }}" class="flex items-center text-gray-600 hover:text-gray-800 hover:bg-white hover:bg-opacity-50 p-3 rounded-lg transition-all duration-200">
                <i class="fas fa-home w-6"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('dashboard.user.projects.index') }}" class="flex items-center text-gray-600 hover:text-gray-800 hover:bg-white hover:bg-opacity-50 p-3 rounded-lg transition-all duration-200">
                <i class="fas fa-project-diagram w-6"></i>
                <span>Projects</span>
            </a>
            <a href="{{ route('dashboard.user.documents.index') }}" class="flex items-center text-gray-600 hover:text-gray-800 hover:bg-white hover:bg-opacity-50 p-3 rounded-lg transition-all duration-200">
                <i class="fas fa-file-alt w-6"></i>
                <span>Documents</span>
            </a>
            <form method="POST" action="{{ route('logout') }}" class="flex items-center text-gray-600 hover:text-gray-800 hover:bg-white hover:bg-opacity-50 p-3 rounded-lg transition-all duration-200 cursor-pointer">
                @csrf
                <i class="fas fa-sign-out-alt w-6"></i>
                <button type="submit" class="w-full text-left">Logout</button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-content ml-60 p-8">
        <div class="glass-effect rounded-xl p-8 max-w-4xl mx-auto">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold bg-gradient-to-r from-emerald-600 to-sky-600 text-transparent bg-clip-text">Edit Project</h2>
                <a href="{{ route('dashboard.user.projects.index') }}" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dashboard.user.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <!-- Data Utama Project -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Pekerjaan</label>
                            <input type="text" name="name" id="name" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror" 
                                    value="{{ old('name', $project->name) }}" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                            <input type="text" name="location" id="location" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('location') border-red-500 @enderror" 
                                    value="{{ old('location', $project->location) }}" required>
                            @error('location')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="ministry_institution" class="block text-sm font-medium text-gray-700 mb-1">Kementerian/Lembaga/Perangkat Daerah/Institusi</label>
                            <input type="text" name="ministry_institution" id="ministry_institution" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('ministry_institution') border-red-500 @enderror" 
                                   value="{{ old('ministry_institution', $project->ministry_institution) }}" required>
                            @error('ministry_institution')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="planning_consultant" class="block text-sm font-medium text-gray-700 mb-1">Konsultan Perencana</label>
                            <input type="text" name="planning_consultant" id="planning_consultant" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('planning_consultant') border-red-500 @enderror" 
                                   value="{{ old('planning_consultant', $project->planning_consultant) }}" required>
                            @error('planning_consultant')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="mk_consultant" class="block text-sm font-medium text-gray-700 mb-1">Konsultan MK</label>
                            <input type="text" name="mk_consultant" id="mk_consultant" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('mk_consultant') border-red-500 @enderror" 
                                   value="{{ old('mk_consultant', $project->mk_consultant) }}" required>
                            @error('mk_consultant')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contractor" class="block text-sm font-medium text-gray-700 mb-1">Kontraktor Pelaksana</label>
                            <input type="text" name="contractor" id="contractor" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('contractor') border-red-500 @enderror" 
                                   value="{{ old('contractor', $project->contractor) }}" required>
                            @error('contractor')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="selection_method" class="block text-sm font-medium text-gray-700 mb-1">Metode Pemilihan</label>
                            <select name="selection_method" id="selection_method" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('selection_method') border-red-500 @enderror"
                                    required>
                                <option value="tender" {{ old('selection_method', $project->selection_method) === 'tender' ? 'selected' : '' }}>Tender</option>
                                <option value="direct_appointment" {{ old('selection_method', $project->selection_method) === 'direct_appointment' ? 'selected' : '' }}>Penunjukan Langsung</option>
                                <option value="direct_procurement" {{ old('selection_method', $project->selection_method) === 'direct_procurement' ? 'selected' : '' }}>Pengadaan Langsung</option>
                            </select>
                            @error('selection_method')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contract_value" class="block text-sm font-medium text-gray-700 mb-1">Nilai Kontrak</label>
                            <input type="number" name="contract_value" id="contract_value" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('contract_value') border-red-500 @enderror" 
                                   value="{{ old('contract_value', $project->contract_value) }}" required>
                            @error('contract_value')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="spmk_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal SPMK</label>
                            <input type="date" name="spmk_date" id="spmk_date" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('spmk_date') border-red-500 @enderror" 
                                   value="{{ old('spmk_date', $project->spmk_date) }}" required>
                            @error('spmk_date')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="duration_days" class="block text-sm font-medium text-gray-700 mb-1">Jangka Waktu (Hari)</label>
                            <input type="number" name="duration_days" id="duration_days" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('duration_days') border-red-500 @enderror" 
                                   value="{{ old('duration_days', $project->duration_days) }}" required>
                            @error('duration_days')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Checklist Dokumen -->
                <div class="mt-8 glass-effect rounded-2xl p-6">
                    <h3 class="text-lg font-semibold mb-4 bg-gradient-to-r from-emerald-600 to-sky-600 text-transparent bg-clip-text">Checklist Dokumen yang Diperlukan</h3>
                    
                    <!-- Navigasi Tahapan -->
                    <div class="flex items-center justify-between mb-6">
                        <button type="button" onclick="prevSlide()" class="px-4 py-2 bg-gradient-to-r from-emerald-500 to-sky-500 text-white rounded-lg hover:from-emerald-600 hover:to-sky-600 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all duration-300">
                            <i class="fas fa-chevron-left mr-2"></i>Sebelumnya
                        </button>
                        <div class="text-gray-600">
                            Tahap <span id="currentSlide">1</span> dari <span id="totalSlides">8</span>
                        </div>
                        <button type="button" onclick="nextSlide()" class="px-4 py-2 bg-gradient-to-r from-sky-500 to-indigo-500 text-white rounded-lg hover:from-sky-600 hover:to-indigo-600 focus:outline-none focus:ring-2 focus:ring-sky-500 transition-all duration-300">
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
                        <div class="mb-6 slide-content glass-effect rounded-xl p-6" style="display: {{ $index === 0 ? 'block' : 'none' }}">
                            <h4 class="text-md font-medium text-gray-800 mb-3">{{ $tahap }}</h4>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gradient-to-r from-emerald-500/10 to-sky-500/10">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">No</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">Tahapan</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-2/6">Uraian Teknis Administrasi</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">Kelengkapan Dokumen</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">Status</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">Upload File</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white/50 divide-y divide-gray-200">
                                        @php $no = 1; @endphp
                                        @foreach($documentTypes->where('tahapan', $tahap)->whereNull('parent_code') as $type)
                                            <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $no++ }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $tahap }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-900">{{ $type->uraian }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    @if($type->is_file_required)
                                                        <span id="kelengkapan_{{ $type->code }}" class="px-2 py-1 text-sm rounded-full {{ old('status.' . $type->code) === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                            {{ old('status.' . $type->code) === 'approved' ? 'Ada' : 'Tidak Ada' }}
                                                        </span>
                                                    @else
                                                        <span class="text-gray-500 italic">-</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    @if($type->is_file_required)
                                                        <select name="status[{{ $type->code }}]" onchange="updateKelengkapan('{{ $type->code }}', this.value)" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                            <option value="">Pilih Status</option>
                                                            <option value="approved" {{ old('status.' . $type->code) === 'approved' ? 'selected' : '' }}>Approve</option>
                                                            <option value="rejected" {{ old('status.' . $type->code) === 'rejected' ? 'selected' : '' }}>Reject</option>
                                                        </select>
                                                    @else
                                                        <span class="text-gray-500 italic">-</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    @if($type->is_file_required)
                                                        <input type="file" name="documents[{{ $type->code }}][file]" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <input type="text" name="documents[{{ $type->code }}][catatan]" placeholder="Catatan (Opsional)" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <input type="text" name="documents[{{ $type->code }}][sumber]" placeholder="Sumber (Opsional)" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                    @else
                                                        <span class="text-gray-500 italic">Tidak memerlukan file</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            
                                            <!-- Sub-documents -->
                                            @foreach($documentTypes->where('parent_code', $type->code) as $subType)
                                                <tr class="hover:bg-gray-50/50 transition-colors duration-200 bg-gray-50/30">
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $no++ }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $tahap }}</td>
                                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $subType->uraian }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        @if($subType->is_file_required)
                                                            <span id="kelengkapan_{{ $subType->code }}" class="px-2 py-1 text-sm rounded-full {{ old('status.' . $subType->code) === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                                {{ old('status.' . $subType->code) === 'approved' ? 'Ada' : 'Tidak Ada' }}
                                                            </span>
                                                        @else
                                                            <span class="text-gray-500 italic">-</span>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        @if($subType->is_file_required)
                                                            <select name="status[{{ $subType->code }}]" onchange="updateKelengkapan('{{ $subType->code }}', this.value)" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                                <option value="">Pilih Status</option>
                                                                <option value="approved" {{ old('status.' . $subType->code) === 'approved' ? 'selected' : '' }}>Approve</option>
                                                                <option value="rejected" {{ old('status.' . $subType->code) === 'rejected' ? 'selected' : '' }}>Reject</option>
                                                            </select>
                                                        @else
                                                            <span class="text-gray-500 italic">-</span>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        @if($subType->is_file_required)
                                                            <input type="file" name="documents[{{ $subType->code }}][file]" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                            <input type="text" name="documents[{{ $subType->code }}][catatan]" placeholder="Catatan (Opsional)" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                            <input type="text" name="documents[{{ $subType->code }}][sumber]" placeholder="Sumber (Opsional)" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
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

                <div class="flex justify-end">
                    <button type="submit" 
                            class="px-8 py-3 bg-gradient-to-r from-emerald-500 to-sky-500 text-white rounded-lg 
                                   hover:from-emerald-600 hover:to-sky-600 transition-all duration-200 flex items-center space-x-2">
                        <i class="fas fa-save"></i>
                        <span>Simpan Perubahan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            const toggleBtn = document.getElementById('toggleSidebar');

            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('ml-0');
                mainContent.classList.toggle('ml-60');
            });

            // Slide navigation
            let currentSlideIndex = 0;
            const slides = document.querySelectorAll('.slide-content');
            const totalSlides = slides.length;
            document.getElementById('totalSlides').textContent = totalSlides;

            window.prevSlide = function() {
                if (currentSlideIndex > 0) {
                    slides[currentSlideIndex].style.display = 'none';
                    currentSlideIndex--;
                    slides[currentSlideIndex].style.display = 'block';
                    document.getElementById('currentSlide').textContent = currentSlideIndex + 1;
                }
            };

            window.nextSlide = function() {
                if (currentSlideIndex < totalSlides - 1) {
                    slides[currentSlideIndex].style.display = 'none';
                    currentSlideIndex++;
                    slides[currentSlideIndex].style.display = 'block';
                    document.getElementById('currentSlide').textContent = currentSlideIndex + 1;
                }
            };

            // Update kelengkapan status
            window.updateKelengkapan = function(code, value) {
                const kelengkapanElement = document.getElementById('kelengkapan_' + code);
                if (value === 'approved') {
                    kelengkapanElement.textContent = 'Ada';
                    kelengkapanElement.className = 'px-2 py-1 text-sm rounded-full bg-green-100 text-green-800';
                } else if (value === 'rejected') {
                    kelengkapanElement.textContent = 'Tidak Ada';
                    kelengkapanElement.className = 'px-2 py-1 text-sm rounded-full bg-red-100 text-red-800';
                }
            };
        });
    </script>
</body>
</html>