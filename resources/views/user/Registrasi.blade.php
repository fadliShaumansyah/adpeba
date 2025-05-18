<x-layout>
    

<div class="min-h-screen bg-no-repeat bg-cover bg-center relative" style="background-image: url(https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80);">
  <div class=" absolute bg-gradient-to-b from-green-500 to-green-400 opacity-75 inset-0 z-0">
  </div>

  <div class=" sm:flex sm:flex-row justify-center items-start min-h-screen z-10 relative px-8 py-12">
      <div class="flex-col flex  self-center p-10 sm:max-w-5xl xl:max-w-2xl  z-10">
        <div class="self-start hidden lg:flex flex-col  text-white">
          <img src="" class="mb-3">
          <h1 class="mb-3 font-bold text-5xl">Hi 👋 Welcome!</h1>
          <p class="pr-3">Lorem ipsum is placeholder text commonly used in the graphic, print,
            and publishing industries for previewing layouts and visual mockups</p>
        </div>
      </div>
      <div class="flex justify-center self-center w-1/2 z-10 overflow-auto">
        <div class="p-12 bg-white mx-auto rounded-2xl w-full ">
          <form action="{{ route('Registrasi') }}" method="POST">
          @csrf  
        
            <div class="mb-4">
              <h3 class="font-semibold text-2xl text-gray-800">Sign Up </h3>
              <p class="text-gray-500">Create your account.</p>
            </div>

            <div class="space-y-5">
              <div class="space-y-2">
                  <label for="name" class="text-sm font-medium text-gray-700 tracking-wide">Nama</label>
                  <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" name="name" id="name" type="text" placeholder="Nama" require>
                  
              </div>
            </div>
            <div class="space-y-5">
              <div class="space-y-2">
                  <label for="npa" class="text-sm font-medium text-gray-700 tracking-wide">NPA</label>
                  <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" name="npa" id="napa" type="text" placeholder="NPA" require>
                  @error('npa')<div class="invalid-feedback">{{$message}}</div>@enderror
              </div>
            </div>
            <div class="space-y-5">
              <div class="space-y-2">
                  <label for="alamat" class="text-sm font-medium text-gray-700 tracking-wide">Address</label>
                  <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" name="alamat" id="alamat" type="text" placeholder="Alamat" require>
              </div>
            </div>
            <div class="space-y-5">
              <div class="space-y-2">
                  <label for="no_hp" class="text-sm font-medium text-gray-700 tracking-wide">Phone Number</label>
                  <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" name="no_hp" id="no_hp" type="text" placeholder="No Hp" require>
              </div>
            </div>

            <div class="space-y-5">
              <div class="space-y-2">
                  <label for="email" class="text-sm font-medium text-gray-700 tracking-wide">Email</label>
                  <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" name="email" id="email" type="email" placeholder="mail@gmail.com" require>
                  @error('email')<div class="invalid-feedback">{{$message}}</div>@enderror
              </div>
            </div>

              <div class="space-y-2">
                <label for="password" class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                Password
                </label>
                <input class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="password" name="password" id="password" placeholder="Enter your password" require>
             </div>
            
              <div>
                <button type="submit" class="mt-4 w-full flex justify-center bg-green-400  hover:bg-green-500 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                  Sign Up
                </button>
              </div>
            
            <div class="pt-5 text-center text-gray-400 text-xs">
              <span>
                Sudah mempunyai akun ?
                <a href="/login" rel="" target="_blank" class="text-green hover:text-green-500 hover:font-bold font-bold ">Login</a></span>
            </div>
          </form>
        </div>
      </div>
 </div>


</x-layout>
