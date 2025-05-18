<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
   
 
</head>
<body>
<div class=" w-screen h-screen text-gray-700 z-50">
<div class="flex flex-col flex-grow ">
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
                                    @endif
                                @endauth
                    
                    <!--profile-->
                    <a class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300" href="/profile">
                       
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    </a>
                  
                    <button class="relative ml-2 text-sm focus:outline-none group">
                        <div class="flex items-center justify-between w-10 h-10 rounded hover:bg-gray-300">
                            <svg class="w-5 h-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </div>
                        <div class="absolute right-0 flex-col items-start hidden w-40 pb-1 bg-white border border-gray-300 shadow-lg group-focus:flex">
                            <a class="w-full px-4 py-2 text-left hover:bg-gray-300" href="#">Menu Item 1</a>
                            <a class="w-full px-4 py-2 text-left hover:bg-gray-300" href="#">Menu Item 1</a>
                            <a class="w-full px-4 py-2 text-left hover:bg-gray-300" href="/logout">Logout</a>
                        </div>
                    </button>

                    
                </div>
                
              
                
            </div>

 
<div class="max-w-3xl mx-auto px-4 py-6 bg-slate-100">

    <h2 class="text-2xl font-bold mb-4">Feed Postingan</h2>

    <a href="{{ route('posts.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-6">
        Buat Postingan
    </a>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 bg-white p-6 rounded shadow  ">
        @csrf

        <div>
            <textarea name="content" id="content" rows="4"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('content') }}</textarea>
        </div>

        <div class="">
           
                <label for="image-upload" class="cursor-pointer  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 124 124" fill="none">
                <rect width="124" height="124" rx="24" fill="#F97316"/>
                <path d="M19.375 36.7818V100.625C19.375 102.834 21.1659 104.625 23.375 104.625H87.2181C90.7818 104.625 92.5664 100.316 90.0466 97.7966L26.2034 33.9534C23.6836 31.4336 19.375 33.2182 19.375 36.7818Z" fill="white"/>
                <circle cx="63.2109" cy="37.5391" r="18.1641" fill="black"/>
                <rect opacity="0.4" x="81.1328" y="80.7198" width="17.5687" height="17.3876" rx="4" transform="rotate(-45 81.1328 80.7198)" fill="#FDBA74"/>
                </svg>

            </label>
            <input type="file" id="image-upload" name="image" class="hidden pointer-events-none " accept="image/*" >

        </div>

        <div class="flex items-center ">
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
                Posting
            </button>
            <a href="{{ route('posts.index') }}"
                class="text-gray-700 hover:text-gray-900 px-4 py-2 border border-gray-300 rounded">
                Batal
            </a>
        </div>
    </form>

    @foreach ($posts as $post)
    
        <div class="bg-white shadow rounded-lg my-2 p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center ">
                    {{-- <img class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="{{asset('storage/'. $post->user->profil_image) }}" alt="Bordered avatar">  --}}
                    <img class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500 mr-4" src="{{asset('storage/'. $post->user->profil_image) }}" alt="Bordered avatar"> 
                        
                    <strong>
                    
                   <a href ="{{ route('show.profil', $post->user->id) }}"> {{ $post->user->name }}</strong>
                    <span class="text-sm text-gray-500">• {{ $post->created_at->diffForHumans() }}</span>
                </div>
            </div>
            <div class="mb-3">
                @if ($post->image)
                    <img src="{{ $post->image }}" class="w-full h-250 rounded shadow-xl mb-2" alt="Post Image">
                @endif
                <p class="text-gray-800">{{ $post->content }}</p>
            </div>

            <div class="flex items-center space-x-4">
                {{-- Like button --}}
                <form action="{{ route('posts.like', $post) }}" method="POST">
                    @csrf
                    <button 
                        class="like-button flex items-center text-sm text-blue-600 hover:text-blue-800" 
                        data-post-id="{{ $post->id }}">
                        👍 <span class="like-count">{{ $post->likes->count() }}</span>
                    </button>
                </form>

                {{-- Hapus post --}}
                @if ($post->user_id == auth()->id())
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="text-sm text-red-600 hover:text-red-800">Hapus</button>
                    </form>
                @endif
            </div>

            {{-- Komentar --}}
            <div class="mt-4 border-t pt-3">
                <form action="{{ route('comments.store', $post) }}" method="POST" class="mb-3">
                    @csrf
                    <input type="text" name="content" placeholder="Tulis komentar..."
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                </form>

                @foreach ($post->comments as $comment)
                    <div class="mb-2 text-sm">
                        

                        <strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}

                        @if ($comment->user_id == auth()->id())
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="text-red-500 text-xs hover:underline ml-2">Hapus</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
</div>

@vite('resources/js/script.js')
</body>
</html>