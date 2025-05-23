<x-dashboard>
    <div class="container mx-auto px-4 py-8">
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
                           <div class="flex space-x-2">
    <form action="{{ route('admin.npa.approve', $user->id) }}" method="POST" onsubmit="return confirm('Setujui NPA untuk {{ $user->name }}?')">
        @csrf
        @method('POST')
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
            Setujui
        </button>
    </form>

    <form action="{{ route('admin.npa.reject', $user->id) }}" method="POST" onsubmit="return confirm('Tolak NPA untuk {{ $user->name }}?')">
        @csrf
        @method('POST')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition">
            Tolak
        </button>
    </form>
</div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>


</x-dashboard>