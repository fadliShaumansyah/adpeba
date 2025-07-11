<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
   
</head>
<body >
<div class="flex w-screen h-screen text-gray-700 z-50">

	<!-- Component Start -->
            <div class="flex flex-col items-center w-16 pb-4 border-r border-gray-300">
              <!--home/dashboard-->
                <a class="flex items-center justify-center flex-shrink-0 w-full h-16 bg-gray-300" href="{{route('dashboard')}}">
                    <svg class="w-8 h-8"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </a>
            @auth
             @if(Auth::user()->role === 'admin' || Auth::user()->role === 'super_admin')
                                     
        <!--pendidikan-->
                <a class="relative group flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300 z-40" href="/pendidikan">
            <!-- TOOLTIP -->
                <span class="hidden group-hover:inline-block absolute left-full top-0 ml-2 bg-black text-white text-sm p-2 rounded z-[9999] whitespace-nowrap shadow-lg pointer-events-none">
                    Pendidikan
                </span>
            <!-- ICON -->
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </a>
            <!--dakwah-->
                <a class="relative group flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300 z-40" href="{{ route('dakwah') }}">
                <!-- TOOLTIP -->
                <span class="hidden group-hover:inline-block absolute left-full top-0 ml-2 bg-black text-white text-sm p-2 rounded z-[9999] whitespace-nowrap shadow-lg pointer-events-none">
                    Dakwah
                </span>    
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </a>
            <!--Kaderisasi-->
                <a class="relative group flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300 z-40" href="/kaderisasi">
                <!-- TOOLTIP -->
                <span class="hidden group-hover:inline-block absolute left-full top-0 ml-2 bg-black text-white text-sm p-2 rounded z-[9999] whitespace-nowrap shadow-lg pointer-events-none">
                    Kaderisasi
                </span>
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    
                </a>
                <!--kejamiyyahan-->
                <a class="relative group flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300 z-40" href="{{ route('list_pj') }}">
                      <!-- TOOLTIP -->
                <span class="hidden group-hover:inline-block absolute left-full top-0 ml-2 bg-black text-white text-sm p-2 rounded z-[9999] whitespace-nowrap shadow-lg pointer-events-none">
                    Jamiyyah
                </span>  
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </a>
                <!--sosial-->
                <a class="relative group flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300 z-40" href="/sosial">
                  <!-- TOOLTIP -->
                  <span class="hidden group-hover:inline-block absolute left-full top-0 ml-2 bg-black text-white text-sm p-2 rounded z-[9999] whitespace-nowrap shadow-lg pointer-events-none">
                    Sosial
                </span>      
                <svg class="w-5 h-5"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </a>
                <!--osb-->
                <a class="relative group flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300 z-[9999]" href="/osb">
                  <!-- TOOLTIP -->
                  <span class="hidden group-hover:inline-block absolute left-full top-0 ml-2 bg-black text-white text-sm p-2 rounded z-[9999] whitespace-nowrap shadow-lg pointer-events-none">
                    Osb
                </span>      
                <svg class="w-5 h-5"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </a>
              
                <!--osb-->
                @endif
                @endauth  
                <!--guest fitur-->
                <a class="relative group flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300 z-40" href="/posts">
                  <!-- TOOLTIP -->
                  <span class="hidden group-hover:inline-block absolute left-full top-0 ml-2 bg-black text-white text-sm p-2 rounded z-[9999] whitespace-nowrap shadow-lg pointer-events-none">
                    My Post
                </span>      
                <svg class="w-5 h-5"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </a>
                    @auth
                        @if (auth()->user()->npa)
                           
                      
                <a class="relative group flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300 z-40" href="/artikel">
                  <!-- TOOLTIP -->
                  <span class="hidden group-hover:inline-block absolute left-full top-0 ml-2 bg-black text-white text-sm p-2 rounded z-[9999] whitespace-nowrap shadow-lg pointer-events-none">
                    Artikel
                </span>      
                <svg class="w-5 h-5"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </a>
                  @endif
                    @endauth
            </div>
        
            

            <div class="flex flex-col flex-grow overflow-auto">
                <div class="flex items-center flex-shrink-0 h-16 px-8 border-b border-gray-300 ">
                    <h1 class="text-lg font-medium">{{ Auth::user()->name }}</h1>
                    <button class="flex items-center justify-center h-10 px-4 ml-auto text-sm font-medium rounded hover:bg-gray-300">
                    
                    </button>

                    <!--pesan-->
                     <a href="/messages" class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300"> <span class="leading-none">Pesan</span>
                                        </a>

                    @auth
                                    @if(Auth::user()->role === 'super_admin')
                                        <a href="/admin/permissions" class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300"> <span class="leading-none">Admin Panel</span>
                                        </a>
                                        <a href="{{route ('admin.npa.approval') }}" class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300"> <span class="leading-none">pengajuan npa</span>
                                        </a>
                                    @endif
                                @endauth
                    
                    <!--profile-->
                    <a class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300" href="/profile">
                       
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    </a>
                  
                   <div class="relative">
                        <button id="dropdownToggle" class="flex items-center justify-center w-10 h-10 rounded hover:bg-gray-300 focus:outline-none">
                            <svg class="w-5 h-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>

                        <div id="dropdownMenu" class="absolute right-0 mt-2 w-40 bg-white border border-gray-300 shadow-lg rounded hidden z-50">
                            <a class="block px-4 py-2 text-left hover:bg-gray-100" href="{{route('profile.edit')}}">
                            Edit Profil</a>
                            <a class="block px-4 py-2 text-left hover:bg-gray-100" href="{{ route ('admin.indexpanel.base') }}">admin panel</a>
                            <a class="block px-4 py-2 text-left hover:bg-gray-100" href="/logout">Logout</a>
                        </div>
                    </div>

                    
                </div>
                
                {{ $slot }}
                
            </div>

           

</div>
            <a class="fixed flex items-center justify-center h-8 pr-2 pl-1 bg-blue-600 rounded-full bottom-0 right-0 mr-4 mb-4 shadow-lg text-blue-100 hover:bg-blue-600" href="https://twitter.com/lofiui" target="_top">
                <div class="flex items-center justify-center h-6 w-6 bg-blue-500 rounded-full">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" class="r-jwli3a r-4qtqp9 r-yyyyoo r-16y2uox r-1q142lx r-8kz0gk r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1srniue"><g><path d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z"></path></g></svg>
                </div>
                <span class="text-sm ml-1 leading-none">@lofiui</span>
            </a>
  <script>
    const toggle = document.getElementById('dropdownToggle');
    const menu = document.getElementById('dropdownMenu');

    toggle.addEventListener('click', function (e) {
        e.stopPropagation();
        menu.classList.toggle('hidden');
    });

    document.addEventListener('click', function () {
        menu.classList.add('hidden');
    });


    
</script>   
  </body>
  
</html>