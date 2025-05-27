<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Dokumen Project</title>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            const toggleBtn = document.getElementById('toggleSidebar');

            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('ml-0');
                mainContent.classList.toggle('ml-60');
            });
        });
    </script>
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
                <a href="{{ route('dashboard.guest.project-documents.history') }}" class="nav-link flex items-center space-x-4 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 p-4 rounded-xl transition-all duration-300 group">
                    <i class="nav-icon fas fa-history text-lg text-indigo-600 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Riwayat Dokumen</span>
                </a>
                <a href="#" class="nav-link active flex items-center space-x-4 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 p-4 rounded-xl transition-all duration-300 group">
                    <i class="nav-icon fas fa-file-upload text-lg text-purple-600 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Upload Dokumen</span>
                </a>
                <a href="#" class="nav-link flex items-center space-x-4 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 p-4 rounded-xl transition-all duration-300 group">
                    <i class="nav-icon fas fa-chart-bar text-lg text-blue-600 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Skor Project</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                    @csrf
                    <button type="submit" class="nav-link w-full flex items-center space-x-4 text-red-600 hover:bg-red-50/50 p-4 rounded-xl transition-all duration-300 group">
                        <i class="nav-icon fas fa-sign-out-alt text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </nav>
    </aside>

    <!-- Main Content -->
    <main class="md:ml-64 p-8">
        <div class="container mx-auto">
        <div class="glass-effect rounded-2xl p-8 max-w-4xl mx-auto shadow-lg transform hover:scale-[1.01] transition-all duration-300">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Upload Dokumen Project</h1>
                <a href="{{ route('dashboard.guest.project-documents.history') }}" 
                    class="text-gray-900 hover:text-gray-700 transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali ke Riwayat
                </a>
            </div>

            @if($errors->any())
                <div class="bg-red-100 bg-opacity-90 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dashboard.guest.project-documents.store') }}" method="POST" 
                enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="space-y-6">
                    <div class="glass-morphism rounded-lg p-6">
                        <label for="project_id" class="block text-lg font-medium text-gray-900 mb-2">Pilih Project</label>
                        <select name="project_id" id="project_id" required
                                class="w-full px-4 py-3 bg-white bg-opacity-90 border border-gray-300 
                                        rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none 
                                        focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 transition-all duration-200">
                            <option value="" class="text-gray-900">Pilih Project</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" class="text-gray-900" 
                                        {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="glass-morphism rounded-lg p-6">
                        <label for="document_type_id" class="block text-lg font-medium text-gray-900 mb-2">Jenis Dokumen</label>
                        <select name="document_type_id" id="document_type_id" required
                                class="w-full px-4 py-3 bg-white bg-opacity-90 border border-gray-300 
                                        rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none 
                                        focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 transition-all duration-200">
                            <option value="" class="text-gray-900">Pilih Jenis Dokumen</option>
                            @foreach($documentTypes as $type)
                                <option value="{{ $type->id }}" class="text-gray-900" 
                                        {{ old('document_type_id') == $type->id ? 'selected' : '' }}>
                                    {{ $type->no }} - {{ $type->uraian }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="glass-morphism rounded-lg p-6">
                        <label for="file" class="block text-lg font-medium text-gray-900 mb-2">File Dokumen</label>
                        <input type="file" name="file" id="file" required
                                class="w-full px-4 py-3 bg-white bg-opacity-90 border border-gray-300 
                                        rounded-lg text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 
                                        file:text-gray-900 file:bg-white file:bg-opacity-90 hover:file:bg-opacity-100 
                                        transition-all duration-200"
                                accept=".pdf,.doc,.docx,.xls,.xlsx">
                        <p class="mt-2 text-sm text-gray-700 opacity-70">Format yang diperbolehkan: PDF, DOC, DOCX, XLS, XLSX (Max. 10MB)</p>
                    </div>

                    <div class="glass-morphism rounded-lg p-6">
                        <label for="sumber" class="block text-lg font-medium text-gray-900 mb-2">Sumber</label>
                        <input type="text" name="sumber" id="sumber" value="{{ old('sumber') }}"
                                class="w-full px-4 py-3 bg-white bg-opacity-90 border border-gray-300 
                                        rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none 
                                        focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 transition-all duration-200">
                    </div>

                    <div class="glass-morphism rounded-lg p-6">
                        <label for="catatan" class="block text-lg font-medium text-gray-900 mb-2">Catatan</label>
                        <textarea name="catatan" id="catatan" rows="4"
                                    class="w-full px-4 py-3 bg-white bg-opacity-90 border border-gray-300 
                                            rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none 
                                            focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 transition-all duration-200"
                        >{{ old('catatan') }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" 
                            class="px-8 py-3 bg-white bg-opacity-90 text-gray-900 rounded-lg hover:bg-opacity-100 
                                    transition-all duration-200 flex items-center space-x-2 hover-scale">
                        <i class="fas fa-upload"></i>
                        <span>Upload Dokumen</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
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