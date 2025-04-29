<x-dashboard>

    @if(session()->has('success'))
    <div role="alert">
      {{ session('success') }}
      <button type="button" data-bsdismiss="alert" arial-labe;="Close">x</button>
    </div>
  @endif

    <h2>TAMBAH PIMPINAN JAMAAH BARU</h2>
    <form action="/daftarpj/post" method="post">
        @csrf
        <label for="nama_pj">Nama pj:</label>
        <input type="text" name="nama_pj" id="nama_pj" required><br>
        <label for="kode_pj">kode pj:</label>
        <input type="text" name="kode_pj" id="kode_pj" required><br>

        <label for="alamat_pj">Alamat Pj:</label>
        <input type="text" name="alamat_pj" id="alamat_pj" required><br>

        <label for="ketua_pj">Ketua Pj:</label>
        <input type="text" name="ketua_pj" id="ketua_pj" required><br>

        <label for="sk_ketua_pj">S.K ketua Pj:</label>
        <input type="text" name="sk_ketua_pj" id="sk_ketua_pj" required><br>

        <label for="periode_awal">periode awal:</label>
        <input type="date" name="periode_awal" id="periode_awal" required><br>

        <label for="periode_akhir">periode akhir:</label>
        <input type="date" name="periode_akhir" id="periode_akhir" required><br>

        <label for="kontak_ketua_pj">Kontak:</label>
        <input type="text" name="kontak_ketua_pj" id="kontak_ketua_pj" required><br>

        <button type="submit">Simpan</button>

    </form>

    <a href="/daftarpj/list_pj">Lihat Daftar PJ</a>

</x-dashboard>