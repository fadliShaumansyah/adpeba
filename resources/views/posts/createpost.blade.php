<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    

<div class="max-w-2xl mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-6">Buat Postingan Baru</h2>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Isi Postingan</label>
            <textarea name="content" id="content" rows="4"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('content') }}</textarea>
        </div>
 
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar (opsional)</label>
            <input type="file" name="image" id="image"
                class="block w-full text-sm text-gray-700 border border-gray-300 rounded cursor-pointer focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="flex items-center space-x-3">
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
</div>
</body>
</html>