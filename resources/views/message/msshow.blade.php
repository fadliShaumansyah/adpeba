<x-dashboard>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li>
                    <a href="{{ route('messages.index') }}" class="text-blue-600 hover:text-blue-800">
                        Pesan
                    </a>
                </li>
                <li aria-current="page">
                    <span class="text-gray-500">Detail Pesan</span>
                </li>
            </ol>
        </nav>

        <!-- Pesan Utama -->
        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-6">
            <div class="flex justify-between items-center mb-3">
                <div>
                    <span class="font-semibold">
                        Dari: {{ $message->sender->name }}
                    </span>
                    <span class="text-sm text-gray-500 ml-2">
                        kepada {{ $message->receiver->name }}
                    </span>
                </div>
                <span class="text-sm text-gray-500">
                    {{ $message->created_at->format('d M Y H:i') }}
                    @if($message->read_at)
                        <span class="text-blue-500 ml-2">✓✓ Dibaca</span>
                    @endif
                </span>
            </div>
            <p class="text-gray-800 whitespace-pre-line">{{ $message->content }}</p>
        </div>

        <!-- Daftar Balasan -->
        @if($message->replies->count() > 0)
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-3">📨 Balasan ({{ $message->replies->count() }})</h3>
                <div class="space-y-4">
                    @foreach($message->replies as $reply)
                        <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-400 ml-8">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-medium">
                                    {{ $reply->sender_id === auth()->id() ? 'Anda' : $reply->sender->name }}
                                </span>
                                <span class="text-xs text-gray-500">
                                    {{ $reply->created_at->format('d M Y H:i') }}
                                </span>
                            </div>
                            <p class="text-gray-800 whitespace-pre-line">{{ $reply->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Form Balas Pesan -->
        <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-200">
            <h3 class="text-lg font-semibold mb-3">✍️ Balas Pesan Ini</h3>
            <form action="{{ route('messages.reply', $message) }}" method="POST">
                @csrf

                <!-- Field penerima otomatis -->
                <input type="hidden" name="receiver_id" value="{{ 
                    $message->sender_id === auth()->id() 
                        ? $message->receiver_id 
                        : $message->sender_id 
                }}">

                <div class="mb-3 text-sm text-gray-600">
                    Kepada: <strong>{{ 
                        $message->sender_id === auth()->id() 
                            ? $message->receiver->name 
                            : $message->sender->name 
                    }}</strong>
                </div>

                <textarea name="content" rows="3" 
                    class="w-full rounded-md border-gray-300 shadow-sm mb-3 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-150"
                    placeholder="Tulis balasan Anda..." required></textarea>

                <div class="flex items-center">
                    <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                        Kirim Balasan
                    </button>
                    <a href="{{ route('messages.index') }}" 
                        class="ml-2 px-4 py-2 border border-gray-300 rounded hover:bg-gray-50 transition">
                        Kembali ke Kotak Pesan
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-dashboard>