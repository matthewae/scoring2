<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Project Baru</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/create-project.js') }}"></script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px rgba(14, 165, 233, 0.15);
        }
        body {
            background: linear-gradient(135deg, #10B981 0%, #0EA5E9 50%, #6366F1 100%);
            min-height: 100vh;
        }
        .sidebar {
            transition: transform 0.3s ease;
        }
        .sidebar.collapsed {
            transform: translateX(-240px);
        }
        .main-content {
            transition: margin-left 0.3s ease;
        }
        .nav-link {
            transition: all 0.3s ease;
            @apply text-gray-700 hover:text-emerald-600;
        }
        .nav-link:hover {
            background: rgba(16, 185, 129, 0.1);
            transform: translateX(5px);
        }
        .form-input {
            @apply bg-white/10 border border-white/20 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500/50 text-white placeholder-white/50;
        }
        .btn-primary {
            @apply px-6 py-2 bg-emerald-500/20 text-white rounded-lg hover:bg-emerald-500/30 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 transition-colors;
        }
    </style>
</head>
<body class="font-sans">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="sidebar fixed top-0 left-0 h-full w-60 glass-effect z-50 p-4">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold bg-gradient-to-r from-emerald-600 to-sky-600 text-transparent bg-clip-text">Project Manager</h1>
                <button id="toggleSidebar" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            
            <nav class="space-y-2">
                <a href="{{ route('dashboard.user.projects.index') }}" class="nav-link flex items-center space-x-3 text-white p-3 rounded-lg">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('dashboard.user.projects.index') }}" class="nav-link flex items-center space-x-3 text-white p-3 rounded-lg">
                    <i class="fas fa-project-diagram"></i>
                    <span>Project</span>
                </a>
                <a href="{{ route('dashboard.user.assessment-requests.index') }}" class="nav-link flex items-center space-x-3 text-white p-3 rounded-lg">
                    <i class="fas fa-tasks"></i>
                    <span>Pengajuan Penilaian</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 w-full p-8">
            <div class="glass-effect rounded-2xl p-8 text-gray-700">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold">Buat Project Baru</h2>
                    <a href="{{ route('dashboard.user.projects.index') }}" class="flex items-center space-x-2 bg-white/20 px-4 py-2 rounded-lg hover:bg-white/30 transition-colors">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                </div>

                <form action="{{ route('dashboard.user.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="space-y-4">
                        <!-- Data Utama Project -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="glass-effect rounded-lg p-6">
                                <label for="name" class="block text-sm font-medium mb-2">Nama Pekerjaan</label>
                                <input type="text" name="name" id="name" 
                                        class="form-input w-full px-4 py-2" 
                                        value="{{ old('name') }}" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="glass-effect rounded-lg p-6">
                                <label for="location" class="block text-sm font-medium mb-2">Lokasi</label>
                                <input type="text" name="location" id="location" 
                                        class="form-input w-full px-4 py-2" 
                                        value="{{ old('location') }}" required>
                                @error('location')
                                    <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="glass-effect rounded-lg p-6">
                                <label for="ministry_institution" class="block text-sm font-medium mb-2">Kementerian/Lembaga/Perangkat Daerah/Institusi</label>
                                <input type="text" name="ministry_institution" id="ministry_institution" 
                                       class="form-input w-full px-4 py-2" 
                                       value="{{ old('ministry_institution') }}" required>
                                @error('ministry_institution')
                                    <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="glass-effect rounded-lg p-6">
                                <label for="planning_consultant" class="block text-sm font-medium mb-2">Konsultan Perencana</label>
                                <input type="text" name="planning_consultant" id="planning_consultant" 
                                       class="form-input w-full px-4 py-2" 
                                       value="{{ old('planning_consultant') }}" required>
                                @error('planning_consultant')
                                    <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="glass-effect rounded-lg p-6">
                                <label for="mk_consultant" class="block text-sm font-medium mb-2">Konsultan MK</label>
                                <input type="text" name="mk_consultant" id="mk_consultant" 
                                       class="form-input w-full px-4 py-2" 
                                       value="{{ old('mk_consultant') }}" required>
                                @error('mk_consultant')
                                    <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="glass-effect rounded-lg p-6">
                                <label for="contractor" class="block text-sm font-medium mb-2">Kontraktor Pelaksana</label>
                                <input type="text" name="contractor" id="contractor" 
                                       class="form-input w-full px-4 py-2" 
                                       value="{{ old('contractor') }}" required>
                                @error('contractor')
                                    <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="glass-effect rounded-lg p-6">
                                <label for="selection_method" class="block text-sm font-medium mb-2">Metode Pemilihan</label>
                                <select name="selection_method" id="selection_method" 
                                        class="form-input w-full px-4 py-2"
                                        required>
                                    <option value="">Pilih Metode</option>
                                    <option value="tender" {{ old('selection_method') === 'tender' ? 'selected' : '' }}>Tender</option>
                                    <option value="direct_appointment" {{ old('selection_method') === 'direct_appointment' ? 'selected' : '' }}>Penunjukan Langsung</option>
                                    <option value="direct_procurement" {{ old('selection_method') === 'direct_procurement' ? 'selected' : '' }}>Pengadaan Langsung</option>
                                </select>
                                @error('selection_method')
                                    <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="glass-effect rounded-lg p-6">
                                <label for="contract_value" class="block text-sm font-medium mb-2">Nilai Kontrak</label>
                                <input type="number" name="contract_value" id="contract_value" 
                                       class="form-input w-full px-4 py-2" 
                                       value="{{ old('contract_value') }}" required>
                                @error('contract_value')
                                    <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="glass-effect rounded-lg p-6">
                                <label for="spmk_date" class="block text-sm font-medium mb-2">Tanggal SPMK</label>
                                <input type="date" name="spmk_date" id="spmk_date" 
                                       class="form-input w-full px-4 py-2" 
                                       value="{{ old('spmk_date') }}" required>
                                @error('spmk_date')
                                    <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="glass-effect rounded-lg p-6">
                                <label for="duration_days" class="block text-sm font-medium mb-2">Jangka Waktu (Hari)</label>
                                <input type="number" name="duration_days" id="duration_days" 
                                       class="form-input w-full px-4 py-2" 
                                       value="{{ old('duration_days') }}" required>
                                @error('duration_days')
                                    <p class="mt-1 text-sm text-red-300">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn-primary">
                            Simpan Project
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>