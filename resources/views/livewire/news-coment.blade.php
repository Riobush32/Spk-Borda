<section class="max-w-4xl mx-auto mt-16 bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Komentar ({{ $total }})</h2>

    @if (session('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
            class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="space-y-6">
        @forelse($coments as $comment)
            <div class="flex space-x-4">
                <div class="flex-1">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex justify-between items-start">
                            <h4 class="font-bold text-gray-800">{{ $comment->name }}</h4>
                            <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="mt-1 text-gray-700">{{ $comment->comment }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-4 text-gray-500">
                Belum ada komentar
            </div>
        @endforelse
    </div>

    <!-- Form Komentar -->
    <form wire:submit.prevent="saveComent" class="mt-8">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Tinggalkan Komentar</h3>
        <div class="grid md:grid-cols-2 gap-4 mb-4">
            <div>
                <input wire:model="name" type="text" placeholder="Nama"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input wire:model="email" type="email" placeholder="Email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-4">
            <textarea wire:model="comment" placeholder="Komentar Anda" rows="4"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
            @error('comment')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit"
            class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-200">
            Kirim Komentar
        </button>
    </form>
</section>
