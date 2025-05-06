<x-dashboard>
@if(session()->has('success'))
    <div id="alertBox" class="fixed bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
    {{ session('success') }}
      <strong class="font-bold">Berhasil!</strong>
      <span class="block sm:inline">Data telah disimpan.</span>
      <span class="font-bold"><a href="/daftarpj/list_pj">Lihat Daftar PJ</a></span>
      <button onclick="document.getElementById('alertBox').remove()" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-700 hover:text-green-900">
        &times;
      </button>
    </div>
    @endif
<div clas="flex flex-shrink">
  <x-jamiyyah />

   
   
 
  <div class=" h-full bg-gray-100 mt-30 ml-10 p-8 overflow-auto">
    <h2 class="text-3xl font-bold">TAMBAH PIMPINAN JAMAAH BARU</h2>
    <form action="/daftarpj/post" method="post" class="flex flex-col mt-8">
        @csrf
       
        <label for="nama_pj" >Nama pj:</label>
        <input type="text" name="nama_pj" id="nama_pj" class=" text-black placeholder-gray-600 w-1/2 px-4 py-2.5 mt-1 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-400  focus:bg-white  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-blue-400" required>
        <label for="kode_pj">kode pj:</label>
        <input type="text" name="kode_pj" id="kode_pj" class=" text-black placeholder-gray-600 w-1/2 px-4 py-2.5 mt-1 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-400  focus:bg-white  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-blue-400" required>

        <label for="alamat_pj">Alamat Pj:</label>
        <input type="text" name="alamat_pj" id="alamat_pj" class=" text-black placeholder-gray-600 w-1/2 px-4 py-2.5 mt-1 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-400  focus:bg-white  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-blue-400" required>

        <label for="ketua_pj">Ketua Pj:</label>
        <input type="text" name="ketua_pj" id="ketua_pj" class=" text-black placeholder-gray-600 w-1/2 px-4 py-2.5 mt-1 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-400  focus:bg-white  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-blue-400" required>

        <label for="sk_ketua_pj">S.K ketua Pj:</label>
        <input type="text" name="sk_ketua_pj" id="sk_ketua_pj" class=" text-black placeholder-gray-600 w-1/2 px-4 py-2.5 mt-1 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-400  focus:bg-white  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-blue-400" required>

        <label for="periode_awal">periode awal:</label>
        <input type="date" name="periode_awal" id="periode_awal" class=" text-black placeholder-gray-600 w-1/2 px-4 py-2.5 mt-1 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-400  focus:bg-white  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-blue-400"  required>

        <label for="periode_akhir">periode akhir:</label>
        <input type="date" name="periode_akhir" id="periode_akhir" class=" text-black placeholder-gray-600 w-1/2 px-4 py-2.5 mt-1 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-400  focus:bg-white  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-blue-400"  required>

        <label for="kontak_ketua_pj">Kontak:</label>
        <input type="text" name="kontak_ketua_pj" id="kontak_ketua_pj" class=" text-black placeholder-gray-600 w-1/2 px-4 py-2.5 mt-1 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-400  focus:bg-white  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-blue-400" required>

        <!--button--> 
        <div class="flex flex-row p-3">
               <div class="flex-initial pl-3 mr-2">
                  <button type="submit" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize   bg-black rounded-md hover:bg-gray-800  focus:outline-none focus:bg-gray-900  transition duration-300 transform active:scale-95 ease-in-out">
                     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path d="M5 5v14h14V7.83L16.17 5H5zm7 13c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-8H6V6h9v4z" opacity=".3"></path>
                        <path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z"></path>
                     </svg>
                     <span class="pl-2 mx-1">Save</span>
                  </button>
                </div>
            </form>
          <a href="/daftarpj/list_pj">Lihat Daftar PJ</a>
        </div>
</div>

</div>   

    
</x-dashboard>