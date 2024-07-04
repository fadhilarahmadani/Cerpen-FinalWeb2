<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Story</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    <div class="container">
        <h1 class="mt-0 text-center">Create New Story</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="border-0 rounded shadow-sm card">
                    <div class="card-body">
                        <form action="{{ route('story.store') }}" method="POST" enctype="multipart/form-data" id="form">
                            @csrf

                            <div class="mb-3 form-group">
                                <label class="font-weight-bold">TITLE</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Story">

                                @error('title')
                                    <div class="mt-2 alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label class="font-weight-bold">Category</label>
                                <div class="flex gap-1">
                                    @foreach ($categories as $category)
                                        <div>
                                            <input type="radio" name="category_id" id="{{ $category->name }}" class="hidden peer" value="{{ $category->id }}" />
                                            <label role="button" for="{{ $category->name }}" tabindex="0" class="peer-checked:text-white bg-[#D9D9D9] peer-checked:bg-primary px-6 py-2 text-base rounded-md">
                                                {{ Str::ucfirst($category->name) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('category_id')
                                    <div>
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label class="font-weight-bold">DESCRIPTION</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Masukkan Description Story">{{ old('description') }}</textarea>

                                @error('description')
                                    <div class="mt-2 alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label class="font-weight-bold">Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan Content Story">{{ old('content') }}</textarea>

                                @error('content')
                                    <div class="mt-2 alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label class="font-weight-bold">IMAGE</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                                @error('image')
                                    <div class="mt-2 alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary" form="form">Add Story</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
