<x-bidang.jamiyyah>
<div class="flex flex-wrap gap-4 m-4 bg-gray-100"> 
    @foreach($pjs as $pj)
    
  <div class="flex font-sans bg-green-500 rounded-xl shadow-lg ">
    <form class="flex-auto p-6">
      <div class="flex flex-wrap">
        <h1 class="flex-auto text-2xl font-bold text-gray-900">
          PJ {{ $pj->nama_pj }}
        </h1>
        <div class="text-lg font-semibold text-black-500">
          {{ $pj->kode_pj }}
        </div>
        <div class="w-full flex-none text-sm font-medium text-black-700 mt-2">
          {{ $pj->alamat_pj }}
        </div>
      </div>
      <div class="flex items-baseline mt-4 mb-6 pb-6 border-b border-slate-200">
        <div class="space-x-2 flex text-sm">
        <span class="font-semibold "> Ketua PJ </span>
          <label>
            <input class="sr-only peer" name="size" type="radio" value="xl" />
            <div class="p-2 rounded-lg flex items-center justify-center text-slate-700 peer-checked:font-semibold peer-checked:bg-slate-900 peer-checked:text-white">
               {{ $pj->ketua_pj }}
            </div>
          </label>
        </div>
      </div>
      <div class="flex space-x-4 mb-6 text-sm font-medium">
        <div class="flex-auto flex space-x-4">
          <a href="#" class="h-10 p-2 font-semibold rounded-md border border-black-800 text-gray-900" >
            Kontak Ketua PJ
          </a>
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
      <p class="text-sm text-slate-700">Masa Jihad</p>
    </form>
  </div>


@endforeach
</div>
</x-bidang.jamiyyah>