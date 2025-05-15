<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>Profil Akun</h3>
<p>Nama: {{ Auth::user()->name }}</p>
<p>Email: {{ Auth::user()->email }}</p>

@if (!Auth::user()->hasVerifiedEmail())
    <p style="color:red">Status: <strong>Not Verified</strong></p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Kirim Ulang Email Verifikasi</button>
    </form>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif
@else
    <p style="color:green">Status: <strong>Verified</strong></p>
@endif
</body>
</html>