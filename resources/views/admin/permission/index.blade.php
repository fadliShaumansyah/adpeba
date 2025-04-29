<x-dashboard>
    

<div class="max-w-4xl mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Manage Admin Users</h1>

    @if(session('success'))
        <div class="bg-green-100 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Menampilkan Daftar Admin -->
    <h2 class="text-xl font-semibold mb-4">Admin List</h2>
    @foreach ($users as $user)
        <div class="bg-white p-4 rounded shadow mb-6">
            <h3 class="text-lg font-semibold">{{ $user->name }} ({{ $user->email }})</h3>

            <!-- Tombol untuk menghapus admin -->
            <form action="/admin/remove/{id}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-4 rounded">
                    Remove Admin
                </button>
            </form>
        </div>
    @endforeach

    <!-- Form untuk Menambah Admin Baru -->
    <h2 class="text-xl font-semibold mb-4">Add New Admin</h2>
    <form method="POST" action="{{ route('admin.add') }}">
        @csrf
        <div class="mb-4">
            <label for="email" class="block">Admin Email</label>
            <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="name" class="block">Admin Name</label>
            <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" required>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-4 rounded">
            Add Admin
        </button>
    </form>
</div>
<div>
    <a href="/dashboard" class="text-blue-500 hover:underline">Back to Dashboard</a>
    </div>
</x-dashboard>