<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Story</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<style>
    .btn-custom {
        background-color: #FF7F50;
    }
    .btn-custom:hover {
        background-color: #a45437;
    }
    .bg-form {
            background-color: #EDE4D3;
        }
</style>
<body style="background-color: #F7EEDD;">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold text-center">Edit Story</h1>
        <div class="flex justify-center">
            <div class="w-full max-w-10rem">
                <div class="p-6 rounded-lg shadow-md bg-form">
                    <form method="POST" action="{{ route('story.update', $story->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block font-bold">Title</label>
                            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md @error('title') border-red-500 @enderror" name="title" value="{{ $story->title }}" placeholder="Masukkan Judul Story">
                            @error('title')
                                <div class="mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold">Category</label>
                            @foreach($categories as $category)
                                <div class="inline-flex items-center">
                                    <input class="form-check-input" type="radio" name="category_id" id="category_{{ $category->id }}" value="{{ $category->id }}" {{ old('category_id', $story->category_id) == $category->id ? 'checked' : '' }}>
                                    <label class="ml-2" for="category_{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                            @endforeach

                            @error('category_id')
                                <div class="mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold">Description</label>
                            <textarea class="mt-1 block w-full border border-gray-300 rounded-md @error('description') border-red-500 @enderror" name="description" rows="5" placeholder="Masukkan Deskripsi Story">{{ $story->description }}</textarea>
                            @error('description')
                                <div class="mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold">Content</label>
                            <textarea class="mt-1 block w-full border border-gray-300 rounded-md @error('content') border-red-500 @enderror" name="content" rows="5" placeholder="Masukkan Konten Story">{{ $story->content }}</textarea>
                            @error('content')
                                <div class="mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold">Image</label>
                            <input type="file" class="mt-1 block w-full border border-gray-300 rounded-md @error('image') border-red-500 @enderror" name="image">
                            @error('image')
                                <div class="mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="is_premium" value="1" {{ $story->is_premium ? 'checked' : '' }}>
                                <span class="ml-2">Premium Story</span>
                            </label>
                        </div>
                        <button type="submit" class="w-full py-2 font-bold text-white rounded btn-custom">
                            Update Story                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
