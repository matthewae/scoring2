<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajuan Penilaian</title>
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
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-emerald-600 to-sky-600 text-transparent bg-clip-text">
                    <i class="fas fa-tasks mr-2"></i>
                    Daftar Pengajuan Penilaian
                </h2>
                <div class="flex space-x-2">
                    <button onclick="filterStatus('all')" class="px-4 py-2 rounded-xl glass-effect hover:bg-white/50 text-gray-700 font-medium transition-all duration-300">
                        <i class="fas fa-list-ul mr-2"></i>Semua
                    </button>
                    <button onclick="filterStatus('pending')" class="px-4 py-2 rounded-xl glass-effect bg-yellow-100/50 hover:bg-yellow-200/50 text-yellow-800 font-medium transition-all duration-300">
                        <i class="fas fa-clock mr-2"></i>Pending
                    </button>
                    <button onclick="filterStatus('completed')" class="px-4 py-2 rounded-xl glass-effect bg-green-100/50 hover:bg-green-200/50 text-green-800 font-medium transition-all duration-300">
                        <i class="fas fa-check-circle mr-2"></i>Selesai
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full glass-effect rounded-xl overflow-hidden">
                    <thead class="bg-white/30">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Project</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Pengaju</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Tahap</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Tipe Dokumen</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Tanggal Pengajuan</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200/30">
                        @forelse($assessmentRequests as $request)
                            <tr class="hover:bg-white/30 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $request->project->name }}</div>
                                    <div class="text-sm text-gray-600">{{ Str::limit($request->project->description, 50) }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $request->guest->name }}</div>
                                    <div class="text-sm text-gray-600">{{ $request->guest->email }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $request->project->stage }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $request->project->document_type->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $request->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                        {{ ucfirst($request->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $request->created_at->format('d M Y H:i') }}
                                </td>
                                <td class="px-6 py-4 text-right text-sm font-medium">
                                    <a href="{{ route('dashboard.user.assessment-requests.show', $request->id) }}" class="text-indigo-600 hover:text-indigo-900 flex items-center justify-end space-x-1">
                                        <i class="fas fa-eye"></i>
                                        <span>Detail</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    Tidak ada pengajuan penilaian saat ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $assessmentRequests->links() }}
            </div>
        </div>
    </main>

    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('collapsed');
            document.querySelector('.main-content').classList.toggle('ml-0');
        });

        function filterStatus(status) {
            const url = new URL(window.location.href);
            url.searchParams.set('status', status);
            window.location.href = url.toString();
        }
    </script>
</body>
</html>