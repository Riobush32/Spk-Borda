<x-theme.theme-main>
    <!-- Hero Section -->
    <section class="bg-green-600 text-white py-12">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-6 md:mb-0">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Selamat Datang di Website Desa Bandar Lama</h2>
                <p class="mb-6">Desa yang maju, mandiri, dan berbudaya.</p>
                <a href="{{ route('profil-desa') }}"
                    class="bg-yellow-400 text-green-800 px-6 py-2 rounded-lg font-semibold hover:bg-yellow-300">Lihat
                    Profil Desa</a>
            </div>
            <div class="md:w-1/2">
                <img src="{{ asset('image/desa.png') }}" alt="Desa Contoh" class="rounded-lg shadow-lg">
            </div>
        </div>
    </section>

    <!-- Quick Links -->
    {{-- <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center mb-8 text-green-800">Layanan Cepat</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="#" class="bg-green-100 p-4 rounded-lg text-center hover:bg-green-200 transition">
                    <div class="text-green-700 mb-2">
                        <svg class="w-10 h-10 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-semibold">Surat Pengantar</h3>
                </a>
                <a href="#" class="bg-green-100 p-4 rounded-lg text-center hover:bg-green-200 transition">
                    <div class="text-green-700 mb-2">
                        <svg class="w-10 h-10 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-semibold">Data Penduduk</h3>
                </a>
                <a href="#" class="bg-green-100 p-4 rounded-lg text-center hover:bg-green-200 transition">
                    <div class="text-green-700 mb-2">
                        <svg class="w-10 h-10 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-semibold">Agenda Desa</h3>
                </a>
                <a href="#" class="bg-green-100 p-4 rounded-lg text-center hover:bg-green-200 transition">
                    <div class="text-green-700 mb-2">
                        <svg class="w-10 h-10 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-semibold">Keuangan</h3>
                </a>
            </div>
        </div>
    </section> --}}

    <!-- Berita & Pengumuman -->
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center mb-8 text-green-800">Berita & Pengumuman Terkini</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Berita -->
                @foreach ($news as $berita)
                    <article
                        class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->title }}"
                                class="w-full h-48 object-cover">
                            <span
                                class="absolute top-2 left-2 bg-{{ $berita->kategori_berita->color }}-600 text-white text-xs px-2 py-1 rounded">
                                {{ $berita->kategori_berita->nama_kategori }}
                            </span>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center text-sm text-gray-500 mb-2">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                {{ $berita->created_at->format('d M Y') }} • Oleh: {{ $berita->author }}
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">{{ $berita->title }}</h3>
                            <div class="text-gray-600 mb-4 line-clamp-2">{!! Str::limit(strip_tags($berita->content), 150) !!}</div>
                            <a href="{{ route('artikel', ['id' => $berita->id]) }}"
                                class="text-green-600 font-medium hover:text-green-800">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="/berita" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">Lihat Semua
                    Berita</a>
            </div>
        </div>
    </section>
</x-theme.theme-main>
