<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased text-gray-900 leading-normal tracking-wider bg-cover"
    style="background-image:url('https://source.unsplash.com/1L71sPT5XKc');">
    @if(session()->has('success'))
    <div role="alert">
      {{ session('success') }}
      <button type="button" data-bsdismiss="alert" arial-labe;="Close">x</button>
    </div>
  @endif

  @if ($errors->any())
  <ul class="text-red-500 text-sm">
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
</ul>
@endif

    <div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">

        <!-- Main Col -->
        <div class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-90 mx-6 lg:mx-0">
            <div class="p-4 md:p-12">

                <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>

                <form action="{{ route('profile.update') }}" method="POST" class="space-y-4 display:none;" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="profil_image" class="block text-sm font-medium text-gray-700 mb-1">Gambar (opsional)</label>
                        <input type="file" value="{{$user->profil_image}}" name="profil_image" id="profil_image"
                        class="block w-full text-sm text-gray-700 border border-gray-300 rounded cursor-pointer focus:outline-none focus:ring focus:border-blue-300">
                    </div> 
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Name</label>
                        <input type="text" name="name" value="{{$user->name}}"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>
<div>
    
    

    @if ($user->npa !== null)
        <label class="block text-sm font-bold text-gray-700">NPA</label>
                        <input type="text" name="npa" value="{{$user->npa}} "readonly
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
    @else
        <a href="#" id="showInputLink" class="text-blue-600 underline-none cursor-pointer">Punya Nomor Registrasi ?</a>

        <!-- Form input NPA yang awalnya disembunyikan -->
        
            <input type="text" name="npa" id="npaInput" class="border rounded px-2 py-1 mt-2 hidden" placeholder="Masukkan NoReg">

           
    @endif
</div>



                    <div> 
                       
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" value="{{$user->tanggal_lahir}}"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Phone Number</label>
                        <input type="text" name="no_hp" value="{{$user->no_hp}}"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                          
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">E-mail</label>
                        <input type="email" name="email" value="{{old('email',$user->email)}}"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                           
                            @error('email')
                            <div class="text-red-500 text-sm">
                                {{$message}}
                            </div>
                            @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Alamat</label>
                        <input type="text" name="alamat" value="{{$user->alamat}}"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Desa/Kel</label>
                        <input type="text" name="desa" value="{{$user->desa}}"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Kecamatan</label>
                        <input type="text" name="kecamatan" value="{{$user->kecamatan}}"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Kota/Kab</label>
                        <input type="text" name="kota" value="{{$user->kota}}"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Provinsi</label>
                        <input type="text" name="provinsi" value="{{$user->provinsi}}"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Sekolah Dasar</label>
                        <input type="text" name="sd" value="{{$user->sd}}"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Sekolah Menengah Pertama</label>
                        <input type="text" name="smp" value="{{$user->smp}}"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Sekolah Menengan Atas</label>
                        <input type="text" name="sma" value="{{$user->sma}}"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Strata Satu</label>
                        <input type="text" name="s1" value="{{$user->s1}}"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Strata Dua</label>
                        <input type="text" name="s2" value="{{$user->s2}}"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Strata Tiga</label>
                        <input type="text" name="s3" value="{{$user->s3}}"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">About You</label>
                        <textarea name="bio" rows="4"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" >{{old('bio',$user->bio)}}</textarea>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full">
                            Save Changes
                        </button>
                        <a href="{{ route('profile') }}" class="ml-4 text-gray-600 hover:text-green-700 font-semibold">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
  document.getElementById('showInputLink').addEventListener('click', function(e) {
    e.preventDefault(); // supaya link tidak reload page
    this.style.display = 'none'; // sembunyikan link
    document.getElementById('npaInput').classList.remove('hidden'); // tampilkan input
    document.getElementById('npaInput').focus(); // fokus ke input supaya user langsung bisa ketik
  });
</script>
</body>
</html>
