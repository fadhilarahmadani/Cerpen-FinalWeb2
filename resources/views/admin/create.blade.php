<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Story</title>
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
        <h1 class="text-2xl font-bold text-center">Create Story</h1>
        <div class="flex justify-center">
            <div class="w-full max-w-10rem">
                <div class="p-6 rounded-lg shadow-md bg-form">
                    <form method="POST" action="{{ route('story.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="block font-bold">Title</label>
                            <input type="text" class="mt-1 block w-full border  rounded-md @error('title') border-red-500 @enderror" name="title" value="{{ old('title') }}" placeholder="Enter Story Title">
                            @error('title')
                                <div class="mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold">Category</label>
                            @foreach($categories as $category)
                                <div class="inline-flex items-center">
                                    <input class="form-check-input" type="radio" name="category_id" id="category_{{ $category->id }}" value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'checked' : '' }}>
                                    <label class="ml-2" for="category_{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                            @endforeach

                            @error('category_id')
                                <div class="mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold">Description</label>
                            <textarea class="mt-1 block w-full border  rounded-md @error('description') border-red-500 @enderror" name="description" rows="5" placeholder="Enter Story Description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold">Content</label>
                            <textarea class="mt-1 block w-full border  rounded-md @error('content') border-red-500 @enderror" name="content" rows="5" placeholder="Enter Story Content"">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold">Image</label>
                            <input type="file" class="mt-1 block w-full border  rounded-md @error('image') border-red-500 @enderror" name="image">
                            @error('image')
                                <div class="mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="is_premium" value="1" {{ old('is_premium') ? 'checked' : '' }}>
                                <span class="ml-2">Premium Story</span>
                            </label>
                        </div>

                        <button type="submit" class="w-full py-2 font-bold text-white rounded btn-custom">
                            Create Story
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
