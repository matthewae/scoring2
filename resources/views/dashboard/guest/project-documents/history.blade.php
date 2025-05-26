<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengajuan Dokumen</title>
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
        .status-badge {
            transition: all 0.3s ease;
        }
        .status-badge:hover {
            transform: scale(1.05);
        }
        .table-row {
            transition: all 0.2s ease;
        }
        .table-row:hover {
            background-color: rgba(243, 244, 246, 0.8);
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
            <a href="{{ route('dashboard.guest.index') }}" class="flex items-center text-gray-700 hover:text-emerald-600 transition-colors duration-200">
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
        <div class="max-w-7xl mx-auto">
        <!-- Header Card -->
        <div class="glass-card rounded-xl p-6 mb-8 shadow-lg">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-history text-emerald-500 mr-3"></i>
                        Riwayat Pengajuan Dokumen
                    </h1>
                    <p class="mt-2 text-gray-600">Berikut adalah daftar dokumen yang telah Anda ajukan beserta statusnya.</p>
                </div>
                <a href="{{ route('dashboard.guest.project-documents.create') }}" 
                    class="inline-flex items-center px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg transition-colors duration-200">
                    <i class="fas fa-plus mr-2"></i>
                    Ajukan Dokumen Baru
                </a>
            </div>
        </div>

        <!-- Table Card -->
        <div class="glass-card rounded-xl overflow-hidden shadow-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-50 bg-opacity-80">
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Project</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jenis Dokumen</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal Pengajuan</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white bg-opacity-50">
                        @forelse($projectDocuments as $document)
                            <tr class="table-row">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $document->project ? $document->project->name : 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $document->document_type ? $document->document_type->name : 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $document->created_at->format('d M Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @switch($document->status)
                                        @case('pending')
                                            <span class="status-badge px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                <i class="fas fa-clock mr-1"></i> Pending
                                            </span>
                                            @break
                                        @case('approved')
                                            <span class="status-badge px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                <i class="fas fa-check mr-1"></i> Disetujui
                                            </span>
                                            @break
                                        @case('rejected')
                                            <span class="status-badge px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                <i class="fas fa-times mr-1"></i> Ditolak
                                            </span>
                                            @break
                                    @endswitch
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ route('dashboard.guest.project-documents.show', $document->id) }}" 
                                        class="text-indigo-600 hover:text-indigo-900 font-medium transition-colors duration-200">
                                        <i class="fas fa-eye mr-1"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    <i class="fas fa-folder-open text-4xl mb-3"></i>
                                    <p>Belum ada dokumen yang diajukan</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($projectDocuments->hasPages())
                <div class="px-6 py-4 bg-gray-50 bg-opacity-80 border-t border-gray-200">
                    {{ $projectDocuments->links() }}
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