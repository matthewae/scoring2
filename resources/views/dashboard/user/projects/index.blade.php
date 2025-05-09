<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Project - Scoring System</title>
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
            transform: scale(0.98);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-effect:hover {
            transform: scale(1.01);
            box-shadow: 0 12px 40px rgba(14, 165, 233, 0.25);
        }
        .sidebar {
            transition: transform 0.3s ease;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Particles Background -->
    <div id="particles-js" class="fixed inset-0 -z-10 opacity-50"></div>

    <!-- Sidebar Toggle Button (Mobile) -->
    <button id="sidebarToggle" class="fixed top-4 left-4 z-50 md:hidden bg-white p-2 rounded-lg shadow-lg">
        <i class="fas fa-bars text-gray-800"></i>
    </button>

    <!-- Sidebar -->
    <aside class="sidebar fixed top-0 left-0 h-full w-56 glass-effect z-40 transform md:translate-x-0">
        <div class="p-6">
            <div class="flex items-center justify-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Scoring System</h1>
            </div>
            <nav class="space-y-4">
                <a href="{{ route('dashboard.user.index') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('dashboard.user.projects.index') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-project-diagram"></i>
                    <span>Project</span>
                </a>
                <a href="{{ route('dashboard.user.assessment-requests.index') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-tasks"></i>
                    <span>Pengajuan Penilaian</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="md:ml-64 p-8">
        <div class="glass-effect rounded-2xl p-8">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Manajemen Project</h2>
                <a href="{{ route('dashboard.user.projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                    <i class="fas fa-plus mr-2"></i>Buat Project Baru
                </a>
            </div>

            <!-- Search and Filter -->
            <div class="mb-6">
                <div class="flex gap-4">
                    <div class="flex-1">
                        <input type="text"
                            placeholder="Cari project..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="w-48">
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Semua Status</option>
                            <option value="active">Aktif</option>
                            <option value="completed">Selesai</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Projects Table -->
            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Project</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Dibuat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($projects as $project)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $project->name }}</div>
                                <div class="text-sm text-gray-500">{{ $project->description }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $project->status === 'active' ? 'bg-green-100 text-green-800' : 
                                           ($project->status === 'completed' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $project->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm font-medium">
                                <div class="flex space-x-3">
                                    <a href="{{ route('dashboard.user.projects.show', $project) }}" 
                                       class="text-blue-600 hover:text-blue-900 transition-colors duration-200" 
                                       title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('dashboard.user.projects.edit', $project) }}" 
                                       class="text-green-600 hover:text-green-900 transition-colors duration-200" 
                                       title="Edit Project">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('dashboard.user.projects.destroy', $project) }}" 
                                          method="POST" 
                                          class="inline" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus project ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900 transition-colors duration-200" 
                                                title="Hapus Project">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada project yang tersedia.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $projects->links() }}
            </div>
        </div>
    </main>

    <script>
        // Initialize Particles.js
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: ['#0ea5e9', '#8b5cf6', '#10b981'] },
                shape: { type: ['circle', 'triangle', 'polygon'], polygon: { nb_sides: 6 } },
                opacity: { value: 0.4, random: true, anim: { enable: true, speed: 1, opacity_min: 0.1, sync: false } },
                size: { value: 4, random: true, anim: { enable: true, speed: 2, size_min: 0.1, sync: false } },
                line_linked: { enable: true, distance: 150, color: '#0ea5e9', opacity: 0.3, width: 1.5 },
                move: { enable: true, speed: 2, direction: 'none', random: true, straight: false, out_mode: 'out', bounce: false, attract: { enable: true, rotateX: 600, rotateY: 1200 } }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' }, resize: true },
                modes: { repulse: { distance: 150, duration: 0.4 }, push: { particles_nb: 4 } }
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