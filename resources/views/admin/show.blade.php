<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    <div class="container">
        <h1 class="mt-0 text-center">Story Details</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="border-0 rounded shadow-sm card">
                    <div class="card-body">
                        <h5 class="bg-gray-200">{{ $story->category->name }}</h5>
                        <h5 class="bg-gray-200">{{ $story->title }}</h5>
                        <p>{{ $story->description }}</p>
                        <p>{{ $story->content }}</p>
                        <img src="{{ asset('storage/images/stories/' . $story->image) }}" alt="Story Image">
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
