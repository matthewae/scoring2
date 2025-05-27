<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guest - Scoring System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <style>
        .gradient-background {
            background: linear-gradient(135deg, #1E3A8A 0%, #1E40AF 100%);
            transform: scale(0.98);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            color: white;
            box-shadow: 0 10px 30px rgba(30, 58, 138, 0.2);
        }
        .gradient-background:hover {
            transform: scale(0.99);
            box-shadow: 0 15px 35px rgba(30, 64, 175, 0.2);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(30, 58, 138, 0.1);
            box-shadow: 0 8px 32px rgba(30, 58, 138, 0.1);
            transform: scale(0.98);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
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
        .sidebar .nav-icon {
            transition: all 0.3s ease;
        }
        .sidebar .nav-link:hover .nav-icon {
            transform: scale(1.1) rotate(5deg);
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
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-slate-100 min-h-screen">
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
                <a href="#" class="nav-link active flex items-center space-x-4 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 p-4 rounded-xl transition-all duration-300 group">
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
                <a href="{{ route('dashboard.guest.project-documents.history') }}" class="nav-link flex items-center space-x-4 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 p-4 rounded-xl transition-all duration-300 group">
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
        <!-- Welcome Banner -->
        <div class="gradient-background rounded-2xl shadow-lg p-8 mb-12 transform hover:scale-[1.01] transition-all duration-300">
            <h1 class="text-4xl font-bold text-white mb-4">Selamat Datang di Dashboard Guest</h1>
            <p class="text-slate-100 text-lg leading-relaxed">Ajukan penilaian dokumen konstruksi Anda dan pantau prosesnya dengan mudah melalui sistem kami yang profesional.</p>
        </div>

        <!-- Video Tutorial Section -->
        <div class="glass-effect rounded-2xl p-8 mb-12 transform hover:scale-[1.01] transition-all duration-300 border border-blue-100/20">
            <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 text-transparent bg-clip-text mb-6 flex items-center">
                <i class="fas fa-play-circle text-blue-600 mr-3 animate-pulse"></i>
                Video Tutorial
            </h2>
            <div class="aspect-w-16 aspect-h-9 relative overflow-hidden rounded-2xl border border-slate-200">
                <iframe class="w-full h-96" src="https://www.youtube.com/embed/your-video-id" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <!-- Quick Actions Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Pengajuan Dokumen Card -->
            <div class="glass-effect rounded-2xl p-8 transform hover:scale-[1.02] transition-all duration-300 border border-indigo-100/20">
                <div class="text-4xl bg-gradient-to-br from-blue-500 to-indigo-600 text-transparent bg-clip-text mb-6">
                    <i class="fas fa-file-upload"></i>
                </div>
                <h3 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 text-transparent bg-clip-text mb-4">Pengajuan Dokumen</h3>
                <p class="text-gray-600 mb-6">Ajukan dokumen konstruksi Anda untuk dinilai oleh tim ahli kami.</p>
                <a href="{{ route('dashboard.guest.project-documents.create') }}" class="block text-center bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl">
                    Ajukan Sekarang
                </a>
            </div>

            <!-- Riwayat Pengajuan Card -->
            <div class="glass-effect rounded-2xl p-8 transform hover:scale-[1.02] transition-all duration-300 border border-purple-100/20">
                <div class="text-4xl bg-gradient-to-br from-purple-500 to-indigo-600 text-transparent bg-clip-text mb-6">
                    <i class="fas fa-history"></i>
                </div>
                <h3 class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-indigo-600 text-transparent bg-clip-text mb-4">Riwayat Pengajuan</h3>
                <p class="text-gray-600 mb-6">Pantau status dan riwayat pengajuan dokumen Anda.</p>
                <a href="{{ route('dashboard.guest.project-documents.history') }}" class="block text-center bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl">
                    Lihat Riwayat
                </a>
            </div>

            <!-- Panduan Card -->
            <div class="glass-effect rounded-2xl p-8 transform hover:scale-[1.02] transition-all duration-300 border border-violet-100/20">
                <div class="text-4xl text-violet-600 mb-6">
                    <i class="fas fa-book"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Panduan Penggunaan</h3>
                <p class="text-gray-600 mb-6">Pelajari cara menggunakan sistem scoring dokumen konstruksi.</p>
                <a href="{{ route('dashboard.guest.guide') }}" class="block text-center bg-gradient-to-r from-violet-600 to-purple-700 hover:from-violet-700 hover:to-purple-800 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-[1.02]">
                    <span class="text-white">Baca Panduan</span>
                </a>
            </div>
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