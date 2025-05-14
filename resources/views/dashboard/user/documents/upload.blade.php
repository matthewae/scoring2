<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Dokumen - Scoring App</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
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
        body {
            background: linear-gradient(135deg, #10B981 0%, #0EA5E9 50%, #6366F1 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body class="font-sans">
    <!-- Sidebar -->
    <aside class="sidebar fixed top-0 left-0 h-full w-60 glass-effect z-50 p-4">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold bg-gradient-to-r from-emerald-600 to-sky-600 text-transparent bg-clip-text">Scoring App</h1>
            <button id="toggleSidebar" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <nav class="space-y-4">
            <a href="{{ route('dashboard.user.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('dashboard.user.documents.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                <i class="fas fa-upload"></i>
                <span>Upload Dokumen</span>
            </a>
            <a href="{{ route('dashboard.user.assessment-requests.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                <i class="fas fa-tasks"></i>
                <span>Pengajuan Penilaian</span>
            </a>
            <a href="{{ route('dashboard.user.project-scores.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                <i class="fas fa-chart-bar"></i>
                <span>Hasil Penilaian</span>
            </a>
            <div class="mt-auto pt-8">
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 px-4 py-2 rounded-xl transition-all duration-300 glass-effect">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content ml-60 p-8">
        <div class="glass-effect rounded-2xl p-8 backdrop-blur-sm backdrop-filter">
            <h2 class="text-2xl font-bold mb-4 text-indigo-900">Upload Dokumen</h2>
            <p class="text-indigo-600 mb-6">Pilih jenis dokumen dan upload file sesuai dengan tahapan yang tersedia.</p>

            <form action="{{ route('dashboard.user.documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label for="tahapan" class="block text-sm font-medium text-indigo-700 mb-2">Tahapan</label>
                    <select id="tahapan" name="tahapan" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 bg-white/80 backdrop-blur-sm" required>
                        <option value="">Pilih Tahapan</option>
                        <option value="Pra-tender">Pra-tender</option>
                        <option value="Tender">Tender</option>
                        <option value="Persiapan">Persiapan Pelaksanaan Pekerjaan Konstruksi</option>
                        <option value="Pelaksanaan">Pelaksanaan Pekerjaan Konstruksi</option>
                        <option value="Penunjang">Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)</option>
                        <option value="Perubahan">Perubahan Kontrak (Addendum)</option>
                        <option value="Kontrak">Kontrak Kritis</option>
                        <option value="Pemutusan">Pemutusan Kontrak sampai dengan Penetapan Sanksi Daftar Hitam</option>
                    </select>
                </div>

                <div>
                    <label for="document_type_id" class="block text-sm font-medium text-indigo-700 mb-2">Tipe Dokumen</label>
                    <select name="document_type_id" id="document_type_id" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 bg-white/80 backdrop-blur-sm" required>
                        <option value="">Pilih Tipe Dokumen</option>
                        @foreach($documentTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="sub_document_type_id" class="block text-sm font-medium text-indigo-700 mb-2">Sub Tipe Dokumen (Opsional)</label>
                    <select name="sub_document_type_id" id="sub_document_type_id" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 bg-white/80 backdrop-blur-sm">
                        <option value="">Pilih Sub Tipe Dokumen</option>
                        @foreach($documentTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="file" class="block text-sm font-medium text-indigo-700 mb-2">File Dokumen</label>
                    <input type="file" name="file" id="file" class="w-full text-sm text-indigo-600
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0
                        file:text-sm file:font-semibold
                        file:bg-indigo-50 file:text-indigo-700
                        hover:file:bg-indigo-100
                        bg-white/80 backdrop-blur-sm
                        border border-indigo-200 rounded-lg
                    " required accept=".pdf,.doc,.docx,.xls,.xlsx">
                    <p class="mt-2 text-sm text-indigo-500">Format yang diizinkan: PDF, DOC, DOCX, XLS, XLSX (Max. 10MB)</p>
                </div>

                <div>
                    <label for="source" class="block text-sm font-medium text-indigo-700 mb-2">Sumber</label>
                    <input type="text" name="source" id="source" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 bg-white/80 backdrop-blur-sm" required>
                </div>

                <div>
                    <label for="notes" class="block text-sm font-medium text-indigo-700 mb-2">Catatan (Opsional)</label>
                    <textarea name="notes" id="notes" rows="3" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 bg-white/80 backdrop-blur-sm"></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white px-6 py-2.5 rounded-lg hover:from-indigo-700 hover:to-blue-700 transform hover:scale-105 transition-all duration-200 shadow-md hover:shadow-lg flex items-center space-x-2">
                        <i class="fas fa-upload"></i>
                        <span>Upload Dokumen</span>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('collapsed');
            document.querySelector('.main-content').classList.toggle('ml-0');
        });
    </script>
</body>
</html>