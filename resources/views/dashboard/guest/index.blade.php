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
                <a href="#" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('dashboard.guest.project-documents.create') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-file-upload"></i>
                    <span>Pengajuan Dokumen</span>
                </a>
                <a href="{{ route('dashboard.guest.project-scores.index') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-star"></i>
                    <span>Lihat Penilaian</span>
                </a>
                <a href="{{ route('dashboard.guest.project-documents.history') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-history"></i>
                    <span>Riwayat Pengajuan</span>
                </a>
                <a href="{{ route('dashboard.guest.guide') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-book"></i>
                    <span>Panduan</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 text-red-600 hover:bg-red-50 p-3 rounded-lg transition-all duration-300">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="md:ml-64 p-8">
        <!-- Welcome Banner -->
        <div class="gradient-background rounded-2xl shadow-lg p-8 mb-12 transform hover:scale-[1.01] transition-all duration-300">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Selamat Datang di Dashboard Guest</h1>
            <p class="text-gray-600 text-lg">Ajukan penilaian dokumen konstruksi Anda dan pantau prosesnya dengan mudah.</p>
        </div>

        <!-- Video Tutorial Section -->
        <div class="glass-effect rounded-2xl p-8 mb-12 transform hover:scale-[1.01] transition-all duration-300">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <i class="fas fa-play-circle text-blue-600 mr-3"></i>
                Video Tutorial
            </h2>
            <div class="aspect-w-16 aspect-h-9">
                <iframe class="w-full h-96 rounded-xl shadow-lg" src="https://www.youtube.com/embed/your-video-id" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <!-- Quick Actions Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Pengajuan Dokumen Card -->
            <div class="glass-effect rounded-2xl p-8 transform hover:scale-[1.05] transition-all duration-300">
                <div class="text-4xl text-blue-600 mb-6">
                    <i class="fas fa-file-upload"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Pengajuan Dokumen</h3>
                <p class="text-gray-600 mb-6">Ajukan dokumen konstruksi Anda untuk dinilai oleh tim ahli kami.</p>
                <a href="{{ route('dashboard.guest.project-documents.create') }}" class="block text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition-colors duration-300">
                    Ajukan Sekarang
                </a>
            </div>

            <!-- Riwayat Pengajuan Card -->
            <div class="glass-effect rounded-2xl p-8 transform hover:scale-[1.05] transition-all duration-300">
                <div class="text-4xl text-green-600 mb-6">
                    <i class="fas fa-history"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Riwayat Pengajuan</h3>
                <p class="text-gray-600 mb-6">Pantau status dan riwayat pengajuan dokumen Anda.</p>
                <a href="{{ route('dashboard.guest.project-documents.history') }}" class="block text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-xl transition-colors duration-300">
                    Lihat Riwayat
                </a>
            </div>

            <!-- Panduan Card -->
            <div class="glass-effect rounded-2xl p-8 transform hover:scale-[1.05] transition-all duration-300">
                <div class="text-4xl text-purple-600 mb-6">
                    <i class="fas fa-book"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Panduan Penggunaan</h3>
                <p class="text-gray-600 mb-6">Pelajari cara menggunakan sistem scoring dokumen konstruksi.</p>
                <a href="{{ route('dashboard.guest.guide') }}" class="block text-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-xl transition-colors duration-300">
                    Baca Panduan
                </a>
            </div>
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