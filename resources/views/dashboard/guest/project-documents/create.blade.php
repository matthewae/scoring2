<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Dokumen Project</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .glass-morphism {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #10B981, #0EA5E9, #6366F1);
        }
        .hover-scale {
            transition: transform 0.2s;
        }
        .hover-scale:hover {
            transform: scale(1.02);
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
<body class="gradient-bg min-h-screen">
    <!-- Sidebar -->
    <aside class="sidebar fixed top-0 left-0 h-full w-60 glass-morphism z-50 p-4">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Scoring App</h1>
            <button id="toggleSidebar" class="text-gray-900 hover:text-gray-700">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <nav class="space-y-4">
            <a href="{{ route('dashboard.guest.project-documents.history') }}" class="flex items-center text-gray-900 hover:bg-white hover:bg-opacity-10 p-3 rounded-lg transition-all duration-200">
                <i class="fas fa-history w-6"></i>
                <span>Riwayat Dokumen</span>
            </a>
            <a href="#" class="flex items-center text-gray-900 hover:bg-white hover:bg-opacity-10 p-3 rounded-lg transition-all duration-200">
                <i class="fas fa-file-upload w-6"></i>
                <span>Upload Dokumen</span>
            </a>
            <a href="#" class="flex items-center text-gray-900 hover:bg-white hover:bg-opacity-10 p-3 rounded-lg transition-all duration-200">
                <i class="fas fa-chart-bar w-6"></i>
                <span>Skor Project</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-content ml-60 transition-all duration-300">
        <div class="container px-4 py-8">
        <div class="glass-morphism rounded-xl p-8 max-w-4xl mx-auto shadow-lg hover-scale">
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
</body>
</html>