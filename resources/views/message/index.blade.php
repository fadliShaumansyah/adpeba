<x-dashboard>
    <!-- Parent element HARUS punya x-data -->
    <div class="max-w-3xl mx-auto p-6 bg-white rounded shadow" x-data="{ activeTab: 'inbox' }">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">📨 Manajemen Pesan</h2>
        
       

        <!-- Tab Navigation -->
        <div class="flex border-b mb-6">
            <button 
                @click.prevent="activeTab = 'inbox'"
                :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'inbox' }" 
                class="px-4 py-2 font-medium"
            >
                Kotak Masuk
            </button>
            <button 
                @click.prevent="activeTab = 'outbox'"
                :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'outbox' }" 
                class="px-4 py-2 font-medium"
            >
                Kotak Keluar
            </button>
            <button 
                @click.prevent="activeTab = 'compose'"
                :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'compose' }" 
                class="px-4 py-2 font-medium"
            >
                Tulis Pesan
            </button>
        </div>

        <!-- Tab Content -->
        <div>
            <!-- Inbox -->
            <div x-show="activeTab === 'inbox'" x-transition>
                @forelse($inboxMessages as $message)
                   <a href="{{ route ('messages.show', ['message' => $message->id]) }}" class="block mb-1 bg-gray-50 rounded-lg hover:bg-gray-100">
                    <div class="p-4 bg-blue-50 hover:bg-blue-100 rounded-lg">
                     <strong>  {{ $message->sender->name }} </strong><br>
                       {{ $message->content }}
                    </div>
                    </a>
                @empty
                    <p>Tidak ada pesan</p>
                @endforelse
            </div>
            
            <!-- Outbox -->
            <div x-show="activeTab === 'outbox'" x-transition>
                @forelse($outboxMessages as $message)
                    <div class="mb-4 bg-green-50 rounded-lg">
                        {{ $message->content }}
                    </div>
                @empty
                    <p>Tidak ada pesan</p>
                @endforelse
            </div>
            
            <!-- Compose -->
            <div x-show="activeTab === 'compose'" x-transition>
                <form 
        action="{{ route('messages.store') }}" 
        method="POST"
        class="space-y-4"
        @submit.prevent="
            fetch($event.target.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    receiver_id: selectedReceiver,
                    content: messageContent
                })
            })
            .then(response => {
                if (response.ok) {
                    window.location.reload();
                    return response.json();
                }
                throw new Error('Network response was not ok.');
            })
            .catch(error => {
                console.error('Error:', error);
            })
        "
        x-data="{
            selectedReceiver: '',
            messageContent: '',
            users: {{ Js::from($users) }}
        }"
    >
        @csrf
        
        <!-- Pilih Penerima -->
        <div>
            <label for="receiver_id" class="block text-sm font-medium text-gray-700 mb-1">
                Penerima <span class="text-red-500">*</span>
            </label>
            <select 
                x-model="selectedReceiver"
                id="receiver_id" 
                name="receiver_id"
                required
                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            >
                <option value="">-- Pilih Penerima --</option>
                <template x-for="user in users" :key="user.id">
                    <option :value="user.id" x-text="user.name"></option>
                </template>
            </select>
        </div>
                    
                    <!-- Isi Pesan -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-1">
                            Isi Pesan <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            x-model="messageContent"
                            id="content" 
                            name="content" 
                            rows="5"
                            required
                            maxlength="500"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Tulis pesan Anda di sini (maksimal 500 karakter)..."
                            x-on:input="charCount = 500 - $event.target.value.length"
                        ></textarea>
                        <div class="text-xs text-gray-500 text-right mt-1">
                            <span x-text="500 - messageContent.length"></span>/500 karakter tersisa
                        </div>
                    </div>
                    
                    <!-- Tombol Aksi -->
                    <div class="flex justify-end space-x-3 pt-2">
                        <button 
                            type="button" 
                            @click="activeTab = 'inbox'"
                            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50"
                        >
                            Batal
                        </button>
                        <button 
                            type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            :disabled="!selectedReceiver || !messageContent"
                            :class="{ 'opacity-50 cursor-not-allowed': !selectedReceiver || !messageContent }"
                        >
                            Kirim Pesan
                        </button>
                    </div>
                </form>
                </form>
            </div>
        </div>
    </div>

    <!-- Load Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>
</x-dashboard>