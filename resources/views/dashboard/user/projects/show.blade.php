<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Project - Scoring System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #0ea5e9 0%, #8b5cf6 50%, #10b981 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }
        .gradient-background {
            background: linear-gradient(135deg, #0ea5e9 0%, #8b5cf6 50%, #10b981 100%);
            transform: scale(0.98);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            color: white;
            box-shadow: 0 15px 35px rgba(14, 165, 233, 0.25);
            border-radius: 1rem;
        }
        .gradient-background:hover {
            transform: scale(1.01);
            box-shadow: 0 20px 40px rgba(139, 92, 246, 0.35);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 10px 30px rgba(14, 165, 233, 0.2);
            transform: scale(0.98);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 1rem;
        }
        .glass-effect:hover {
            transform: scale(1.01);
            box-shadow: 0 12px 40px rgba(14, 165, 233, 0.25);
        }
        .sidebar {
            transition: all 0.3s ease;
            width: 14rem;
            position: fixed;
            height: 100vh;
            z-index: 40;
        }
        .sidebar.collapsed {
            transform: translateX(-100%);
        }
        .main-content {
            transition: margin-left 0.3s ease;
            margin-left: 14rem;
        }
        .main-content.expanded {
            margin-left: 0;
        }
        #sidebarToggle {
            transition: all 0.3s ease;
        }
        #sidebarToggle.active {
            transform: rotate(180deg);
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Particles Background -->
    <div id="particles-js" class="fixed inset-0 -z-10 opacity-50"></div>

    <!-- Sidebar Toggle Button -->
    <button id="sidebarToggle" class="fixed top-4 left-4 z-50 bg-white p-2 rounded-lg shadow-lg hover:bg-gray-50 transition-all duration-300">
        <i class="fas fa-chevron-left text-gray-800"></i>
    </button>

    <!-- Sidebar -->
    <aside class="sidebar glass-effect">
        <div class="p-6">
            <div class="flex items-center justify-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Scoring System</h1>
            </div>
            <nav class="space-y-4">
                <a href="{{ route('dashboard.user.index') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('dashboard.user.projects.index') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-project-diagram"></i>
                    <span>Project</span>
                </a>
                <a href="{{ route('dashboard.user.assessment-requests.index') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-tasks"></i>
                    <span>Pengajuan Penilaian</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content p-8">
        <div class="glass-effect p-8 mb-8">
            <!-- Project Details -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Detail Project</h2>
                    <a href="{{ route('dashboard.user.projects.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="glass-effect p-6 hover:shadow-lg">
                        <h3 class="text-lg font-semibold mb-4">{{ $project->name }}</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-600">Status</p>
                                <p class="font-semibold text-gray-800">{{ ucfirst($project->status) }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Lokasi</p>
                                <p class="font-semibold text-gray-800">{{ $project->location }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Estimasi Biaya</p>
                                <p class="font-semibold text-gray-800">Rp {{ number_format($project->contract_value, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="glass-effect p-6 hover:shadow-lg">
                        <h3 class="text-lg font-semibold mb-4">Informasi Waktu</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-600">Tanggal SPMK</p>
                                <p class="font-semibold text-gray-800">{{ $project->spmk_date ? $project->spmk_date->format('d M Y') : '-' }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Jangka Waktu</p>
                                <p class="font-semibold text-gray-800">{{ $project->duration_days }} hari</p>
                            </div>
                        </div>
                    </div>

                    <div class="glass-effect p-6 hover:shadow-lg">
                        <h3 class="text-lg font-semibold mb-4">Pihak Terkait</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-600">Kementerian/Lembaga</p>
                                <p class="font-semibold text-gray-800">{{ $project->ministry_institution }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Konsultan Perencana</p>
                                <p class="font-semibold text-gray-800">{{ $project->planning_consultant }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Konsultan MK</p>
                                <p class="font-semibold text-gray-800">{{ $project->mk_consultant }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if($project->description)
                <div class="glass-effect rounded-lg p-6 mt-6">
                    <h3 class="text-lg font-semibold mb-4">Deskripsi Project</h3>
                    <p class="text-gray-800">{{ $project->description }}</p>
                </div>
                @endif

                <!-- Project Documents -->
                <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Document Status Overview -->
                    <div class="lg:col-span-2">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold">Dokumen Project</h3>
                            <a href="{{ route('dashboard.user.project-documents.create', ['project' => $project->id]) }}" 
                               class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fas fa-plus mr-2"></i>
                                Upload Dokumen
                            </a>
                        </div>

                        @php
                            $documentTypes = \App\Models\DocumentType::orderBy('tahapan_order')
                                ->orderBy('tahapan')
                                ->orderBy('no')
                                ->get()
                                ->groupBy('tahapan');
                            $uploadedDocs = $project->projectDocuments->pluck('document_type_code')->toArray();
                        @endphp

                        @foreach($documentTypes as $tahapan => $types)
                            <div class="glass-effect rounded-lg p-6 mb-6">
                                <h4 class="text-lg font-semibold mb-4">{{ $tahapan }}</h4>
                                <div class="space-y-4">
                                    @foreach($types as $type)
                                        @php
                                            $document = $project->projectDocuments->where('document_type_code', $type->code)->first();
                                            $statusClass = !$document ? 'bg-gray-100 text-gray-800' :
                                                ($document->status === 'approved' ? 'bg-green-100 text-green-800' :
                                                ($document->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800'));
                                        @endphp

                                        <div class="flex items-center justify-between p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                                            <div class="flex-grow">
                                                <div class="flex items-center gap-2">
                                                    <span class="text-sm font-mono text-gray-500">{{ $type->code }}</span>
                                                    <h5 class="font-medium text-gray-800">{{ $type->uraian }}</h5>
                                                </div>
                                                @if($document)
                                                    <p class="text-sm text-gray-600 mt-1">Diupload: {{ $document->created_at->format('d M Y') }}</p>
                                                @endif
                                            </div>
                                            <div class="flex items-center gap-4">
                                                <span class="px-3 py-1 rounded-full text-sm font-medium {{ $statusClass }}">
                                                    {{ $document ? ucfirst($document->status) : 'Belum Upload' }}
                                                </span>
                                                @if($document && $document->file_path)
                                                    <a href="{{ asset($document->file_path) }}" target="_blank" 
                                                       class="text-blue-600 hover:text-blue-800">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>

                                        @if($document && $document->score !== null)
                                            <div class="ml-4 p-3 bg-blue-50 rounded-lg">
                                                <div class="flex justify-between items-center">
                                                    <span class="text-sm text-gray-700">Skor Penilaian</span>
                                                    <div class="flex items-center gap-2">
                                                        <div class="w-24 h-2 bg-gray-200 rounded-full overflow-hidden">
                                                            <div class="h-full bg-blue-500 rounded-full" style="width: {{ $document->score }}%"></div>
                                                        </div>
                                                        <span class="text-sm font-medium text-gray-800">{{ number_format($document->score, 1) }}/100</span>
                                                    </div>
                                                </div>
                                                @if($document->remarks)
                                                    <p class="text-sm text-gray-600 mt-2">{{ $document->remarks }}</p>
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Document Statistics -->
                    <div class="glass-effect p-6 hover:shadow-lg">
                        <h3 class="text-lg font-semibold mb-6">Statistik Dokumen</h3>
                        
                        @php
                            $stats = [];
                            foreach($documentTypes as $tahapan => $types) {
                                $total = $types->count();
                                $uploaded = $project->projectDocuments
                                    ->whereIn('document_type_code', $types->pluck('code'))
                                    ->count();
                                $stats[$tahapan] = [
                                    'total' => $total,
                                    'uploaded' => $uploaded,
                                    'percentage' => $total > 0 ? round(($uploaded / $total) * 100) : 0
                                ];
                            }
                        @endphp

                        <div class="mb-8">
                            <canvas id="documentPieChart"></canvas>
                        </div>

                        <div class="space-y-4">
                            @foreach($stats as $tahapan => $stat)
                                <div class="p-4 bg-white rounded-lg">
                                    <div class="flex justify-between items-center mb-2">
                                        <h6 class="font-medium text-gray-800">{{ $tahapan }}</h6>
                                        <span class="text-sm font-medium">{{ $stat['percentage'] }}%</span>
                                    </div>
                                    <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-full bg-blue-500 rounded-full" style="width: {{ $stat['percentage'] }}%"></div>
                                    </div>
                                    <p class="text-sm text-gray-600 mt-2">
                                        {{ $stat['uploaded'] }} dari {{ $stat['total'] }} dokumen
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Initialize Chart.js
        const ctx = document.getElementById('documentPieChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode(array_keys($stats)) !!},
                datasets: [{
                    data: {!! json_encode(array_values(array_map(function($stat) { return $stat['percentage']; }, $stats))) !!},
                    backgroundColor: [
                        '#3B82F6',
                        '#10B981',
                        '#8B5CF6',
                        '#F59E0B',
                        '#EF4444'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Initialize Particles.js
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: ['#0ea5e9', '#8b5cf6', '#10b981'] },
                shape: { type: ['circle', 'triangle', 'polygon'], polygon: { nb_sides: 6 } },
                opacity: { value: 0.4, random: true, anim: { enable: true, speed: 1, opacity_min: 0.1, sync: false } },
                size: { value: 4, random: true, anim: { enable: true, speed: 2, size_min: 0.1, sync: false } },
                line_linked: { enable: true, distance: 150, color: '#0ea5e9', opacity: 0.3, width: 1.5 },
                move: { enable: true, speed: 2, direction: 'none', random: true, straight: false, out_mode: 'out', bounce: false, attract: { enable: true, rotateX: 600, rotateY: 1200 } }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' }, resize: true },
                modes: { repulse: { distance: 150, duration: 0.4 }, push: { particles_nb: 4 } }
            },
            retina_detect: true
        });

        // Sidebar Toggle
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const toggleIcon = sidebarToggle.querySelector('i');

        function toggleSidebar() {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
            sidebarToggle.classList.toggle('active');
            toggleIcon.classList.toggle('fa-chevron-left');
            toggleIcon.classList.toggle('fa-chevron-right');
        }

        sidebarToggle.addEventListener('click', toggleSidebar);

        // Handle initial state for mobile
        function handleResize() {
            if (window.innerWidth <= 768) {
                sidebar.classList.add('collapsed');
                mainContent.classList.add('expanded');
            } else {
                sidebar.classList.remove('collapsed');
                mainContent.classList.remove('expanded');
            }
        }

        window.addEventListener('resize', handleResize);
        handleResize(); // Call on initial load
    </script>
</body>
</html>