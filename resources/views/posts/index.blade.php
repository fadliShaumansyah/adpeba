<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>

<div class="max-w-3xl mx-auto px-4 py-6">
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
    
        <div class="bg-white shadow rounded-lg mb-6 p-4">
            <div class="flex items-center justify-between mb-2">
                <div>
                    <strong>{{ $post->user->name }}</strong>
                    <span class="text-sm text-gray-500">• {{ $post->created_at->diffForHumans() }}</span>
                </div>
            </div>
            <div class="mb-3">
                @if ($post->image)
                    <img src="{{ $post->image }}" class="w-full rounded mb-2" alt="Post Image">
                @endif
                <p class="text-gray-800">{{ $post->content }}</p>
            </div>

            <div class="flex items-center space-x-4">
                {{-- Like button --}}
                <form action="{{ route('posts.like', $post) }}" method="POST">
                    @csrf
                    <button class="flex items-center text-sm text-blue-600 hover:text-blue-800">
                        👍 {{ $post->likes->count() }}
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
</body>
</html>