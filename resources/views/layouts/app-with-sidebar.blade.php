<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{ asset('js/sidebar.js') }}"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar Toggle Button -->
        <button id="sidebarToggle" class="fixed z-50 bottom-4 left-4 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100 focus:outline-none">
            <i class="fas fa-chevron-left"></i>
        </button>

        <!-- Sidebar -->
        <div class="bg-white w-64 shadow-lg fixed h-full transition-all duration-300 ease-in-out" id="sidebar">
            <div class="p-4 border-b border-gray-200 flex items-center">
                <div class="text-xl font-semibold text-gray-800">{{ config('app.name', '') }}</div>
            </div>
            <nav class="mt-4 overflow-hidden">
                @if(Auth::user()->status === 'guest')
                    <a href="{{ route('dashboard.guest.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                        <i class="fas fa-home mr-2"></i><span class="nav-text"> Dashboard</span>
                    </a>
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                        <i class="fas fa-file-alt mr-2"></i><span class="nav-text"> Dokumen</span>
                    </a>
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                        <i class="fas fa-history mr-2"></i><span class="nav-text"> Riwayat</span>
                    </a>
                @else
                    <a href="{{ route('dashboard.user.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                        <i class="fas fa-home mr-2"></i><span class="nav-text"> Dashboard</span>
                    </a>
                    <a href="{{ route('dashboard.user.projects.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                        <i class="fas fa-project-diagram mr-2"></i><span class="nav-text"> Project</span>
                    </a>
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                        <i class="fas fa-file-upload mr-2"></i><span class="nav-text"> Upload Dokumen</span>
                    </a>
                    <a href="{{ route('dashboard.user.assessment-requests.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                        <i class="fas fa-tasks mr-2"></i><span class="nav-text"> Pengajuan Penilaian</span>
                    </a>
                @endif
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Top Navigation -->
            <nav class="bg-white shadow-lg">
                <div class="max-w-6xl mx-auto px-4">
                    <div class="flex justify-end items-center py-4">
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-600">{{ Auth::user()->name }}</span>
                            <span class="px-2 py-1 bg-{{ Auth::user()->status === 'guest' ? 'blue' : 'green' }}-200 text-{{ Auth::user()->status === 'guest' ? 'blue' : 'green' }}-800 rounded-full text-xs capitalize">{{ Auth::user()->status }}</span>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="max-w-6xl mx-auto px-4 py-8">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar Toggle -->
    <script>
        const sidebar = document.getElementById('sidebar');
        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
        }
    </script>
</body>
</html>