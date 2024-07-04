<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Story</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    <div class="container">
        <h1 class="mt-0 text-center">Edit Story</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="border-0 rounded shadow-sm card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('story.update', $story->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3 form-group">
                                <label class="font-weight-bold">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $story->title }}" placeholder="Masukkan Judul Story">
                                @error('title')
                                    <div class="mt-2 alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label class="font-weight-bold">Category</label><br>
                                @foreach($categories as $category)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="category_id" id="category_{{ $category->id }}" value="{{ $category->id }}" {{ old('category_id', $story->category_id) == $category->id ? 'checked' : '' }}>
                                        <label class="form-check-label" for="category_{{ $category->id }}">{{ $category->name }}</label>
                                    </div>
                                @endforeach

                                @error('category_id')
                                    <div class="mt-2 alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label class="font-weight-bold">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Masukkan Deskripsi Story">{{ $story->description }}</textarea>
                                @error('description')
                                    <div class="mt-2 alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label class="font-weight-bold">Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan Konten Story">{{ $story->content }}</textarea>
                                @error('content')
                                    <div class="mt-2 alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label class="font-weight-bold">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <div class="mt-2 alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Story</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js"></script>
</body>
</html>
