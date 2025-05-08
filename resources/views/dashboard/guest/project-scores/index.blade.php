<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Project - Scoring System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <style>
        .gradient-background {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            transform: scale(0.98);
            transition: all 0.3s ease;
            color: white;
        }
        .gradient-background:hover {
            transform: scale(0.99);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);
            transform: scale(0.98);
            transition: all 0.4s ease;
        }
        .glass-effect:hover {
            transform: scale(1);
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.25);
        }
        .project-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }
        select {
            transition: all 0.3s ease;
            border-radius: 0.75rem;
            border: 2px solid rgba(99, 102, 241, 0.1);
            padding: 0.75rem 1rem;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        select:hover {
            border-color: rgba(99, 102, 241, 0.3);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        select:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
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
        <!-- Page Header -->
        <div class="gradient-background rounded-2xl shadow-lg p-8 mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Daftar Project</h1>
            <p class="text-gray-600 text-lg">Pilih project untuk melihat detail penilaian</p>
        </div>

        <!-- Project Selection -->
        <div class="glass-effect rounded-2xl p-6 max-w-2xl mx-auto mb-8">
            <form action="{{ route('dashboard.guest.project-scores.show', '') }}" method="GET" class="space-y-4" id="projectForm">
                <div class="flex flex-col space-y-2">
                    <label for="project" class="text-gray-700 font-medium">Pilih Project:</label>
                    <select name="project" id="project" class="form-select rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                        <option value="">-- Pilih Project --</option>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}" class="py-2">
                                {{ $project->name }} ({{ ucfirst($project->status) }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
                     @if(session('message'))
             <div class="glass-effect rounded-2xl p-4 mb-8 max-w-2xl mx-auto bg-green-50 text-green-800">
                 {{ session('message') }}
             </div>
         @endif
         @if($projects->isEmpty())
             <div class="glass-effect rounded-2xl p-6 max-w-2xl mx-auto text-center text-gray-600">
                 <i class="fas fa-folder-open text-4xl mb-4"></i>
                 <p>Belum ada project yang tersedia.</p>
             </div>
         @endif

         <!-- Instructions -->
         <div class="glass-effect rounded-2xl p-6 max-w-2xl mx-auto mt-8 bg-blue-50">
             <h3 class="text-lg font-semibold text-blue-800 mb-2">Petunjuk:</h3>
             <ul class="list-disc list-inside text-blue-700 space-y-2">
                 <li>Pilih project dari dropdown di atas untuk melihat detail penilaian</li>
                 <li>Status project akan ditampilkan di sebelah nama project</li>
                 <li>Setelah memilih project, Anda akan diarahkan ke halaman detail penilaian</li>
             </ul>
         </div>
    </main>

    <script>
        // Initialize Particles.js
        particlesJS('particles-js', {
            particles: {
                number: { value: 60, density: { enable: true, value_area: 1000 } },
                color: { value: ['#6366f1', '#a855f7', '#3b82f6'] },
                shape: { type: ['circle', 'triangle', 'polygon'], polygon: { nb_sides: 6 } },
                opacity: { value: 0.3, random: true, anim: { enable: true, speed: 0.8, opacity_min: 0.1, sync: false } },
                size: { value: 3, random: true, anim: { enable: true, speed: 2, size_min: 0.1, sync: false } },
                line_linked: { enable: true, distance: 150, color: '#6366f1', opacity: 0.2, width: 1.2 },
                move: { enable: true, speed: 1.8, direction: 'none', random: true, straight: false, out_mode: 'out', bounce: false, attract: { enable: true, rotateX: 800, rotateY: 1500 } }
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

        document.getElementById('project').addEventListener('change', function() {
            const projectId = this.value;
            if (projectId) {
                const form = document.getElementById('projectForm');
                form.action = form.action.replace(/\/$/, '') + '/' + projectId;
                form.submit();
            }
        });
    </script>
</body>
</html>