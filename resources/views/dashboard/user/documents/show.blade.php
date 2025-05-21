<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dokumen - Scoring App</title>
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
            <a href="{{ route('dashboard.user.documents.index') }}" class="flex items-center space-x-3 text-emerald-600 font-medium">
                <i class="fas fa-file-alt"></i>
                <span>Daftar Dokumen</span>
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
        <!-- Header Section -->
        <div class="glass-effect rounded-2xl p-8 mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-emerald-600 to-sky-600 text-transparent bg-clip-text">Detail Dokumen</h2>
                <a href="{{ route('dashboard.user.documents.index') }}" class="flex items-center space-x-2 text-gray-600 hover:text-gray-800 transition-colors duration-200">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </div>

            <!-- Document Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Informasi Dokumen</h3>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <span class="text-gray-600">Tahapan:</span>
                                <span class="font-medium">{{ $document->tahapan }}</span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="text-gray-600">Tipe Dokumen:</span>
                                <span class="font-medium">{{ $document->documentType->name }}</span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="text-gray-600">Status:</span>
                                <span class="px-3 py-1 rounded-full text-sm font-medium
                                    {{ $document->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                        ($document->status === 'rejected' ? 'bg-red-100 text-red-800' : 
                                        'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($document->status) }}
                                </span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="text-gray-600">Sumber:</span>
                                <span class="font-medium">{{ $document->source }}</span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="text-gray-600">Tanggal Upload:</span>
                                <span class="font-medium">{{ $document->created_at->format('d M Y H:i') }}</span>
                            </div>
                        </div>
                    </div>

                    @if($document->notes)
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Catatan</h3>
                        <p class="text-gray-600">{{ $document->notes }}</p>
                    </div>
                    @endif
                </div>

                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Preview Dokumen</h3>
                        <div class="glass-effect rounded-xl p-6 text-center">
                            <i class="fas fa-file-pdf text-6xl text-red-500 mb-4"></i>
                            <p class="text-gray-600 mb-4">{{ basename($document->file_path) }}</p>
                            <a href="{{ Storage::url($document->file_path) }}" target="_blank" 
                                class="inline-flex items-center space-x-2 px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-colors duration-200">
                                <i class="fas fa-download"></i>
                                <span>Download Dokumen</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>