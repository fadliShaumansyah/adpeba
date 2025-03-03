<x-layout>

<h1>Daftar PJ</h1>

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
    <a href="/daftarpj">Kembali</a>

</x-layout>