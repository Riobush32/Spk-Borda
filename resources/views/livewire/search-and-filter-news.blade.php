<div>
    <!-- Hero Section Berita -->
    <section class="bg-green-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Berita Terkini Desa Bandar Lama</h1>
            <p class="text-lg">Informasi terupdate seputar kegiatan dan perkembangan desa</p>
        </div>
    </section>

    <!-- Konten Utama Berita -->
    <main class="container mx-auto px-4 py-12">
        <!-- Filter dan Pencarian -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <div class="mb-4 md:mb-0">
                <h2 class="text-xl font-semibold text-gray-800">Berita Terbaru</h2>
            </div>
            <div class="flex space-x-2">
                <div class="relative">
                    <input wire:model.live="search" type="text" placeholder="Cari berita..."
                        class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <select wire:model.live="selectedCategory" class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">Semua Kategori</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Daftar Berita -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($news as $berita)
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative">
                        <img src="{{ asset('storage/'.$berita->image) }}" alt="{{ $berita->title }}" class="w-full h-48 object-cover">
                        <span class="absolute top-2 left-2 bg-{{ $berita->kategori_berita->color }}-600 text-white text-xs px-2 py-1 rounded">
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
                        <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $berita->title }}</h3>
                        <div class="text-gray-600 mb-4 line-clamp-3">{!! Str::limit(strip_tags($berita->content), 150) !!}</div>
                        <a href="{{ route('artikel', ['id' => $berita->id]) }}" class="text-green-600 font-medium hover:text-green-800">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $news->links() }}
        </div>
    </main>
</div>