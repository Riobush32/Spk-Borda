<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Resmi Desa BANDAR LAMA</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Google untuk tampilan lebih baik -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/lexical.css') }}">
    @livewireStyles
</head>

<body class="bg-gray-50">
    <!-- Header/Navbar -->
    <header class="bg-green-700 text-white shadow-md" x-data="{ open: false }">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo & Nama Desa -->
            <div class="flex items-center space-x-2">
                <img src="{{ asset('image/labura.png') }}" alt="Logo Desa" class="h-12">
                <div>
                    <h1 class="text-xl font-bold">DESA BANDAR LAMA</h1>
                    <p class="text-sm">Kecamatan Kualuh Selatan, Kabupaten Labuhanbatu Utara</p>
                </div>
            </div>
    
            <!-- Desktop Menu -->
            <nav class="hidden md:block">
                <ul class="flex space-x-6">
                    <li><a href="{{ route('home') }}" class="hover:text-yellow-300 font-medium">Beranda</a></li>
                    <li><a href="{{ route('profil-desa') }}" class="hover:text-yellow-300">Profil Desa</a></li>
                    <li><a href="{{ route('berita') }}" class="hover:text-yellow-300">Berita</a></li>
                    <li><a href="/admin" class="hover:text-yellow-300">Login</a></li>
                </ul>
            </nav>
    
            <!-- Mobile Menu Button -->
            <button @click="open = !open" class="md:hidden text-white focus:outline-none">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    
        <!-- Mobile Menu Dropdown -->
        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="md:hidden absolute top-16 left-0 right-0 bg-green-800 z-50 shadow-lg">
            <ul class="px-4 py-2 space-y-2">
                <li><a href="{{ route('home') }}" class="block py-2 px-4 hover:bg-green-700 rounded">Beranda</a></li>
                <li><a href="{{ route('profil-desa') }}" class="block py-2 px-4 hover:bg-green-700 rounded">Profil Desa</a></li>
                <li><a href="{{ route('berita') }}" class="block py-2 px-4 hover:bg-green-700 rounded">Berita</a></li>
                <li><a href="/admin" class="block py-2 px-4 hover:bg-green-700 rounded">Login</a></li>
            </ul>
        </div>
    </header>

    {{ $slot }}
    <!-- Footer -->
    <footer class="bg-green-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Desa Bandar Lama</h3>
                    <p>Jl. Lintas, Bandar Lama, Kec. Kualuh Sel., Kabupaten Labuhanbatu Utara, Sumatera Utara 21457</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Kontak Kami</h3>
                    <p>Email: info@desabandarlama.id<br>Telepon: (021) 123-4567<br>WhatsApp: 0812-3456-7890</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="/profil-desa" class="hover:text-yellow-300">Profil Desa</a></li>
                        <li><a href="/berita" class="hover:text-yellow-300">Berita & Pengumuman</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-green-700 mt-8 pt-6 text-center">
                <p>&copy; 2024 Desa Bandar Lama. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>
    @livewireScripts
</body>

</html>
