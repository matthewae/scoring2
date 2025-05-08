<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penilaian Project - Scoring System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <style>
        .gradient-background {
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            transform: scale(0.98);
            transition: transform 0.3s ease;
        }
        .gradient-background:hover {
            transform: scale(0.99);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transform: scale(0.98);
            transition: all 0.3s ease;
        }
        .score-card {
            transition: all 0.3s ease;
        }
        .score-card:hover {
            transform: translateY(-2px);
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
                <a href="{{ route('dashboard.guest.index') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('dashboard.guest.project-documents.create') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-file-upload"></i>
                    <span>Pengajuan Dokumen</span>
                </a>
                <a href="{{ route('dashboard.guest.project-documents.history') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-history"></i>
                    <span>Riwayat Pengajuan</span>
                </a>
                <a href="{{ route('dashboard.guest.guide') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-book"></i>
                    <span>Panduan</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="md:ml-64 p-8">
        <!-- Back Button -->
        <a href="{{ route('dashboard.guest.project-scores.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-6 transition-colors duration-300">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali ke Daftar Project
        </a>

        <!-- Project Header -->
        <div class="gradient-background rounded-2xl shadow-lg p-8 mb-12">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $project->name }}</h1>
                    <p class="text-gray-600">{{ $project->description }}</p>
                </div>
                <span class="px-4 py-2 rounded-full text-sm {{ $project->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ ucfirst($project->status) }}
                </span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex items-center space-x-2 text-gray-600">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Dibuat: {{ $project->created_at->format('d M Y') }}</span>
                </div>
                <div class="flex items-center space-x-2 text-gray-600">
                    <i class="fas fa-clock"></i>
                    <span>Terakhir diupdate: {{ $project->updated_at->format('d M Y') }}</span>
                </div>
                <div class="flex items-center space-x-2 text-gray-600">
                    <i class="fas fa-file-alt"></i>
                    <span>{{ $project->project_documents_count }} Dokumen</span>
                </div>
            </div>
        </div>

        <!-- Document Scores -->
        <div class="space-y-8">
            @forelse($project->projectDocuments as $document)
                <div class="glass-effect score-card rounded-2xl p-6">
                    <div class="flex justify-between items-start mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="text-3xl text-blue-600">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">{{ $document->document_type->name }}</h3>
                                <p class="text-gray-500">{{ $document->file_name }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-2xl font-bold {{ $document->score >= 80 ? 'text-green-600' : ($document->score >= 60 ? 'text-yellow-600' : 'text-red-600') }}">
                                {{ $document->score ?? 'Belum dinilai' }}
                            </div>
                            <div class="text-sm text-gray-500">Skor</div>
                        </div>
                    </div>

                    @if($document->assessment_notes)
                        <div class="bg-gray-50 rounded-xl p-4 mb-4">
                            <h4 class="font-semibold text-gray-700 mb-2">Catatan Penilaian:</h4>
                            <p class="text-gray-600">{{ $document->assessment_notes }}</p>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-calendar-check"></i>
                            <span>Dinilai pada: {{ $document->assessed_at ? $document->assessed_at->format('d M Y') : 'Belum dinilai' }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-user"></i>
                            <span>Penilai: {{ $document->assessor ? $document->assessor->name : 'Belum ditentukan' }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <div class="text-6xl text-gray-400 mb-4">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Dokumen</h3>
                    <p class="text-gray-500">Project ini belum memiliki dokumen yang dinilai</p>
                </div>
            @endforelse
        </div>
    </main>

    <script>
        // Initialize Particles.js
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: ['#6B7280', '#9CA3AF', '#4B5563'] },
                shape: { type: ['circle', 'triangle'] },
                opacity: { value: 0.2, random: true, anim: { enable: true, speed: 0.5, opacity_min: 0.1, sync: false } },
                size: { value: 2, random: true, anim: { enable: true, speed: 2, size_min: 0.1, sync: false } },
                line_linked: { enable: true, distance: 150, color: '#6B7280', opacity: 0.15, width: 1 },
                move: { enable: true, speed: 1.5, direction: 'none', random: true, straight: false, out_mode: 'out', bounce: false, attract: { enable: true, rotateX: 600, rotateY: 1200 } }
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