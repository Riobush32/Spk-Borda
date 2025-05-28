<x-theme.theme-main>
    <!-- Konten Artikel -->
    <main class="container mx-auto px-4 py-12">
        <article class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Gambar Utama -->
            <div class="relative">
                <img src="{{ asset('storage/' . $news->image) }}" alt="Gotong Royong"
                    class="w-full h-64 md:h-96 object-cover">
                <span
                    class="absolute top-4 left-4 bg-[{{ $news->kategori_berita->color }}] text-white text-sm px-3 py-1 rounded">{{ $news->kategori_berita->nama_kategori }}</span>
            </div>

            <!-- Header Artikel -->
            <div class="p-6 md:p-8">
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ $news->created_at->format('d M Y') }} • Oleh: {{ $news->author }}
                </div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">{{ $news->title }}</h1>

                <!-- Share Button -->
                {{-- <div class="flex items-center space-x-4 mb-8">
                    <span class="text-gray-600">Bagikan:</span>
                    <a href="#" class="text-blue-600 hover:text-blue-800">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                            </path>
                        </svg>
                    </a>
                    <a href="#" class="text-blue-700 hover:text-blue-900">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z">
                            </path>
                        </svg>
                    </a>
                    <a href="#" class="text-red-600 hover:text-red-800">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z">
                            </path>
                        </svg>
                    </a>
                </div> --}}

                <!-- Isi Artikel -->
                {!! $news->content !!}

                <!-- Tag Artikel -->
                @php
                    $tags = explode(',', $news->tags);
                @endphp
                <div class="flex flex-wrap gap-2 mt-8 pt-6 border-t border-gray-200">
                    @foreach ($tags as $tag)
                        @php
                            $formattedTag = '#' . Str::of($tag)->trim()->title()->replace(' ', '');
                        @endphp
                        <a
                            class="bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-sm text-gray-700">{{ $formattedTag }}</a>
                    @endforeach
                </div>
            </div>
        </article>

        <!-- Artikel Terkait -->
        @if ($sameNews->count() > 0)
            
                <section class="max-w-4xl mx-auto mt-16">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Artikel Terkait</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        @foreach ($sameNews as $artikel)
                        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                            <a href="#">
                                <img src="{{ asset('storage/'.$artikel->image) }}" alt="Posyandu"
                                    class="w-full h-48 object-cover">
                                <div class="p-6">
                                    <span class="text-sm text-gray-500">22 Mei 2024</span>
                                    <h3 class="text-lg font-bold text-gray-800 mt-2">Posyandu Desa Bandar Lama Raih
                                        Penghargaan
                                    </h3>
                                    <p class="text-gray-600 mt-2">Posyandu Melati meraih penghargaan sebagai Posyandu
                                        Terbaik
                                        se-Kecamatan...</p>
                                </div>
                            </a>
                        </article>
                        
                        @endforeach
                    </div>
                </section>
           
        @endif
        <!-- Komentar -->
        @livewire('news-coment', ["newsId" => $news->id])
    </main>

</x-theme.theme-main>
