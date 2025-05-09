<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penilaian Project - Scoring System</title>
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
                    <h3 class="text-xl font-semibold mb-4 bg-gradient-to-r from-emerald-600 to-sky-600 text-transparent bg-clip-text">{{ $project->name }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Status</p>
                            <p class="font-semibold text-gray-800">{{ ucfirst($project->status) }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Lokasi</p>
                            <p class="font-semibold text-gray-800">{{ $project->location }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Estimasi Biaya</p>
                            <p class="font-semibold text-gray-800">Rp {{ number_format($project->contract_value, 0, ',', '.') }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Tanggal SPMK</p>
                            <p class="font-semibold text-gray-800">{{ $project->spmk_date ? $project->spmk_date->format('d M Y') : '-' }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Jangka Waktu</p>
                            <p class="font-semibold text-gray-800">{{ $project->duration_days }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Kementerian/Lembaga</p>
                            <p class="font-semibold text-gray-800">{{ $project->ministry_institution }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Konsultan Perencana</p>
                            <p class="font-semibold text-gray-800">{{ $project->planning_consultant }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Konsultan MK</p>
                            <p class="font-semibold text-gray-800">{{ $project->mk_consultant }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Kontraktor</p>
                            <p class="font-semibold text-gray-800">{{ $project->contractor }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Metode Pemilihan</p>
                            <p class="font-semibold text-gray-800">{{ $project->selection_method }}</p>
                        </div>
                        <div class="glass-effect rounded-lg p-4">
                            <p class="text-gray-600">Jangka Waktu</p>
                            <p class="font-semibold text-gray-800">{{ $project->duration_days }}</p>
                        </div>
                    </div>
                    @if($project->description)
                    <div class="glass-effect rounded-lg p-4">
                        <p class="text-gray-600 mb-2">Deskripsi Project</p>
                        <p class="text-gray-800">{{ $project->description }}</p>
                    </div>
                    @endif
           

                <!-- Document Scores -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Hasil Penilaian Dokumen</h4>
                    @forelse($project->documents as $document)
                        <div class="glass-effect rounded-xl p-6 score-card">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h5 class="font-semibold text-gray-800">{{ $document->document_type->name }}</h5>
                                    <p class="text-sm text-gray-600">Submitted: {{ $document->created_at->format('d M Y H:i') }}</p>
                                </div>
                                <span class="px-4 py-1 rounded-full text-sm font-medium {{ $document->status === 'approved' ? 'bg-green-100 text-green-800' : ($document->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($document->status) }}
                                </span>
                            </div>
                            @if($document->score)
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Skor Total</span>
                                        <span class="font-semibold text-gray-800">{{ $document->score }}/100</span>
                                    </div>
                                    @if($document->feedback)
                                        <div class="mt-4">
                                            <h6 class="text-sm font-medium text-gray-700 mb-2">Feedback:</h6>
                                            <p class="text-gray-600 text-sm">{{ $document->feedback }}</p>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <p class="text-gray-500 italic">Belum ada penilaian</p>
                            @endif
                        </div>
                    @empty
                        <div class="text-center py-8 text-gray-500">
                            <i class="fas fa-folder-open text-4xl mb-4"></i>
                            <p>Belum ada dokumen yang dinilai</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('collapsed');
            document.querySelector('.main-content').classList.toggle('ml-0');
        });
    </script>
</body>
</html>