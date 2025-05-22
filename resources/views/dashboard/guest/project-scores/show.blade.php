<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penilaian Project - Scoring System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <style>
        .gradient-background {
            background: linear-gradient(135deg, #0ea5e9 0%, #8b5cf6 50%, #10b981 100%);
            transform: scale(0.98);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            color: white;
            box-shadow: 0 10px 30px rgba(14, 165, 233, 0.2);
        }
        .gradient-background:hover {
            transform: scale(0.99);
            box-shadow: 0 15px 35px rgba(139, 92, 246, 0.3);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 8px 32px rgba(14, 165, 233, 0.15);
            transform: scale(0.98);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-effect:hover {
            transform: scale(1.01);
            box-shadow: 0 12px 40px rgba(14, 165, 233, 0.25);
        }
        .swiper-container {
            padding: 20px 40px;
            margin: 0 -40px;
        }
        .swiper-slide {
            width: auto;
            transition: all 0.3s ease;
        }
        .swiper-button-next,
        .swiper-button-prev {
            color: #4B5563;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: rgba(255, 255, 255, 1);
            color: #1F2937;
        }
        .sidebar {
            transition: transform 0.3s ease;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Particles Background -->
    <div id="particles-js" class="fixed inset-0 -z-10 opacity-50"></div>

    <!-- Sidebar Toggle Button (Mobile) -->
    <button id="sidebarToggle" class="fixed top-4 left-4 z-50 md:hidden bg-white p-2 rounded-lg shadow-lg">
        <i class="fas fa-bars text-gray-800"></i>
    </button>

    <!-- Sidebar -->
    <aside class="sidebar fixed top-0 left-0 h-full w-64 glass-effect z-40 transform md:translate-x-0">
        <div class="p-6">
            <div class="flex items-center justify-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Scoring System</h1>
            </div>
            <nav class="space-y-4">
                <a href="{{ route('dashboard.guest.index') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('dashboard.guest.project-documents.create') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-file-upload"></i>
                    <span>Pengajuan Dokumen</span>
                </a>
                <a href="{{ route('dashboard.guest.project-documents.history') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-history"></i>
                    <span>Riwayat Pengajuan</span>
                </a>
                <a href="{{ route('dashboard.guest.guide') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-book"></i>
                    <span>Panduan</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="md:ml-64 p-8">
        <!-- Back Button -->
        <a href="{{ route('dashboard.guest.project-scores.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-6 transition-colors duration-300">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali ke Daftar Project
        </a>

        <!-- Project Header -->
        <div class="gradient-background rounded-2xl shadow-lg p-8 mb-8">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-4xl font-bold mb-2">{{ $project->name }}</h1>
                    <p class="text-gray-100">{{ $project->description }}</p>
                </div>
                <span class="px-4 py-2 rounded-full text-sm {{ $project->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ ucfirst($project->status) }}
                </span>
            </div>

            <!-- Project Details Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-white">
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Dibuat: {{ $project->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $project->location }}</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-money-bill-wave"></i>
                        <span>Rp {{ number_format($project->contract_value, 2, ',', '.') }}</span>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-calendar-check"></i>
                        <span>SPMK: {{ $project->spmk_date ? $project->spmk_date->format('d M Y') : '-' }}</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-hourglass-half"></i>
                        <span>{{ $project->duration_days }} hari</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-building"></i>
                        <span>{{ $project->ministry_institution }}</span>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-user-tie"></i>
                        <span>{{ $project->planning_consultant }}</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-user-shield"></i>
                        <span>{{ $project->mk_consultant }}</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-hard-hat"></i>
                        <span>{{ $project->contractor }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Overall Progress -->
        <div class="glass-effect rounded-2xl p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Progress Keseluruhan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $totalApproved = 0;
                    $totalPending = 0;
                    foreach($tahapanData as $data) {
                        $totalApproved += $data['approved'];
                        $totalPending += $data['pending'];
                    }
                    $totalDocs = $totalApproved + $totalPending;
                    $approvedPercentage = $totalDocs > 0 ? round(($totalApproved / $totalDocs) * 100) : 0;
                @endphp

                <div class="glass-effect rounded-xl p-6 text-center transform hover:scale-105 transition-all duration-300">
                    <div class="text-4xl font-bold text-green-600 mb-2">{{ $totalApproved }}</div>
                    <div class="text-gray-600">Dokumen Disetujui</div>
                </div>

                <div class="glass-effect rounded-xl p-6 text-center transform hover:scale-105 transition-all duration-300">
                    <div class="text-4xl font-bold text-yellow-600 mb-2">{{ $totalPending }}</div>
                    <div class="text-gray-600">Dokumen Pending</div>
                </div>

                <div class="glass-effect rounded-xl p-6 text-center transform hover:scale-105 transition-all duration-300">
                    <div class="text-4xl font-bold text-blue-600 mb-2">{{ $approvedPercentage }}%</div>
                    <div class="text-gray-600">Progress Keseluruhan</div>
                </div>
            </div>
        </div>

        <!-- Tahapan Slider -->
        <div class="glass-effect rounded-2xl p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Status per Tahapan</h2>
            
            <!-- Tahapan Navigation -->
            <div class="swiper-container mb-8">
                <div class="swiper-wrapper">
                    @foreach($tahapanData as $tahapan => $data)
                        <div class="swiper-slide">
                            <button 
                                onclick="showTahapan('{{ $tahapan }}')"
                                class="tahapan-tab w-full px-6 py-4 rounded-xl font-semibold transition-all duration-300 bg-gray-100 text-gray-600 hover:bg-blue-500 hover:text-white"
                                data-tahapan="{{ $tahapan }}"
                            >
                                {{ $tahapan }}
                            </button>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <!-- Tahapan Content -->
            @foreach($tahapanData as $tahapan => $data)
                <div id="tahapan-{{ Str::slug($tahapan) }}" class="tahapan-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Pie Chart -->
                        <div class="glass-effect rounded-xl p-6">
                            <canvas id="chart-{{ Str::slug($tahapan) }}" class="w-full" style="height: 300px;"></canvas>
                        </div>

                        <!-- Stats -->
                        <div class="glass-effect rounded-xl p-6">
                            <div class="grid grid-cols-2 gap-6 mb-6">
                                <div class="text-center p-6 rounded-xl bg-green-50 transform hover:scale-105 transition-all duration-300">
                                    <div class="text-3xl font-bold text-green-600">{{ $data['approved'] }}</div>
                                    <div class="text-gray-600 mt-2">Disetujui</div>
                                </div>
                                <div class="text-center p-6 rounded-xl bg-yellow-50 transform hover:scale-105 transition-all duration-300">
                                    <div class="text-3xl font-bold text-yellow-600">{{ $data['pending'] }}</div>
                                    <div class="text-gray-600 mt-2">Pending</div>
                                </div>
                            </div>

                            @php
                                $total = $data['approved'] + $data['pending'];
                                $percentage = $total > 0 ? ($data['approved'] / $total) * 100 : 0;
                            @endphp

                            <div class="mt-6">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-600 font-semibold">Progress Tahapan</span>
                                    <span class="text-blue-600 font-bold">{{ round($percentage) }}%</span>
                                </div>
                                <div class="bg-gray-200 rounded-full h-4 overflow-hidden">
                                    <div class="bg-blue-600 h-full transition-all duration-500" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Document List -->
                <div class="glass-effect rounded-xl p-6 mt-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Daftar Dokumen {{ $tahapan }}</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Dokumen</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Upload</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skor</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($project->documents->where('tahapan', $tahapan) as $document)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $document->documentType->uraian }}</div>
                                            <div class="text-sm text-gray-500">{{ $document->documentType->no }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $document->created_at->format('d M Y H:i') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                {{ $document->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                                   ($document->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                {{ ucfirst($document->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $document->score ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="{{ route('dashboard.guest.project-documents.show', $document) }}" 
                                               class="text-blue-600 hover:text-blue-900 mr-3">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('dashboard.guest.project-documents.download', $document) }}" 
                                               class="text-green-600 hover:text-green-900">
                                                <i class="fas fa-download"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                            Belum ada dokumen untuk tahapan ini
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <script>
        // Initialize particles.js
        particlesJS.load('particles-js', '/js/particles-config.js');

        // Mobile sidebar toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });

        // Initialize Swiper
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 'auto',
            spaceBetween: 16,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                1024: { slidesPerView: 4 }
            }
        });

        // Show/Hide Tahapan Content
        function showTahapan(tahapan) {
            document.querySelectorAll('.tahapan-content').forEach(content => {
                content.classList.add('hidden');
            });
            document.querySelectorAll('.tahapan-tab').forEach(tab => {
                tab.classList.remove('bg-blue-500', 'text-white');
                tab.classList.add('bg-gray-100', 'text-gray-600');
            });

            const selectedContent = document.getElementById('tahapan-' + tahapan.toLowerCase().replace(/ /g, '-'));
            const selectedTab = document.querySelector(`[data-tahapan="${tahapan}"]`);

            if (selectedContent) selectedContent.classList.remove('hidden');
            if (selectedTab) {
                selectedTab.classList.remove('bg-gray-100', 'text-gray-600');
                selectedTab.classList.add('bg-blue-500', 'text-white');
            }

            // Initialize pie chart for the selected tahapan
            const data = @json($tahapanData);
            const tahapanData = data[tahapan];
            
            new Chart(document.getElementById('chart-' + tahapan.toLowerCase().replace(/ /g, '-')), {
                type: 'pie',
                data: {
                    labels: ['Disetujui', 'Pending'],
                    datasets: [{
                        data: [tahapanData.approved, tahapanData.pending],
                        backgroundColor: ['#10B981', '#FBBF24'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        // Show first tahapan by default
        document.addEventListener('DOMContentLoaded', function() {
            const firstTahapan = document.querySelector('.tahapan-tab');
            if (firstTahapan) {
                showTahapan(firstTahapan.getAttribute('data-tahapan'));
            }
        });
    </script>
</body>
</html>