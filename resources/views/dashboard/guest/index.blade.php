<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Dashboard - Scoring Dokumen Konstruksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 0;
        }
        .content-wrapper {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div id="particles-js"></div>
    <div class="content-wrapper flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg fixed h-full">
            <div class="p-4 border-b border-gray-200">
                <div class="text-xl font-semibold text-gray-800">Scoring Dokumen</div>
            </div>
            <nav class="mt-4">
                <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                    <i class="fas fa-home mr-2"></i> Dashboard
                </a>
                <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                    <i class="fas fa-file-alt mr-2"></i> Dokumen
                </a>
                <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                    <i class="fas fa-history mr-2"></i> Riwayat
                </a>
                <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                    <i class="fas fa-book mr-2"></i> Panduan
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <nav class="bg-white shadow-lg">
                <div class="max-w-6xl mx-auto px-4">
                    <div class="flex justify-end items-center py-4">
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-600">Welcome, {{ Auth::user()->username }}</span>
                            <span class="px-2 py-1 bg-yellow-200 text-yellow-800 rounded-full text-xs">Guest</span>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="max-w-7xl mx-auto px-6 py-8">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h2 class="text-2xl font-bold mb-4">Selamat Datang di Dashboard Guest</h2>
                    <p class="text-gray-600 mb-4">Sebagai guest, Anda memiliki akses terbatas untuk melihat dan menilai dokumen konstruksi.</p>
                </div>

                <!-- Video Tutorial Section -->
                <div class="bg-white rounded-lg shadow-md p-8 mb-6">
                    <h3 class="text-2xl font-semibold mb-6">Video Tutorial</h3>
                    <div class="aspect-w-16 aspect-h-9 w-full max-w-4xl mx-auto">
                        <iframe class="rounded-lg shadow-lg w-full h-[500px]" src="https://www.youtube.com/embed/your-video-id" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <p class="text-gray-600 mt-6 text-center text-lg">Tonton video tutorial ini untuk memahami cara menggunakan sistem penilaian dokumen konstruksi.</p>
                </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Daftar Dokumen -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4">Daftar Dokumen</h3>
                <p class="text-gray-600 mb-4">Lihat daftar dokumen konstruksi yang tersedia untuk dinilai.</p>
                <a href="#" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Lihat Dokumen</a>
            </div>

            <!-- Ajukan Penilaian -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4">Ajukan Penilaian</h3>
                <p class="text-gray-600 mb-4">Ajukan permintaan penilaian untuk dokumen konstruksi.</p>
                <form action="{{ route('guest.submit.assessment') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="project" class="block text-sm font-medium text-gray-700">Pilih Project</label>
                        <select id="project" name="project_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Pilih project yang akan dinilai</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Bantuan</label>
                        <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Jelaskan bantuan yang Anda butuhkan..."></textarea>
                    </div>
                    <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Ajukan Penilaian</button>
                </form>
            </div>

            <!-- Panduan Penilaian -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4">Panduan Penilaian</h3>
                <p class="text-gray-600 mb-4">Pelajari cara memberikan penilaian yang baik untuk dokumen konstruksi.</p>
                <a href="#" class="inline-block bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600">Baca Panduan</a>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
    <script>
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: '#4B5563' },
                shape: { type: 'circle' },
                opacity: { value: 0.5, random: false },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: '#4B5563', opacity: 0.4, width: 1 },
                move: { enable: true, speed: 2, direction: 'none', random: false, straight: false, out_mode: 'out', bounce: false }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' }, resize: true },
                modes: { repulse: { distance: 100, duration: 0.4 }, push: { particles_nb: 4 } }
            },
            retina_detect: true
        });
    </script>
</body>
</html>