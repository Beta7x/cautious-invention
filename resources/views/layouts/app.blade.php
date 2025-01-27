<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Decision Support System') }}</title>
    @vite('resources/css/app.css')
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow fixed w-full z-50">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    {{-- <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10"> --}}
                    <span class="text-4xl font-bold text-yellow-400">
                       Sipados
                    </span>
                </div>
                <nav class="flex space-x-4 items-center">
                    @auth
                        <!-- Avatar Dropdown -->
                        <div class="relative">
                            <button id="avatarButton" class="flex items-center focus:outline-none">
                                <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" alt="Avatar" class="h-10 w-10 rounded-full ring-2 ring-blue-500">
                            </button>
                            <ul id="avatarDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg overflow-hidden">
                                <li>
                                    <a href="{{ route('profile.show') }}" class="block w-full text-left px-3 py-2 flex items-center text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-user-circle ml-2"></i>
                                        <span class="ml-2">Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="block">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-3 py-2 flex items-center text-gray-700 hover:bg-gray-100">
                                            <i class="fas fa-sign-out-alt ml-2"></i>
                                            <span class="ml-2">Logout</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 transition duration-200">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-gray-600 hover:text-gray-900 transition duration-200">Register</a>
                        @endif
                    @endauth
                </nav>
            </div>
        </header>

        <!-- Sidebar and Main Content -->
        <div class="flex flex-1 pt-16">
            <!-- Sidebar -->
            <aside class="w-64 bg-[#4F46E5] fixed h-full pt-8">
                <nav class="px-4 py-4">
                    <ul>
                        <li class="mb-2">
                            <a href="{{ route('dashboard') }}" class="flex items-center text-white hover:bg-[#3c3abb] px-4 py-4 rounded transition duration-200">
                                <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('alternatif.index') }}" class="flex items-center text-white hover:bg-[#3c3abb] px-4 py-4 rounded transition duration-200">
                                <i class="fas fa-users mr-3"></i> Alternatif
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('kriteria.index') }}" class="flex items-center text-white hover:bg-[#3c3abb] px-4 py-4 rounded transition duration-200">
                                <i class="fas fa-list-ul mr-3"></i> Kriteria
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('alternatif_kriterias.index') }}" class="flex items-center text-white hover:bg-[#3c3abb] px-4 py-4 rounded transition duration-200">
                                <i class="fas fa-chart-bar mr-3"></i> Penilaian
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('saw.normalisasi') }}" class="flex items-center text-white hover:bg-[#3c3abb] px-4 py-4 rounded transition duration-200">
                                <i class="fas fa-calculator mr-3"></i> Perhitungan
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 bg-gray-100 p-6 ml-64 pt-16">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Script to handle the dropdown -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const avatarButton = document.getElementById('avatarButton');
            const avatarDropdown = document.getElementById('avatarDropdown');

            avatarButton.addEventListener('click', function(event) {
                event.stopPropagation();
                avatarDropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', function() {
                avatarDropdown.classList.add('hidden');
            });
        });
    </script>
</body>
</html>
