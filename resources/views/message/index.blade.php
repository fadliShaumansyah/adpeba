<x-dashboard>

<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">📨 Pesan Anda</h2>

    <!-- Form Kirim Pesan -->
    <form action="{{ route('messages.store') }}" method="POST" class="space-y-4 mb-6">
        @csrf
        <div>
    <label for="receiver_id" class="block text-sm font-medium text-gray-700">Kepada</label>
    <select name="receiver_id" id="receiver_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        @foreach ($users as $user)
            @if ($user->id !== auth()->id())
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endif
        @endforeach
    </select>
</div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Isi Pesan</label>
            <textarea name="content" id="content" rows="3"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Tulis pesan..." required></textarea>
        </div>

        <button type="submit"
            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700">
            Kirim Pesan
        </button>
    </form>

    <!-- List Pesan -->
    <div class="space-y-4">
        @forelse($messages as $message)
            <div class="bg-gray-100 p-4 rounded shadow-sm">
                <div class="flex justify-between items-center mb-2">
                    <div class="text-sm text-gray-700">
                        <strong>Dari:</strong> {{ $message->sender->name ?? 'Unknown' }} <br>
                        <strong>Ke:</strong> {{ $message->receiver->name ?? 'Unknown' }}
                    </div>
                    <span class="text-xs text-gray-500">{{ $message->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-gray-800">{{ $message->content }}</p>
            </div>
        @empty
            <p class="text-gray-500">Belum ada pesan.</p>
        @endforelse
    </div>
</div>



</x-dashboard>