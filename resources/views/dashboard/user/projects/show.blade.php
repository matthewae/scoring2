<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detail Project - Scoring System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            background: linear-gradient(135deg, #0ea5e9 0%, #8b5cf6 50%, #10b981 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }
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
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 8px 32px rgba(14, 165, 233, 0.15);
            transform: scale(0.98);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 1rem;
        }
        .glass-effect:hover {
            transform: scale(1);
            box-shadow: 0 12px 36px rgba(14, 165, 233, 0.2);
            background: rgba(255, 255, 255, 0.95);
        }
        .sidebar {
            transition: all 0.3s ease;
            width: 14rem;
            position: fixed;
            height: 100vh;
            z-index: 40;
        }
        .sidebar.collapsed {
            transform: translateX(-100%);
        }
        .main-content {
            transition: margin-left 0.3s ease;
            margin-left: 14rem;
        }
        .main-content.expanded {
            margin-left: 0;
        }
        #sidebarToggle {
            transition: all 0.3s ease;
        }
        #sidebarToggle.active {
            transform: rotate(180deg);
        }
        .swiper-container {
            padding: 10px 50px;
            margin: 0;
            overflow: visible;
        }
        .swiper-slide {
            width: auto;
            transition: all 0.3s ease;
            padding: 0 5px;
        }
        .swiper-button-next,
        .swiper-button-prev {
            color: #4B5563;
            background: rgba(255, 255, 255, 0.95);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 1.2rem;
        }
        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: rgba(255, 255, 255, 1);
            color: #1F2937;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Particles Background -->
    <div id="particles-js" class="fixed inset-0 -z-10 opacity-50"></div>

    <!-- Sidebar Toggle Button -->
    <button id="sidebarToggle" class="fixed top-4 left-4 z-50 bg-white p-2 rounded-lg shadow-lg hover:bg-gray-50 transition-all duration-300">
        <i class="fas fa-chevron-left text-gray-800"></i>
    </button>

    <!-- Sidebar -->
    <aside class="sidebar glass-effect">
        <div class="p-6">
            <div class="flex items-center justify-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Scoring System</h1>
            </div>
            <nav class="space-y-4">
                <a href="{{ route('dashboard.user.index') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('dashboard.user.projects.index') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-project-diagram"></i>
                    <span>Project</span>
                </a>
                <a href="{{ route('dashboard.user.assessment-requests.index') }}" class="flex items-center space-x-3 text-gray-800 hover:bg-gray-100 p-3 rounded-lg transition-all duration-300">
                    <i class="fas fa-tasks"></i>
                    <span>Pengajuan Penilaian</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content p-8">
        <div class="glass-effect p-8 mb-8">
            <!-- Project Details -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Detail Project</h2>
                    <a href="{{ route('dashboard.user.projects.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="glass-effect p-6 hover:shadow-lg">
                        <h3 class="text-lg font-semibold mb-4">{{ $project->name }}</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-600">Status</p>
                                <p class="font-semibold text-gray-800">{{ ucfirst($project->status) }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Lokasi</p>
                                <p class="font-semibold text-gray-800">{{ $project->location }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Estimasi Biaya</p>
                                <p class="font-semibold text-gray-800">Rp {{ number_format($project->contract_value, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="glass-effect p-6 hover:shadow-lg">
                        <h3 class="text-lg font-semibold mb-4">Informasi Waktu</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-600">Tanggal SPMK</p>
                                <p class="font-semibold text-gray-800">{{ $project->spmk_date ? $project->spmk_date->format('d M Y') : '-' }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Jangka Waktu</p>
                                <p class="font-semibold text-gray-800">{{ $project->duration_days }} hari</p>
                            </div>
                        </div>
                    </div>

                    <div class="glass-effect p-6 hover:shadow-lg">
                        <h3 class="text-lg font-semibold mb-4">Pihak Terkait</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-600">Kementerian/Lembaga</p>
                                <p class="font-semibold text-gray-800">{{ $project->ministry_institution }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Konsultan Perencana</p>
                                <p class="font-semibold text-gray-800">{{ $project->planning_consultant }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Konsultan MK</p>
                                <p class="font-semibold text-gray-800">{{ $project->mk_consultant }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if($project->description)
                <div class="glass-effect rounded-lg p-6 mt-6">
                    <h3 class="text-lg font-semibold mb-4">Deskripsi Project</h3>
                    <p class="text-gray-800">{{ $project->description }}</p>
                </div>
                @endif

                <!-- Project Documents -->
                <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Document Status Overview -->
                    <div class="lg:col-span-2">
                        <div class="flex flex-col space-y-4 mb-6">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-semibold">Dokumen Project</h3>
                                <a href="{{ route('dashboard.user.project-documents.create', ['project' => $project->id]) }}" 
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                                    <i class="fas fa-plus mr-2"></i>
                                    Upload Dokumen
                                </a>
                            </div>
                            
                            <!-- Search and Filter -->
                            <div class="flex gap-4">
                                <div class="flex-1">
                                    <input type="text" id="documentSearch" placeholder="Cari dokumen..." 
                                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <select id="tahapanFilter" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="">Semua Tahapan</option>
                                    @foreach($documentTypes->keys() as $tahapan)
                                        <option value="{{ $tahapan }}">{{ $tahapan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @php
                            $uploadedDocs = $project->projectDocuments->pluck('document_type_code')->toArray();
                        @endphp

                        <!-- Tahapan Navigation -->
                        <div class="overflow-x-auto mb-8 glass-effect p-4 rounded-xl">
                            <div class="flex space-x-4 min-w-max">
                                @foreach($documentTypes->keys() as $tahapan)
                                    <button 
                                        onclick="showTahapan('{{ $tahapan }}')"
                                        class="tahapan-tab px-6 py-4 rounded-xl font-semibold transition-all duration-300 bg-gray-100 text-gray-600 hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                                        data-tahapan="{{ $tahapan }}"
                                    >
                                        {{ $tahapan }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- Document Cards Container -->
                        <div id="documentCardsContainer" class="space-y-6">
                            @foreach($documentTypes as $tahapan => $types)
                                <div id="tahapan-{{ Str::slug($tahapan) }}" class="tahapan-content {{ $loop->first ? '' : 'hidden' }}">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4" id="document-grid-{{ Str::slug($tahapan) }}">
                                        @foreach($types as $type)
                                            @php
                                                $document = $project->projectDocuments->where('document_type_code', $type->code)->first();
                                                $statusClass = !$document ? 'bg-gray-100 text-gray-800' :
                                                    ($document->status === 'approved' ? 'bg-green-100 text-green-800' :
                                                    ($document->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800'));
                                            @endphp

                                            <div class="document-card glass-effect p-6 rounded-xl transition-all duration-300 hover:shadow-lg" 
                                                 data-tahapan="{{ $tahapan }}" 
                                                 data-search="{{ strtolower($type->code . ' ' . $type->uraian) }}">
                                                <div class="flex justify-between items-start mb-4">
                                                    <div>
                                                        <span class="text-sm font-mono text-gray-500">{{ $type->code }}</span>
                                                        <h5 class="font-medium text-gray-800 mt-1">{{ $type->uraian }}</h5>
                                                    </div>
                                                    <span class="px-3 py-1 rounded-full text-sm font-medium {{ $statusClass }}">
                                                        {{ $document ? ucfirst($document->status) : 'Belum Upload' }}
                                                    </span>
                                                </div>

                                                @if($document)
                                                    <div class="text-sm text-gray-600 mb-4">
                                                        Diupload: {{ $document->created_at->format('d M Y') }}
                                                    </div>

                                                    @if($document->score !== null)
                                                        <div class="mb-4">
                                                            <div class="flex justify-between items-center mb-2">
                                                                <span class="text-sm text-gray-700">Skor Penilaian</span>
                                                                <span class="text-sm font-medium text-gray-800">{{ number_format($document->score, 1) }}/100</span>
                                                            </div>
                                                            <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                                                                <div class="h-full bg-blue-500 rounded-full" style="width: {{ $document->score }}%"></div>
                                                            </div>
                                                        </div>

                                                        @if($document->remarks)
                                                            <p class="text-sm text-gray-600 mb-4">{{ $document->remarks }}</p>
                                                        @endif
                                                    @endif

                                                    @if($document->file_path)
                                                        <a href="{{ asset($document->file_path) }}" target="_blank" 
                                                            class="inline-flex items-center text-blue-600 hover:text-blue-800">
                                                            <i class="fas fa-download mr-2"></i>
                                                            Download Dokumen
                                                        </a>
                                                    @endif
                                                @else
                                                    <p class="text-sm text-gray-500 italic">Belum ada dokumen yang diupload</p>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination Controls -->
                        <div class="flex justify-between items-center mt-6">
                            <button id="prevPage" class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800 disabled:opacity-50">
                                <i class="fas fa-chevron-left mr-2"></i>Sebelumnya
                            </button>
                            <span id="pageInfo" class="text-sm text-gray-600"></span>
                            <button id="nextPage" class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800 disabled:opacity-50">
                                Selanjutnya<i class="fas fa-chevron-right ml-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Document Statistics -->
                    <div class="glass-effect p-6 hover:shadow-lg">
                        <h3 class="text-lg font-semibold mb-6">Statistik Dokumen</h3>
                        
                        @php
                            $stats = [];
                            foreach($documentTypes as $tahapan => $types) {
                                $total = $types->count();
                                $uploaded = $project->projectDocuments
                                    ->whereIn('document_type_code', $types->pluck('code'))
                                    ->count();
                                $stats[$tahapan] = [
                                    'total' => $total,
                                    'uploaded' => $uploaded,
                                    'percentage' => $total > 0 ? round(($uploaded / $total) * 100) : 0
                                ];
                            }
                        @endphp

                        <div class="mb-8">
                            <canvas id="documentPieChart"></canvas>
                        </div>

                        <div class="space-y-4">
                            @foreach($stats as $tahapan => $stat)
                                <div class="p-4 bg-white rounded-lg">
                                    <div class="flex justify-between items-center mb-2">
                                        <h6 class="font-medium text-gray-800">{{ $tahapan }}</h6>
                                        <span class="text-sm font-medium">{{ $stat['percentage'] }}%</span>
                                    </div>
                                    <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-full bg-blue-500 rounded-full" style="width: {{ $stat['percentage'] }}%"></div>
                                    </div>
                                    <p class="text-sm text-gray-600 mt-2">
                                        {{ $stat['uploaded'] }} dari {{ $stat['total'] }} dokumen
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Document Statistics Chart
            const ctx = document.getElementById('documentPieChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: @json(array_keys($stats)),
                    datasets: [{
                        data: @json(array_column($stats, 'percentage')),
                        backgroundColor: [
                            '#3B82F6',
                            '#10B981',
                            '#F59E0B',
                            '#EF4444',
                            '#8B5CF6'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                font: {
                                    size: 12
                                }
                            }
                        }
                    },
                    cutout: '70%'
                }
            });

        // Pagination Configuration
        // Pagination Configuration
        const itemsPerPage = 6;
        let currentPage = 1;
        let currentTahapan = '';

        // Search and Filter Functionality
        const documentSearch = document.getElementById('documentSearch');
        const tahapanFilter = document.getElementById('tahapanFilter');
        const documentCards = document.querySelectorAll('.document-card');

        function filterDocuments() {
            const searchTerm = documentSearch.value.toLowerCase();
            const selectedTahapan = tahapanFilter.value;

            documentCards.forEach(card => {
                const cardText = card.dataset.search;
                const cardTahapan = card.dataset.tahapan;
                const matchesSearch = cardText.includes(searchTerm);
                const matchesTahapan = !selectedTahapan || cardTahapan === selectedTahapan;

                card.style.display = matchesSearch && matchesTahapan ? 'block' : 'none';
            });
        }

        documentSearch.addEventListener('input', filterDocuments);
        tahapanFilter.addEventListener('change', filterDocuments);

                function showTahapan(tahapan) {
            const tahapanSlug = tahapan.toLowerCase().replace(/\s+/g, '-');
            const selectedContent = document.getElementById(`tahapan-${tahapanSlug}`);
            
            if (!selectedContent) return;

            // Hide all tahapan content with fade out
            document.querySelectorAll('.tahapan-content').forEach(content => {
                content.style.opacity = '0';
                setTimeout(() => {
                    content.classList.add('hidden');
                }, 300);
            });

            // Show selected tahapan with fade in
            setTimeout(() => {
                selectedContent.classList.remove('hidden');
                setTimeout(() => {
                    selectedContent.style.opacity = '1';
                }, 50);
            }, 300);

            currentTahapan = tahapan;
            currentPage = 1;
            updatePagination();

            // Update active state of tahapan tabs
            document.querySelectorAll('.tahapan-tab').forEach(tab => {
                if (tab.dataset.tahapan === tahapan) {
                    tab.classList.add('bg-blue-500', 'text-white');
                    tab.classList.remove('bg-gray-100', 'text-gray-600');
                } else {
                    tab.classList.remove('bg-blue-500', 'text-white');
                    tab.classList.add('bg-gray-100', 'text-gray-600');
                }
            });
        }

        function updatePagination() {
            if (!currentTahapan) return;

            const tahapanId = currentTahapan.toLowerCase().replace(/\s+/g, '-');
            const documentGrid = document.getElementById(`document-grid-${tahapanId}`);
            const documentCards = documentGrid.querySelectorAll('.document-card');
            const totalPages = Math.ceil(documentCards.length / itemsPerPage);

            // Update page info
            document.getElementById('pageInfo').textContent = `Halaman ${currentPage} dari ${totalPages}`;

            // Show/hide documents based on current page
            documentCards.forEach((card, index) => {
                const shouldShow = index >= (currentPage - 1) * itemsPerPage && index < currentPage * itemsPerPage;
                card.classList.toggle('hidden', !shouldShow);
            });

            // Update navigation buttons
            document.getElementById('prevPage').disabled = currentPage === 1;
            document.getElementById('nextPage').disabled = currentPage === totalPages;

            // Scroll to top of the document grid
            documentGrid.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        // Event listeners for pagination controls
        document.getElementById('prevPage').addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                updatePagination();
            }
        });

        document.getElementById('nextPage').addEventListener('click', () => {
            const tahapanId = currentTahapan.toLowerCase().replace(/\s+/g, '-');
            const documentGrid = document.getElementById(`document-grid-${tahapanId}`);
            const totalPages = Math.ceil(documentGrid.querySelectorAll('.document-card').length / itemsPerPage);

            if (currentPage < totalPages) {
                currentPage++;
                updatePagination();
            }
        });

        // Show first tahapan by default
        const firstTahapanTab = document.querySelector('.tahapan-tab');
        if (firstTahapanTab) {
            showTahapan(firstTahapanTab.dataset.tahapan);
        }

        // Initialize Swiper
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 'auto',
            spaceBetween: 16,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                1024: { slidesPerView: 4 }
            }
        });

        // Document Management
        const documentsPerPage = 12;
        let currentPage = 1;
        let filteredDocuments = [];

        // Show/Hide Tahapan Content
        function showTahapan(tahapan) {
            document.querySelectorAll('.tahapan-content').forEach(content => {
                content.classList.add('hidden');
            });
            document.querySelectorAll('.tahapan-tab').forEach(tab => {
                tab.classList.remove('bg-blue-500', 'text-white');
                tab.classList.add('bg-gray-100', 'text-gray-600');
            });

            const selectedContent = document.getElementById('tahapan-' + tahapan.toLowerCase().replace(/ /g, '-'));
            const selectedTab = document.querySelector(`[data-tahapan="${tahapan}"]`);

            if (selectedContent) selectedContent.classList.remove('hidden');
            if (selectedTab) {
                selectedTab.classList.remove('bg-gray-100', 'text-gray-600');
                selectedTab.classList.add('bg-blue-500', 'text-white');
            }

            filterAndDisplayDocuments();
        }

        // Filter and Search Documents
        function filterAndDisplayDocuments() {
            const searchTerm = document.getElementById('documentSearch').value.toLowerCase();
            const selectedTahapan = document.getElementById('tahapanFilter').value;
            
            filteredDocuments = Array.from(document.querySelectorAll('.document-card')).filter(card => {
                const matchesSearch = card.dataset.search.includes(searchTerm);
                const matchesTahapan = !selectedTahapan || card.dataset.tahapan === selectedTahapan;
                return matchesSearch && matchesTahapan;
            });

            updatePagination();
            displayCurrentPage();
        }

        // Pagination Functions
        function updatePagination() {
            const totalPages = Math.ceil(filteredDocuments.length / documentsPerPage);
            currentPage = Math.min(currentPage, totalPages);
            
            document.getElementById('prevPage').disabled = currentPage === 1;
            document.getElementById('nextPage').disabled = currentPage === totalPages;
            document.getElementById('pageInfo').textContent = 
                `Halaman ${currentPage} dari ${totalPages || 1}`;
        }

        function displayCurrentPage() {
            const start = (currentPage - 1) * documentsPerPage;
            const end = start + documentsPerPage;
            
            filteredDocuments.forEach((card, index) => {
                card.classList.toggle('hidden', index < start || index >= end);
            });
        }

        // Event Listeners
        document.getElementById('documentSearch').addEventListener('input', filterAndDisplayDocuments);
        document.getElementById('tahapanFilter').addEventListener('change', filterAndDisplayDocuments);
        document.getElementById('prevPage').addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                displayCurrentPage();
                updatePagination();
            }
        });
        document.getElementById('nextPage').addEventListener('click', () => {
            const totalPages = Math.ceil(filteredDocuments.length / documentsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                displayCurrentPage();
                updatePagination();
            }
        });

        // Initialize first tahapan
        document.addEventListener('DOMContentLoaded', function() {
            const firstTahapan = document.querySelector('.tahapan-tab');
            if (firstTahapan) {
                showTahapan(firstTahapan.getAttribute('data-tahapan'));
            }
            filterAndDisplayDocuments();
        });

        // Initialize Particles.js
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: ['#0ea5e9', '#8b5cf6', '#10b981'] },
                shape: { type: ['circle', 'triangle', 'polygon'], polygon: { nb_sides: 6 } },
                opacity: { value: 0.4, random: true, anim: { enable: true, speed: 1, opacity_min: 0.1, sync: false } },
                size: { value: 4, random: true, anim: { enable: true, speed: 2, size_min: 0.1, sync: false } },
                line_linked: { enable: true, distance: 150, color: '#0ea5e9', opacity: 0.3, width: 1.5 },
                move: { enable: true, speed: 2, direction: 'none', random: true, straight: false, out_mode: 'out', bounce: false, attract: { enable: true, rotateX: 600, rotateY: 1200 } }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' }, resize: true },
                modes: { repulse: { distance: 150, duration: 0.4 }, push: { particles_nb: 4 } }
            },
            retina_detect: true
        });

        // Sidebar Toggle
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const toggleIcon = sidebarToggle.querySelector('i');

        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
            toggleIcon.classList.toggle('fa-rotate-180');
        });

        // Document search functionality
        const searchInput = document.getElementById('documentSearch');
        const tahapanFilter = document.getElementById('tahapanFilter');
        const documentCards = document.querySelectorAll('.document-card');

        function filterDocuments() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedTahapan = tahapanFilter.value;

            documentCards.forEach(card => {
                const cardTahapan = card.dataset.tahapan;
                const cardSearch = card.dataset.search;
                const matchesTahapan = !selectedTahapan || cardTahapan === selectedTahapan;
                const matchesSearch = cardSearch.includes(searchTerm);

                card.style.display = matchesTahapan && matchesSearch ? 'block' : 'none';
            });
        }

        searchInput.addEventListener('input', filterDocuments);
        tahapanFilter.addEventListener('change', filterDocuments);

        // Show first tahapan by default
        const firstTahapanTab = document.querySelector('.tahapan-tab');
        if (firstTahapanTab) {
            const firstTahapan = firstTahapanTab.dataset.tahapan;
            showTahapan(firstTahapan);
        }
    });

    function showTahapan(tahapan) {
        // Hide all tahapan contents
        document.querySelectorAll('.tahapan-content').forEach(content => {
            content.classList.add('hidden');
        });

        // Show selected tahapan content
        const selectedContent = document.getElementById('tahapan-' + tahapan.toLowerCase().replace(/ /g, '-'));
        if (selectedContent) {
            selectedContent.classList.remove('hidden');
        }

        // Update active state of tabs
        document.querySelectorAll('.tahapan-tab').forEach(tab => {
            if (tab.dataset.tahapan === tahapan) {
                tab.classList.add('bg-blue-500', 'text-white');
                tab.classList.remove('bg-gray-100', 'text-gray-600');
            } else {
                tab.classList.remove('bg-blue-500', 'text-white');
                tab.classList.add('bg-gray-100', 'text-gray-600');
            }
        });
    }
    </script>
</body>
</html>