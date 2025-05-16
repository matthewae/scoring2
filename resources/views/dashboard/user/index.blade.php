<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
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
        <!-- Welcome Section -->
        <div class="glass-effect rounded-2xl p-8 mb-8 transform hover:scale-[1.01] transition-all duration-300">
            <h2 class="text-3xl font-bold mb-4 bg-gradient-to-r from-emerald-600 to-sky-600 text-transparent bg-clip-text">Selamat Datang di Dashboard User</h2>
            <p class="text-gray-700 text-lg">Sebagai user, Anda memiliki akses untuk mengelola dan menilai dokumen konstruksi.</p>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Kelola Dokumen -->
            <div class="glass-effect rounded-2xl p-6 transform hover:scale-[1.02] transition-all duration-300">
                <div class="text-4xl bg-gradient-to-br from-emerald-500 to-sky-500 text-transparent bg-clip-text mb-6">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4 bg-gradient-to-r from-emerald-600 to-sky-600 text-transparent bg-clip-text">Kelola Dokumen</h3>
                <p class="text-gray-600 mb-6">Upload dan kelola dokumen konstruksi Anda dengan mudah.</p>
                <div class="space-y-3">
                    <a href="{{ route('dashboard.user.documents.index') }}" class="block text-center bg-gradient-to-r from-emerald-500 to-sky-500 text-white px-6 py-3 rounded-xl hover:from-emerald-600 hover:to-sky-600 transform hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-xl">
                        <i class="fas fa-upload mr-2"></i>Upload Dokumen
                    </a>
                    <a href="{{ route('dashboard.user.documents.index') }}" class="block text-center bg-gradient-to-r from-gray-500 to-gray-600 text-white px-6 py-3 rounded-xl hover:from-gray-600 hover:to-gray-700 transform hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-xl">
                        <i class="fas fa-list mr-2"></i>Daftar Dokumen
                    </a>
                </div>
            </div>

            <!-- Pengajuan Penilaian -->
            <div class="glass-effect rounded-2xl p-6 transform hover:scale-[1.02] transition-all duration-300">
                <div class="text-4xl bg-gradient-to-br from-sky-500 to-indigo-500 text-transparent bg-clip-text mb-6">
                    <i class="fas fa-tasks"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4 bg-gradient-to-r from-sky-600 to-indigo-600 text-transparent bg-clip-text">Pengajuan Penilaian</h3>
                <p class="text-gray-600 mb-6">Daftar pengajuan penilaian dari guest.</p>
                <div class="space-y-4">
                    @forelse($assessmentRequests as $request)
                        <div class="glass-effect rounded-xl p-5 space-y-3 hover:shadow-lg transition-shadow duration-300">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-medium text-gray-800">{{ $request->project->name }}</h4>
                                    <p class="text-sm text-gray-500">Oleh: {{ $request->guest->name }}</p>
                                </div>
                                <span class="px-3 py-1.5 text-xs font-medium rounded-full {{ $request->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }} shadow-sm">
                                    {{ ucfirst($request->status) }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-600">{{ $request->description }}</p>
                            <div class="flex justify-end">
                                <a href="{{ route('dashboard.user.assessment-requests.show', $request->id) }}" class="text-sky-600 hover:text-sky-800 text-sm font-medium hover:underline transition-colors duration-300">
                                    <i class="fas fa-eye mr-1"></i>Detail
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-4">Tidak ada pengajuan penilaian saat ini.</p>
                    @endforelse
                    <div class="text-center">
                        <a href="{{ route('dashboard.user.assessment-requests.index') }}" class="inline-block bg-gradient-to-r from-sky-500 to-indigo-500 text-white px-6 py-3 rounded-xl hover:from-sky-600 hover:to-indigo-600 transform hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-xl">
                            <i class="fas fa-list mr-2"></i>Lihat Semua Pengajuan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Statistik -->
            <div class="glass-effect rounded-2xl p-6 transform hover:scale-[1.02] transition-all duration-300">
                <div class="text-4xl bg-gradient-to-br from-indigo-500 to-purple-500 text-transparent bg-clip-text mb-6">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-transparent bg-clip-text">Statistik</h3>
                <p class="text-gray-600 mb-6">Ringkasan aktivitas penilaian dokumen.</p>
                <div class="space-y-4">
                    <div class="glass-effect rounded-xl p-4 hover:shadow-lg transition-shadow duration-300">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Total Dokumen</span>
                            <span class="font-semibold text-gray-800">0</span>
                        </div>
                    </div>
                    <div class="glass-effect rounded-xl p-4 hover:shadow-lg transition-shadow duration-300">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Pengajuan Pending</span>
                            <span class="font-semibold text-gray-800">{{ $assessmentRequests->where('status', 'pending')->count() }}</span>
                        </div>
                    </div>
                    <div class="glass-effect rounded-xl p-4 hover:shadow-lg transition-shadow duration-300">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Pengajuan Selesai</span>
                            <span class="font-semibold text-gray-800">{{ $assessmentRequests->where('status', 'completed')->count() }}</span>
                        </div>
                    </div>
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