<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Project Baru</title>
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
            <a href="{{ route('dashboard.user.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('dashboard.user.projects.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                <i class="fas fa-project-diagram"></i>
                <span>Project</span>
            </a>
            <a href="{{ route('dashboard.user.documents.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                <i class="fas fa-upload"></i>
                <span>Upload Dokumen</span>
            </a>
            <a href="{{ route('dashboard.user.assessment-requests.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                <i class="fas fa-tasks"></i>
                <span>Pengajuan Penilaian</span>
            </a>
            <a href="{{ route('dashboard.user.project-scores.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                <i class="fas fa-chart-bar"></i>
                <span>Hasil Penilaian</span>
            </a>
            <div class="mt-auto pt-8">
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 px-4 py-2 rounded-xl transition-all duration-300 glass-effect">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content ml-60 p-8">
        <div class="glass-effect rounded-2xl p-8 mb-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold bg-gradient-to-r from-emerald-600 to-sky-600 text-transparent bg-clip-text">Buat Project Baru</h2>
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
                            <label for="ministry_institution" class="block text-sm font-medium text-gray-700 mb-1">Kementerian/Lembaga/Perangkat Daerah/Institusi</label>
                            <input type="text" name="ministry_institution" id="ministry_institution" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('ministry_institution') border-red-500 @enderror" 
                                    value="{{ old('ministry_institution') }}" required>
                            @error('ministry_institution')
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
                            <label for="mk_consultant" class="block text-sm font-medium text-gray-700 mb-1">Konsultan MK</label>
                            <input type="text" name="mk_consultant" id="mk_consultant" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('mk_consultant') border-red-500 @enderror" 
                                    value="{{ old('mk_consultant') }}" required>
                            @error('mk_consultant')
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
                            <label for="duration_days" class="block text-sm font-medium text-gray-700 mb-1">Jangka Waktu (Hari)</label>
                            <input type="number" name="duration_days" id="duration_days" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('duration_days') border-red-500 @enderror" 
                                    value="{{ old('duration_days') }}" required>
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
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahapan</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Uraian Teknis Administrasi</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelengkapan Dokumen</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Upload File</th>
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
                                                        <input type="file" name="documents[{{ $type->code }}][file]" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" onchange="validateFileUpload(this, '{{ $type->code }}')" accept=".pdf,.jpg,.jpeg,.png">
                                                        <input type="text" name="documents[{{ $type->code }}][catatan]" placeholder="Catatan" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <input type="text" name="documents[{{ $type->code }}][sumber]" placeholder="Sumber" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
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
                                                            <input type="file" name="documents[{{ $subType->code }}][file]" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                            <input type="text" name="documents[{{ $subType->code }}][catatan]" placeholder="Catatan" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                            <input type="text" name="documents[{{ $subType->code }}][sumber]" placeholder="Sumber" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
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
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-emerald-500 to-sky-500 text-white rounded-lg hover:from-emerald-600 hover:to-sky-600 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02]">
                        <i class="fas fa-save mr-2"></i>Simpan Project
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        function updateKelengkapan(code, status) {
            const kelengkapanSpan = document.getElementById(`kelengkapan_${code}`);
            if (kelengkapanSpan) {
                if (status === 'approved') {
                    kelengkapanSpan.className = 'px-2 py-1 text-sm rounded-full bg-green-100 text-green-800';
                    kelengkapanSpan.textContent = 'Ada';
                } else {
                    kelengkapanSpan.className = 'px-2 py-1 text-sm rounded-full bg-red-100 text-red-800';
                    kelengkapanSpan.textContent = 'Tidak Ada';
                }
            }
        }

        function validateFileUpload(input, code) {
            const maxSize = 5 * 1024 * 1024; // 5MB
            const allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
            const file = input.files[0];

            if (file) {
                if (file.size > maxSize) {
                    alert('Ukuran file terlalu besar. Maksimal 5MB.');
                    input.value = '';
                    return false;
                }
                if (!allowedTypes.includes(file.type)) {
                    alert('Format file tidak didukung. Gunakan PDF, JPG, atau PNG.');
                    input.value = '';
                    return false;
                }
                document.querySelector(`select[name="status[${code}]"]`).value = 'approved';
                updateKelengkapan(code, 'approved');
            }
            return true;
        }

        let currentSlideIndex = 0;
        const slides = document.querySelectorAll('.slide-content');

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.display = i === index ? 'block' : 'none';
            });
            document.getElementById('currentSlide').textContent = index + 1;
        }

        function nextSlide() {
            if (currentSlideIndex < slides.length - 1) {
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

        document.getElementById('toggleSidebar').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            sidebar.classList.toggle('collapsed');
            mainContent.style.marginLeft = sidebar.classList.contains('collapsed') ? '0' : '15rem';
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('totalSlides').textContent = slides.length;
            showSlide(0);

            // Add event listeners to all file inputs
            document.querySelectorAll('input[type="file"]').forEach(input => {
                const code = input.name.match(/\[(.*?)\]/)[1];
                input.addEventListener('change', function() {
                    validateFileUpload(this, code);
                });
            });
        });
    </script>
</body>
</html>