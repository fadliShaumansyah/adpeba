<x-dashboard>
    <div class="max-w-4xl mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Manage Admin Users</h1>

        @if(session('success'))
            <div class="bg-green-100 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 p-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <!-- Menampilkan Daftar Admin -->
        <h2 class="text-xl font-semibold mb-4">Admin List</h2>
        @foreach ($users as $user)
            <div class="bg-white p-2 rounded shadow mb-2 flex flex-row">
                

                <!-- Tombol untuk menghapus admin -->
                <form action="{{ route('admin.remove', $user->npa) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-4 rounded">
                        Hapus
                    </button>
                </form>
                <h3 class="ml-6 text-lg font-semibold">{{ $user->name }} 👉 {{ $user->role }}</h3>
            </div>
        @endforeach

        <!-- Form untuk Menambah Admin Baru -->
     
        <div class="max-w-xl mx-auto mt-10 p-6 bg-white shadow rounded">
            <h2 class="text-xl font-bold mb-4">Tambah Admin Baru</h2>
            

            <!-- Form pencarian -->
            <form method="GET" action="{{ route('admin.permissions.index') }}" class="mb-6">
                <div class="flex items-center space-x-2">
                    <input type="text" name="npa" placeholder="Masukkan NPA" value="{{ request('npa') }}"
                        class="border rounded px-3 py-2 w-full" required>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
                </div>
            </form>
<!-- Tampilkan hasil jika ada -->
@if($finduser)
    <div class="p-4 border rounded bg-gray-50">
        <p><strong>Nama:</strong> {{ $finduser->name }}</p>
        <p><strong>Email:</strong> {{ $finduser->email }}</p>
        <p><strong>Role:</strong> {{ $finduser->role }}</p>

        @if($finduser->role !== 'admin')
            <!-- Form untuk mengubah menjadi admin -->
            <form method="POST" action="{{ route('admin.permissions.update') }}"
                class="mt-4">
                @csrf
                <input type="hidden" name="npa" value="{{ $finduser->npa }}">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Jadikan Admin</button>
            </form>
        @else
            <p class="text-green-600 mt-2">User ini sudah merupakan admin.</p>
        @endif
    </div>
@elseif(request('npa'))
    <p class="text-red-600">User dengan NPA tersebut tidak ditemukan.</p>
@endif

        </div>
    </div>

     <h1 class="text-2xl font-bold mb-6">Persetujuan NPA User</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($users->isEmpty())
            <p class="text-gray-600">Tidak ada NPA yang perlu disetujui.</p>
        @else
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">Nama</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">NPA Pending</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->npa_pending }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <form action="{{ route('admin.npa.approve', $user->id) }}" method="POST" onsubmit="return confirm('Setujui NPA untuk {{ $user->name }}?')">
                                @csrf
                                @method('POST')
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                                    Setujui
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    <div>
        <a href="/dashboard" class="text-blue-500 hover:underline">Back to Dashboard</a>
    </div>
</x-dashboard>
