<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dokumen Project</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        .glass-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
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
            <a href="/dashboard/guest" class="flex items-center text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                <i class="fas fa-home w-6"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('dashboard.guest.project-documents.history') }}" class="flex items-center text-emerald-600 font-medium">
                <i class="fas fa-history w-6"></i>
                <span>Riwayat Dokumen</span>
            </a>
            <a href="{{ route('dashboard.guest.project-documents.create') }}" class="flex items-center text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                <i class="fas fa-file-upload w-6"></i>
                <span>Upload Dokumen</span>
            </a>
            <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                @csrf
                <button type="submit" class="flex items-center text-gray-700 hover:text-red-600 transition-colors duration-200 mt-8">
                    <i class="fas fa-sign-out-alt w-6"></i>
                    <span>Logout</span>
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-content ml-60 p-6 md:p-8">
        <div class="max-w-4xl mx-auto">
            <!-- Header Card -->
            <div class="glass-card rounded-xl p-6 mb-8 shadow-lg">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 flex items-center">
                            <i class="fas fa-file-alt text-emerald-500 mr-3"></i>
                            Detail Dokumen
                        </h1>
                        <p class="mt-2 text-gray-600">Informasi lengkap mengenai dokumen yang diajukan.</p>
                    </div>
                    <a href="{{ route('dashboard.guest.project-documents.history') }}" 
                        class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Document Details Card -->
            <div class="glass-card rounded-xl overflow-hidden shadow-lg p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Informasi Project</h3>
                        <p class="text-gray-600">Nama Project: <span class="text-gray-900">{{ $projectDocument->project->name }}</span></p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Jenis Dokumen</h3>
                        <p class="text-gray-600">{{ $projectDocument->documentType->name }}</p>
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Status Dokumen</h3>
                    <div class="flex items-center space-x-4">
                        @switch($projectDocument->status)
                            @case('pending')
                                <span class="px-4 py-2 inline-flex items-center rounded-full bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-clock mr-2"></i> Pending
                                </span>
                                @break
                            @case('approved')
                                <span class="px-4 py-2 inline-flex items-center rounded-full bg-green-100 text-green-800">
                                    <i class="fas fa-check mr-2"></i> Disetujui
                                </span>
                                @break
                            @case('rejected')
                                <span class="px-4 py-2 inline-flex items-center rounded-full bg-red-100 text-red-800">
                                    <i class="fas fa-times mr-2"></i> Ditolak
                                </span>
                                @break
                        @endswitch
                        <span class="text-gray-600">Diajukan pada: {{ $projectDocument->created_at->format('d M Y H:i') }}</span>
                    </div>
                </div>

                @if($projectDocument->score)
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Skor</h3>
                    <div class="text-2xl font-bold text-emerald-600">{{ $projectDocument->score }}</div>
                </div>
                @endif

                @if($projectDocument->remarks)
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Catatan Reviewer</h3>
                    <p class="text-gray-700 bg-gray-50 rounded-lg p-4">{{ $projectDocument->remarks }}</p>
                </div>
                @endif

                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">File Dokumen</h3>
                    <a href="{{ route('dashboard.guest.project-documents.download', $projectDocument->id) }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors duration-200">
                        <i class="fas fa-download mr-2"></i>
                        Download Dokumen
                    </a>
                </div>

                @if($projectDocument->sumber)
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Sumber</h3>
                    <p class="text-gray-700">{{ $projectDocument->sumber }}</p>
                </div>
                @endif

                @if($projectDocument->catatan)
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Catatan Pengajuan</h3>
                    <p class="text-gray-700">{{ $projectDocument->catatan }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('ml-0');
            mainContent.classList.toggle('ml-60');
        });
    </script>
</body>
</html>