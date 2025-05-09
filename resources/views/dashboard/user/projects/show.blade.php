<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Project - Scoring System</title>
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
            <!-- Project Details -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Detail Project</h2>
                    <a href="{{ route('dashboard.user.projects.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="glass-effect rounded-lg p-6">
                        <h3 class="text-lg font-semibold mb-4">{{ $project->name }}</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-600">Status</p>
                                <p class="font-semibold text-gray-800">{{ ucfirst($project->status) }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Lokasi</p>
                                <p class="font-semibold text-gray-800">{{ $project->location }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Estimasi Biaya</p>
                                <p class="font-semibold text-gray-800">Rp {{ number_format($project->contract_value, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="glass-effect rounded-lg p-6">
                        <h3 class="text-lg font-semibold mb-4">Informasi Waktu</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-600">Tanggal SPMK</p>
                                <p class="font-semibold text-gray-800">{{ $project->spmk_date ? $project->spmk_date->format('d M Y') : '-' }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Jangka Waktu</p>
                                <p class="font-semibold text-gray-800">{{ $project->duration_days }} hari</p>
                            </div>
                        </div>
                    </div>

                    <div class="glass-effect rounded-lg p-6">
                        <h3 class="text-lg font-semibold mb-4">Pihak Terkait</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-600">Kementerian/Lembaga</p>
                                <p class="font-semibold text-gray-800">{{ $project->ministry_institution }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Konsultan Perencana</p>
                                <p class="font-semibold text-gray-800">{{ $project->planning_consultant }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Konsultan MK</p>
                                <p class="font-semibold text-gray-800">{{ $project->mk_consultant }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if($project->description)
                <div class="glass-effect rounded-lg p-6 mt-6">
                    <h3 class="text-lg font-semibold mb-4">Deskripsi Project</h3>
                    <p class="text-gray-800">{{ $project->description }}</p>
                </div>
                @endif

                <!-- Project Documents -->
                <div class="mt-8">
                    <h3 class="text-xl font-semibold mb-6">Dokumen Project</h3>
                    @forelse($project->documents as $document)
                        <div class="glass-effect rounded-lg p-6 mb-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-semibold text-gray-800">{{ $document->document_type->name }}</h4>
                                    <p class="text-sm text-gray-600">Diupload: {{ $document->created_at->format('d M Y H:i') }}</p>
                                </div>
                                <span class="px-3 py-1 rounded-full text-sm font-medium
                                    {{ $document->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                       ($document->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($document->status) }}
                                </span>
                            </div>
                            @if($document->score)
                                <div class="mt-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Skor</span>
                                        <span class="font-semibold text-gray-800">{{ $document->score }}/100</span>
                                    </div>
                                    @if($document->feedback)
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-600">Feedback: {{ $document->feedback }}</p>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <p class="text-gray-500 italic mt-2">Belum ada penilaian</p>
                            @endif
                        </div>
                    @empty
                        <div class="text-center py-8 text-gray-500">
                            <i class="fas fa-folder-open text-4xl mb-4"></i>
                            <p>Belum ada dokumen yang diupload</p>
                        </div>
                    @endforelse
                </div>
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