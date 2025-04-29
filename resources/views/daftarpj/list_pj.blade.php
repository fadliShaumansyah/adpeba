<x-dashboard>
    <table border="1">
        <thead>
            <tr>
                <th>Nama PJ</th>
                <th>Alamat PJ</th>
                <th>Ketua PJ</th>
                <th>S.K Ketua PJ</th>
                <th>Periode Awal</th>
                <th>Periode Akhir</th>
                <th>Kontak</th>
                <!-- Sesuaikan dengan kolom yang ada di tabel kamu -->
            </tr>
        </thead>
        <tbody>
            @foreach($pjs as $pj)
                <tr>
                    <td>{{ $pj->nama_pj }}</td>
                    <td>{{ $pj->alamat_pj }}</td>
                    <td>{{ $pj->ketua_pj }}</td>
                    <td>{{ $pj->sk_ketua_pj }}</td>
                    <td>{{ $pj->periode_awal }}</td>
                    <td>{{ $pj->periode_akhir }}</td>
                    <td>{{ $pj->kontak_ketua_pj }}</td>
                    <!-- Sesuaikan dengan atribut dari tabel daftarpj -->
                </tr>
            @endforeach
        </tbody>
    </table>
    @foreach($pjs as $pj)
    <div class="flex min-h-screen items-center justify-center bg-gray-100">
  <div class="flex font-sans">
    <div class="flex-none w-48 relative">
      <img src="https://images.unsplash.com/photo-1699412958387-2fe86d46d394?q=80&w=3329&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="absolute inset-0 w-full h-full object-cover" loading="lazy" />
    </div>
    <form class="flex-auto p-6">
      <div class="flex flex-wrap">
        <h1 class="flex-auto text-xl font-semibold text-gray-900">
        PJ {{ $pj->nama_pj }}
        </h1>
        <div class="text-lg font-semibold text-black-500">
          $110.00
        </div>
        <div class="w-full flex-none text-sm font-medium text-black-700 mt-2">
        {{ $pj->alamat_pj }}
        </div>
      </div>
      <div class="flex items-baseline mt-4 mb-6 pb-6 border-b border-slate-200">
        <div class="space-x-2 flex text-sm">
          <label>
            <input class="sr-only peer" name="size" type="radio" value="xl" />
            <div class=" p-2 rounded-lg flex items-center justify-center text-slate-700 peer-checked:font-semibold peer-checked:bg-slate-900 peer-checked:text-white">
            {{ $pj->ketua_pj }}
            </div>
          </label>
        </div>
      </div>
      <div class="flex space-x-4 mb-6 text-sm font-medium">
        <div class="flex-auto flex space-x-4">
          <button class="h-10 px-6 font-semibold rounded-md border border-balck-800 text-gray-900" type="button">
            Add to cart
          </button>
          <div class="mt-4">
            <p><strong>Countdown to Start:</strong></p>
            <p><strong>Time Left Until End:</strong></p>
        </div>
        </div>
        <button class="flex-none flex items-center justify-center w-9 h-9 rounded-md text-slate-300 border border-slate-200" type="button" aria-label="Favorites">
          <svg width="20" height="20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
          </svg>
        </button>
      </div>
      <p class="text-sm text-slate-700">
        Free shipping 
      </p>
    </form>
  </div>
</div>
@endforeach
</x-dashboard>