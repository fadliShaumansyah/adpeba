<x-layout>

<div class="bg-no-repeat bg-cover bg-center relative" style="background-image: url(https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80);"><div class="absolute bg-gradient-to-b from-green-500 to-green-400 opacity-75 inset-0 z-0">
    </div>

  <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
      <div class="flex-col flex  self-center p-10 sm:max-w-5xl xl:max-w-2xl  z-10">
        <div class="self-start hidden lg:flex flex-col  text-white">
          <img src="" class="mb-3">
          <h1 class="mb-3 font-bold text-5xl">Hi ? Welcome Back! </h1>
          <p class="pr-3">Lorem ipsum is placeholder text commonly used in the graphic, print,
            and publishing industries for previewing layouts and visual mockups</p>
        </div>
      </div>
      <div class="flex justify-center self-center  z-10">
        <div class="p-12 bg-white mx-auto rounded-2xl w-100 ">
              @if ($errors->any())
                <div class="alert alert-danger bg-red-200 p-1 rounded-lg ">
                    <ul class="mb-0 text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif

          <form action="/login" method="POST">
          @csrf  
        
            <div class="mb-4">
              <h3 class="font-semibold text-2xl text-gray-800">Sign In </h3>
              <p class="text-gray-500">Please sign in to your account.</p>
            </div>

            <div class="space-y-5">
              <div class="space-y-2">
                  <label class="text-sm font-medium text-gray-700 tracking-wide">Email</label>
                  <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" name="email" id="email" type="email" placeholder="mail@gmail.com">
              </div>

              <div class="space-y-2">
                <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                Password
                </label>
                <input class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="password" name="password" id="password" placeholder="Enter your password">
             </div>

              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <!-- <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 bg-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                  <label for="remember_me" class="ml-2 block text-sm text-gray-800">
                    Remember me
                  </label> -->
                </div>

                <div class="text-sm">
                  <a href="#" class="text-green-400 hover:text-green-500">
                    Forgot your password?
                  </a>
                </div>
              </div>
              <div>
                <button type="submit" class="w-full flex justify-center bg-green-400  hover:bg-green-500 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                  Sign in
                </button>
              </div>
            </div>
            <div class="pt-5 text-center text-gray-400 text-xs">
              <span>
                Belum mempunyai akun ?
                <a href="{{ route('Registrasi') }}" rel="" target="_blank" class="text-green hover:text-green-500 ">Registrasi</a></span>
            </div>
          </form>
        </div>
      </div>
  </div>

</x-layout>