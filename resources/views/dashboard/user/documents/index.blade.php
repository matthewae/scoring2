<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dokumen - Scoring App</title>
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
        .document-card {
            transition: all 0.3s ease;
        }
        .document-card:hover {
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
            <div class="mb-6">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-emerald-600 to-sky-600 text-transparent bg-clip-text">Daftar Dokumen</h2>
            </div>

            <!-- Filter and Search Section -->
            <div class="flex flex-wrap gap-4 mb-6">
                <div class="flex-1 min-w-[200px]">
                    <div class="relative">
                        <input type="text" placeholder="Cari dokumen..." class="w-full pl-10 pr-4 py-2 rounded-xl glass-effect focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>
                <select class="px-4 py-2 rounded-xl glass-effect focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">Semua Tahapan</option>
                    <option value="perencanaan">Perencanaan</option>
                    <option value="pelaksanaan">Pelaksanaan</option>
                    <option value="pengawasan">Pengawasan</option>
                </select>
                <select class="px-4 py-2 rounded-xl glass-effect focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">Semua Status</option>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>

            <!-- Documents Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left border-b border-gray-200">
                            <th class="pb-4 font-semibold text-gray-600">Nama Dokumen</th>
                            <th class="pb-4 font-semibold text-gray-600">Tahapan</th>
                            <th class="pb-4 font-semibold text-gray-600">Tipe</th>
                            <th class="pb-4 font-semibold text-gray-600">Status</th>
                            <th class="pb-4 font-semibold text-gray-600">Tanggal Upload</th>
                            <th class="pb-4 font-semibold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($documents as $document)
                            <tr class="hover:bg-white/30 transition-colors duration-200">
                                <td class="py-4">
                                    <div class="flex items-center space-x-3">
                                        <i class="fas fa-file-pdf text-red-500"></i>
                                        <span class="font-medium">{{ $document->name }}</span>
                                    </div>
                                </td>
                                <td class="py-4">{{ $document->document_type_code }}</td>
                                <td class="py-4">{{ $document->documentType ? $document->documentType->name : '-' }}</td>
                                <td class="py-4">
                                    <span class="px-3 py-1 rounded-full text-sm font-medium
                                        {{ $document->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                            ($document->status === 'rejected' ? 'bg-red-100 text-red-800' : 
                                            'bg-yellow-100 text-yellow-800') }}">
                                        {{ ucfirst($document->status) }}
                                    </span>
                                </td>
                                <td class="py-4">{{ $document->created_at->format('d M Y') }}</td>
                                <td class="py-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('dashboard.user.documents.show', $document->id) }}" class="text-sky-600 hover:text-sky-800" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-gray-500">
                                    <i class="fas fa-folder-open text-4xl mb-4"></i>
                                    <p>Belum ada dokumen yang diupload</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $documents->links() }}
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