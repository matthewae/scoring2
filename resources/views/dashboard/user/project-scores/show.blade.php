<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penilaian Project - Scoring System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        .tahapan-tab {
            background: rgba(255, 255, 255, 0.5);
            color: #4B5563;
        }
        .tahapan-tab.active {
            background: #3B82F6;
            color: white;
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
            <a href="{{ route('dashboard.user.documents.upload') }}" class="flex items-center space-x-3 text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                <i class="fas fa-upload"></i>
                <span>Upload Dokumen</span>
            </a>
            <a href="{{ route('dashboard.user.assessment-requests.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                <i class="fas fa-tasks"></i>
                <span>Pengajuan Penilaian</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content ml-60 p-8">
        <div class="glass-effect rounded-2xl p-8">
            <!-- Project Details -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-emerald-600 to-sky-600 text-transparent bg-clip-text">Detail Project</h2>
                    <a href="{{ route('dashboard.user.project-scores.index') }}" class="bg-white/30 text-gray-700 px-4 py-2 rounded-lg hover:bg-white/40 transition-all duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
                <div class="glass-effect rounded-xl p-6 mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold bg-gradient-to-r from-emerald-600 to-sky-600 text-transparent bg-clip-text">{{ $projectScore->name }}</h3>
                        <span class="px-4 py-2 rounded-full {{ $projectScore->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ ucfirst($projectScore->status) }}
                        </span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Kementerian/Lembaga</p>
                            <p class="font-semibold text-gray-800">{{ $projectScore->ministry_institution }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Lokasi</p>
                            <p class="font-semibold text-gray-800">{{ $projectScore->location }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Estimasi Biaya</p>
                            <p class="font-semibold text-gray-800">Rp {{ number_format($projectScore->estimated_cost, 0, ',', '.') }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Tanggal SPMK</p>
                            <p class="font-semibold text-gray-800">{{ $projectScore->spmk_date ? $projectScore->spmk_date->format('d M Y') : '-' }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Jangka Waktu</p>
                            <p class="font-semibold text-gray-800">{{ $projectScore->duration_days }} hari</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Konsultan Perencana</p>
                            <p class="font-semibold text-gray-800">{{ $projectScore->planning_consultant ?: '-' }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Konsultan MK</p>
                            <p class="font-semibold text-gray-800">{{ $projectScore->mk_consultant ?: '-' }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Kontraktor</p>
                            <p class="font-semibold text-gray-800">{{ $projectScore->contractor ?: '-' }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Metode Pemilihan</p>
                            <p class="font-semibold text-gray-800">{{ ucfirst(str_replace('_', ' ', $projectScore->selection_method)) }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4 md:col-span-2">
                            <p class="text-gray-600">Deskripsi Project</p>
                            <p class="font-semibold text-gray-800">{{ $projectScore->description ?: '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Ringkasan Statistik -->
                <div class="glass-effect rounded-xl p-6 mb-8">
                    <h4 class="text-2xl font-semibold text-gray-800 mb-6">Ringkasan Penilaian</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @php
                            $totalDocuments = 0;
                            $totalApproved = 0;
                            $totalScore = 0;
                            $scoredDocuments = 0;
                            
                            foreach($documentsByTahapan as $docs) {
                                $totalDocuments += $docs->count();
                                $totalApproved += $docs->where('pivot.status', 'approved')->count();
                                
                                foreach($docs as $doc) {
                                    if($doc->pivot->score !== null) {
                                        $totalScore += $doc->pivot->score;
                                        $scoredDocuments++;
                                    }
                                }
                            }
                            
                            $averageScore = $scoredDocuments > 0 ? round($totalScore / $scoredDocuments, 1) : 0;
                            $completionRate = $totalDocuments > 0 ? round(($totalApproved / $totalDocuments) * 100) : 0;
                        @endphp
                        
                        <div class="glass-effect rounded-lg p-6 text-center">
                            <p class="text-4xl font-bold text-blue-600 mb-2">{{ $totalDocuments }}</p>
                            <p class="text-gray-600">Total Dokumen</p>
                        </div>
                        <div class="glass-effect rounded-lg p-6 text-center">
                            <p class="text-4xl font-bold text-emerald-600 mb-2">{{ $completionRate }}%</p>
                            <p class="text-gray-600">Tingkat Penyelesaian</p>
                        </div>
                        <div class="glass-effect rounded-lg p-6 text-center">
                            <p class="text-4xl font-bold text-indigo-600 mb-2">{{ $averageScore }}</p>
                            <p class="text-gray-600">Rata-rata Nilai</p>
                        </div>
                    </div>
                </div>
                
                <!-- Document Scores by Tahapan -->
                <div class="space-y-8">
                    <h4 class="text-2xl font-semibold text-gray-800">Hasil Penilaian per Tahapan</h4>
                    
                    @php
                        $documentsByTahapan = $projectScore->documentTypes->groupBy('tahapan');
                        
                        $tahapanStats = [];
                        foreach($documentsByTahapan as $tahapan => $documents) {
                            // Sort documents by no and parent_code
                            $documents = $documents->sortBy(['no', 'parent_code']);
                            
                            $tahapanStats[$tahapan] = [
                                'approved' => $documents->where('pivot.status', 'approved')->count(),
                                'pending' => $documents->where('pivot.status', '!=', 'approved')->count()
                            ];
                        }
                    @endphp

                    <!-- Tahapan Navigation -->
                    <div class="flex space-x-4 overflow-x-auto pb-4">
                        @foreach($documentsByTahapan as $tahapan => $documents)
                            <button 
                                onclick="showTahapan('{{ Str::slug($tahapan) }}')"
                                class="tahapan-tab px-6 py-3 rounded-xl font-semibold transition-all duration-300 whitespace-nowrap"
                                data-tahapan="{{ Str::slug($tahapan) }}"
                            >
                                {{ $tahapan }}
                            </button>
                        @endforeach
                    </div>

                    <!-- Tahapan Content -->
                    @foreach($documentsByTahapan as $tahapan => $documents)
                        <div id="tahapan-{{ Str::slug($tahapan) }}" class="tahapan-content hidden space-y-6">
                            <div class="flex justify-between items-start">
                                <div class="space-y-2">
                                    <h5 class="text-xl font-semibold text-gray-800">{{ $tahapan }}</h5>
                                    <p class="text-gray-600">Total Dokumen: {{ $documents->count() }}</p>
                                </div>
                                <div class="w-64 h-64">
                                    <canvas id="chart-{{ Str::slug($tahapan) }}"></canvas>
                                </div>
                            </div>

                            <!-- Documents List -->
                            @foreach($documents as $document)
                                <div class="glass-effect rounded-xl p-6 score-card {{ $document->parent_code ? 'ml-8' : '' }}">
                                    <div class="flex justify-between items-start mb-4">
                                        <div>
                                            <div class="flex items-center gap-2 mb-2">
                                                <span class="px-2 py-1 bg-gray-100 rounded text-sm font-mono">{{ $document->code }}</span>
                                                @if($document->no)
                                                    <span class="text-gray-500">#{{ $document->no }}</span>
                                                @endif
                                            </div>
                                            <h6 class="font-semibold text-gray-800">{{ $document->uraian }}</h6>
                                            <p class="text-sm text-gray-600">Diajukan: {{ $document->pivot->created_at->format('d M Y H:i') }}</p>
                                            @if($document->parent_code)
                                                <p class="text-xs text-gray-500 mt-1">Parent: {{ $document->parent_code }}</p>
                                            @endif
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <span class="px-4 py-1 rounded-full text-sm font-medium {{ $document->pivot->status === 'approved' ? 'bg-green-100 text-green-800' : ($document->pivot->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                {{ ucfirst($document->pivot->status) }}
                                            </span>
                                            <span class="font-mono bg-gray-100 px-3 py-1 rounded-lg">
                                                Nilai: {{ $document->pivot->status === 'approved' ? '1' : '0' }}
                                            </span>
                                        </div>
                                    </div>
                                    @if($document->pivot->score)
                                        <div class="space-y-3">
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-600">Skor Total</span>
                                                <span class="font-semibold text-gray-800">{{ $document->pivot->score }}/100</span>
                                            </div>
                                            @if($document->pivot->remarks)
                                                <div class="mt-4">
                                                    <h6 class="text-sm font-medium text-gray-700 mb-2">Feedback:</h6>
                                                    <p class="text-gray-600 text-sm">{{ $document->pivot->remarks }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <p class="text-gray-500 italic">Belum ada penilaian</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                    @if($documentsByTahapan->isEmpty())
                        <div class="text-center py-8 text-gray-500">
                            <i class="fas fa-folder-open text-4xl mb-4"></i>
                            <p>Belum ada dokumen yang dinilai</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('collapsed');
            document.querySelector('.main-content').classList.toggle('ml-0');
        });

        // Show/Hide Tahapan Content
        function showTahapan(tahapan) {
            document.querySelectorAll('.tahapan-content').forEach(content => {
                content.classList.add('hidden');
            });
            document.querySelectorAll('.tahapan-tab').forEach(tab => {
                tab.classList.remove('active');
            });

            const selectedContent = document.getElementById('tahapan-' + tahapan);
            const selectedTab = document.querySelector(`[data-tahapan="${tahapan}"]`);

            if (selectedContent && selectedTab) {
                selectedContent.classList.remove('hidden');
                selectedTab.classList.add('active');
            }
        }

        // Initialize pie charts for each tahapan
        const tahapanStats = @json($tahapanStats);
        
        Object.entries(tahapanStats).forEach(([tahapan, stats]) => {
            const ctx = document.getElementById('chart-' + tahapan.toLowerCase().replace(/ /g, '-'))?.getContext('2d');
            if (ctx) {
                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Disetujui', 'Pending'],
                        datasets: [{
                            data: [stats.approved, stats.pending],
                            backgroundColor: ['#10B981', '#FCD34D'],
                            borderColor: ['#059669', '#F59E0B'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            },
                            title: {
                                display: true,
                                text: 'Status Dokumen'
                            }
                        }
                    }
                });
            }
        });

        // Show first tahapan by default
        const firstTahapanTab = document.querySelector('.tahapan-tab');
        if (firstTahapanTab) {
            showTahapan(firstTahapanTab.getAttribute('data-tahapan'));
        }
    </script>
</body>
</html>