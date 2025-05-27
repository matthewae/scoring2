<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengajuan Dokumen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <style>
        .gradient-background {
            background: linear-gradient(135deg, #0ea5e9 0%, #8b5cf6 50%, #10b981 100%);
            transform: scale(0.98);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            color: white;
            box-shadow: 0 10px 30px rgba(14, 165, 233, 0.2);
        }
        .gradient-background:hover {
            transform: scale(0.99);
            box-shadow: 0 15px 35px rgba(139, 92, 246, 0.3);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 8px 32px rgba(14, 165, 233, 0.15);
        }
        .sidebar {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.9);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.05);
        }
        .sidebar .nav-link {
            position: relative;
            transition: all 0.3s ease;
            border-radius: 12px;
            margin: 4px 0;
        }
        .sidebar .nav-link:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: linear-gradient(to bottom, #4f46e5, #7c3aed);
            border-radius: 4px;
            opacity: 0;
            transition: all 0.3s ease;
        }
        .sidebar .nav-link:hover:before,
        .sidebar .nav-link.active:before {
            opacity: 1;
        }
        .sidebar .nav-link:hover {
            background: linear-gradient(to right, rgba(79, 70, 229, 0.1), transparent);
            transform: translateX(4px);
        }
        .sidebar .nav-link.active {
            background: linear-gradient(to right, rgba(124, 58, 237, 0.1), transparent);
            color: #4f46e5;
        }
        .table-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .table-container:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transform: translateY(-4px);
        }
        .table-row {
            transition: all 0.3s ease;
        }
        .table-row:hover {
            background: rgba(255, 255, 255, 0.95);
            transform: scale(1.01);
        }
        .status-badge {
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .status-badge:hover {
            transform: scale(1.05);
        }
        body {
            background: linear-gradient(135deg, #0ea5e9 0%, #8b5cf6 50%, #10b981 100%);
            min-height: 100vh;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 50;
            }
            .sidebar.active {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-sky-50 via-purple-50 to-emerald-50 min-h-screen">
    <!-- Particles Background -->
    <div id="particles-js" class="fixed inset-0 -z-10 opacity-50"></div>

    <!-- Sidebar Toggle Button (Mobile) -->
    <button id="sidebarToggle" class="fixed top-4 left-4 z-50 md:hidden bg-white p-2 rounded-lg shadow-lg">
        <i class="fas fa-bars text-gray-800"></i>
    </button>

    <!-- Sidebar -->
    <aside class="sidebar fixed top-0 left-0 h-full w-64 glass-effect z-40 transform md:translate-x-0 border-r border-white/20">
        <div class="p-8">
            <div class="flex items-center justify-center mb-10">
                <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">Scoring System</h1>
            </div>
            <nav class="space-y-5">
                <a href="{{ route('dashboard.guest.index') }}" class="nav-link flex items-center space-x-4 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 p-4 rounded-xl transition-all duration-300 group">
                    <i class="nav-icon fas fa-home text-lg text-indigo-600 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="{{ route('dashboard.guest.project-documents.create') }}" class="nav-link flex items-center space-x-4 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 p-4 rounded-xl transition-all duration-300 group">
                    <i class="nav-icon fas fa-file-upload text-lg text-purple-600 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Pengajuan Dokumen</span>
                </a>
                <a href="{{ route('dashboard.guest.project-scores.index') }}" class="nav-link flex items-center space-x-4 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 p-4 rounded-xl transition-all duration-300 group">
                    <i class="nav-icon fas fa-star text-lg text-blue-600 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Lihat Penilaian</span>
                </a>
                <a href="{{ route('dashboard.guest.project-documents.history') }}" class="nav-link active flex items-center space-x-4 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 p-4 rounded-xl transition-all duration-300 group">
                    <i class="nav-icon fas fa-history text-lg text-indigo-600 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Riwayat Pengajuan</span>
                </a>
                <a href="{{ route('dashboard.guest.guide') }}" class="nav-link flex items-center space-x-4 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 p-4 rounded-xl transition-all duration-300 group">
                    <i class="nav-icon fas fa-book text-lg text-violet-600 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Panduan</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                    @csrf
                    <button type="submit" class="nav-link w-full flex items-center space-x-4 text-red-600 hover:bg-red-50/50 p-4 rounded-xl transition-all duration-300 group">
                        <i class="nav-icon fas fa-sign-out-alt text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="md:ml-64 p-8">
        <!-- Header Card -->
        <div class="gradient-background rounded-2xl shadow-lg p-8 mb-8">
            <h1 class="text-4xl font-bold text-white mb-4 flex items-center">
                <i class="fas fa-history mr-4"></i>
                Riwayat Pengajuan Dokumen
            </h1>
            <p class="text-white/90 text-lg">Pantau status dan riwayat pengajuan dokumen Anda di sini.</p>
        </div>

        <!-- Table Container -->
        <div class="table-container p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Project</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jenis Dokumen</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal Pengajuan</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($projectDocuments as $document)
                            <tr class="table-row">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $document->project ? $document->project->name : 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ $document->document_type ? $document->document_type->name : 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ $document->created_at->format('d M Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @switch($document->status)
                                        @case('pending')
                                            <span class="status-badge bg-yellow-100 text-yellow-800">
                                                <i class="fas fa-clock"></i>
                                                <span>Pending</span>
                                            </span>
                                            @break
                                        @case('approved')
                                            <span class="status-badge bg-green-100 text-green-800">
                                                <i class="fas fa-check"></i>
                                                <span>Disetujui</span>
                                            </span>
                                            @break
                                        @case('rejected')
                                            <span class="status-badge bg-red-100 text-red-800">
                                                <i class="fas fa-times"></i>
                                                <span>Ditolak</span>
                                            </span>
                                            @break
                                    @endswitch
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ route('dashboard.guest.project-documents.show', $document->id) }}" 
                                        class="inline-flex items-center space-x-2 text-indigo-600 hover:text-indigo-900 transition-colors duration-200">
                                        <i class="fas fa-eye"></i>
                                        <span>Detail</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <i class="fas fa-folder-open text-6xl text-gray-400"></i>
                                        <p class="text-gray-500 text-lg">Belum ada dokumen yang diajukan</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($projectDocuments->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $projectDocuments->links() }}
                </div>
            @endif
        </div>
    </main>

    <script>
        // Initialize Particles.js
        particlesJS('particles-js', {
            particles: {
                number: { value: 100, density: { enable: true, value_area: 1000 } },
                color: { value: ['#4f46e5', '#7c3aed', '#3b82f6'] },
                shape: { type: ['circle', 'triangle', 'polygon'] },
                opacity: { value: 0.3, random: true, anim: { enable: true, speed: 0.5, opacity_min: 0.1, sync: false } },
                size: { value: 3, random: true, anim: { enable: true, speed: 2, size_min: 0.1, sync: false } },
                line_linked: { enable: true, distance: 150, color: '#4f46e5', opacity: 0.2, width: 1 },
                move: { enable: true, speed: 2, direction: 'none', random: true, straight: false, out_mode: 'out', bounce: false, attract: { enable: true, rotateX: 600, rotateY: 1200 } }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { onhover: { enable: true, mode: 'bubble' }, onclick: { enable: true, mode: 'push' }, resize: true },
                modes: { bubble: { distance: 200, size: 3.5, duration: 2, opacity: 0.6 }, push: { particles_nb: 6 } }
            },
            retina_detect: true
        });

        // Sidebar Toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>