<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Penggunaan - Scoring System</title>
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
        .glass-effect {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 8px 32px rgba(14, 165, 233, 0.15);
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
                <a href="{{ route('dashboard.guest.index') }}" class="flex items-center space-x-4 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 p-4 rounded-xl transition-all duration-300 group">
                    <i class="fas fa-home text-lg text-indigo-600 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="{{ route('dashboard.guest.project-documents.create') }}" class="flex items-center space-x-4 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 p-4 rounded-xl transition-all duration-300 group">
                    <i class="fas fa-file-upload text-lg text-purple-600 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Pengajuan Dokumen</span>
                </a>
                <a href="{{ route('dashboard.guest.project-scores.index') }}" class="flex items-center space-x-4 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 p-4 rounded-xl transition-all duration-300 group">
                    <i class="fas fa-star text-lg text-blue-600 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Lihat Penilaian</span>
                </a>
                <a href="{{ route('dashboard.guest.project-documents.history') }}" class="flex items-center space-x-4 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 p-4 rounded-xl transition-all duration-300 group">
                    <i class="fas fa-history text-lg text-indigo-600 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Riwayat Pengajuan</span>
                </a>
                <a href="{{ route('dashboard.guest.guide') }}" class="flex items-center space-x-4 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 p-4 rounded-xl transition-all duration-300 group">
                    <i class="fas fa-book text-lg text-violet-600 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Panduan</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-4 text-red-600 hover:bg-red-50/50 p-4 rounded-xl transition-all duration-300 group">
                        <i class="fas fa-sign-out-alt text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="md:ml-64 p-8">
        <div class="glass-effect rounded-2xl p-8">
    <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">Panduan Penggunaan Sistem</h2>
                <a href="{{ route('dashboard.guest.index') }}" class="text-gray-600 hover:text-gray-800 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
                </a>
            </div>

    <!-- Daftar Isi -->
    <div class="mb-8">
        <h3 class="text-lg font-semibold mb-4">Daftar Isi</h3>
        <ul class="space-y-2">
            <li>
                <a href="#pengajuan" class="text-blue-600 hover:text-blue-800">1. Cara Mengajukan Dokumen</a>
            </li>
            <li>
                <a href="#status" class="text-blue-600 hover:text-blue-800">2. Memantau Status Pengajuan</a>
            </li>
            <li>
                <a href="#penilaian" class="text-blue-600 hover:text-blue-800">3. Memahami Sistem Penilaian</a>
            </li>
        </ul>
    </div>

    <!-- Cara Mengajukan Dokumen -->
    <div id="pengajuan" class="mb-8">
        <h3 class="text-xl font-semibold mb-4">
            <i class="fas fa-file-upload text-blue-500 mr-2"></i>
            1. Cara Mengajukan Dokumen
        </h3>
        <div class="space-y-4">
            <p class="text-gray-700">Untuk mengajukan dokumen konstruksi, ikuti langkah-langkah berikut:</p>
            <ol class="list-decimal list-inside space-y-3 text-gray-700">
                <li>Klik tombol "Ajukan Dokumen" pada dashboard</li>
                <li>Pilih project yang akan diajukan</li>
                <li>Lengkapi informasi yang diperlukan pada form pengajuan</li>
                <li>Upload file dokumen konstruksi yang akan dinilai</li>
                <li>Periksa kembali semua informasi yang telah diisi</li>
                <li>Klik tombol "Submit" untuk mengirim pengajuan</li>
            </ol>
        </div>
    </div>

    <!-- Memantau Status Pengajuan -->
    <div id="status" class="mb-8">
        <h3 class="text-xl font-semibold mb-4">
            <i class="fas fa-history text-green-500 mr-2"></i>
            2. Memantau Status Pengajuan
        </h3>
        <div class="space-y-4">
            <p class="text-gray-700">Anda dapat memantau status pengajuan dokumen melalui:</p>
            <ul class="list-disc list-inside space-y-3 text-gray-700">
                <li>Menu "Riwayat Pengajuan" di dashboard</li>
                <li>Status pengajuan akan ditampilkan dengan indikator warna:
                    <div class="mt-2 space-y-2">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></span>
                            <span>Pending - Dokumen sedang dalam antrian review</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                            <span>In Review - Dokumen sedang dinilai</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                            <span>Completed - Penilaian telah selesai</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Memahami Sistem Penilaian -->
    <div id="penilaian" class="mb-8">
        <h3 class="text-xl font-semibold mb-4">
            <i class="fas fa-star text-yellow-500 mr-2"></i>
            3. Memahami Sistem Penilaian
        </h3>
        <div class="space-y-4">
            <p class="text-gray-700">Sistem penilaian dokumen konstruksi meliputi beberapa aspek:</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="font-semibold mb-2">Kelengkapan Dokumen</h4>
                    <p class="text-gray-600">Menilai kelengkapan dan kesesuaian dokumen dengan standar yang berlaku</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="font-semibold mb-2">Kualitas Teknis</h4>
                    <p class="text-gray-600">Evaluasi aspek teknis dan engineering dari dokumen konstruksi</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="font-semibold mb-2">Keamanan & Keselamatan</h4>
                    <p class="text-gray-600">Penilaian aspek keamanan dan keselamatan dalam desain</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="font-semibold mb-2">Efisiensi & Inovasi</h4>
                    <p class="text-gray-600">Evaluasi efisiensi dan inovasi dalam solusi konstruksi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bantuan Tambahan -->
    <div class="bg-blue-50 p-6 rounded-lg">
        <h3 class="text-lg font-semibold mb-4">Butuh Bantuan?</h3>
        <p class="text-gray-700 mb-4">Jika Anda memiliki pertanyaan lebih lanjut atau mengalami kesulitan, silakan hubungi tim support kami:</p>
        <div class="flex items-center space-x-4">
            <a href="mailto:support@scoring.com" class="flex items-center text-blue-600 hover:text-blue-800">
                <i class="fas fa-envelope mr-2"></i>
                support@scoring.com
            </a>
            <span class="text-gray-300">|</span>
            <a href="tel:+6281234567890" class="flex items-center text-blue-600 hover:text-blue-800">
                <i class="fas fa-phone mr-2"></i>
                +62 812-3456-7890
            </a>
        </div>
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