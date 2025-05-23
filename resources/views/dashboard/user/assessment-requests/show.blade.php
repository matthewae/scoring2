<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengajuan Penilaian - Scoring App</title>
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
        <div class="glass-effect rounded-2xl p-8 mb-8">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('dashboard.user.assessment-requests.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-800">
                    <i class="fas fa-arrow-left mr-2"></i>
                    <span>Kembali ke Daftar Pengajuan</span>
                </a>
            </div>

            <!-- Header -->
            <div class="flex justify-between items-start mb-8">
                <div>
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-emerald-600 to-sky-600 text-transparent bg-clip-text mb-2">
                        {{ $assessmentRequest->project->name }}
                    </h2>
                    <p class="text-gray-600">{{ $assessmentRequest->project->description }}</p>
                </div>
                <span class="px-4 py-2 rounded-xl {{ 
                    $assessmentRequest->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                    ($assessmentRequest->status === 'approved' ? 'bg-green-100 text-green-800' : 
                    'bg-red-100 text-red-800')
                }} font-medium">
                    {{ ucfirst($assessmentRequest->status) }}
                </span>
            </div>

            <!-- Project Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="glass-effect rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">
                        <i class="fas fa-info-circle mr-2"></i>Informasi Proyek
                    </h3>
                    <div class="space-y-3">
                        <div>
                            <span class="text-gray-600">Tahap:</span>
                            <span class="ml-2 font-medium text-gray-800 bg-emerald-100 px-3 py-1 rounded-full">{{ $assessmentRequest->project->stage }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Tanggal Pengajuan:</span>
                            <span class="ml-2 font-medium text-gray-800">{{ $assessmentRequest->created_at->format('d M Y H:i') }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Pengaju:</span>
                            <span class="ml-2 font-medium text-gray-800 bg-blue-100 px-3 py-1 rounded-full">
                                <i class="fas fa-user mr-1"></i>{{ $assessmentRequest->guest->name }}
                            </span>
                        </div>
                        <div>
                            <span class="text-gray-600">Email:</span>
                            <span class="ml-2 font-medium text-gray-800">
                                <i class="fas fa-envelope mr-1"></i>{{ $assessmentRequest->guest->email }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="glass-effect rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">
                        <i class="fas fa-file-alt mr-2"></i>Status Dokumen
                    </h3>
                    <div class="space-y-3">
                        @forelse($assessmentRequest->project->projectDocuments as $document)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fas fa-file mr-2 text-gray-500"></i>
                                    <span class="text-gray-800">{{ $document->documentType->name ?? 'N/A' }}</span>
                                </div>
                                <span class="px-3 py-1 rounded-full text-sm font-medium {{ 
                                    $document->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                    ($document->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                    'bg-red-100 text-red-800')
                                }}">
                                    {{ ucfirst($document->status) }}
                                </span>
                            </div>
                        @empty
                            <p class="text-gray-500 italic">Belum ada dokumen yang diunggah</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Document List -->
            <div class="glass-effect rounded-xl p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-6">
                    <i class="fas fa-folder-open mr-2"></i>Daftar Dokumen
                </h3>
                <div class="space-y-4">
                    @forelse($assessmentRequest->project->projectDocuments as $document)
                        <div class="glass-effect rounded-xl p-4 hover:bg-white/50 transition-colors duration-200">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h4 class="font-medium text-gray-800">{{ $document->documentType->name ?? 'N/A' }}</h4>
                                    <p class="text-sm text-gray-600 mt-1">Diunggah pada: {{ $document->created_at->format('d M Y H:i') }}</p>
                                    @if($document->remarks)
                                        <p class="text-sm text-gray-600 mt-2">Catatan: {{ $document->remarks }}</p>
                                    @endif
                                </div>
                                <div class="flex items-center space-x-3">
                                    @if($document->score)
                                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                                            Skor: {{ $document->score }}
                                        </span>
                                    @endif
                                    <a href="{{ route('dashboard.user.documents.show', $document->id) }}" 
                                       class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-xl hover:bg-indigo-200 transition-colors duration-200">
                                        <i class="fas fa-eye mr-1"></i>Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 italic py-8">Belum ada dokumen yang diunggah</p>
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