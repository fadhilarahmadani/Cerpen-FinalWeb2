@include('layouts.sidebar');

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stories List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="my-4 text-center">DAFTAR LIST CERPEN</h3>
                    <hr>
                </div>

                <div class="border-0 rounded shadow-sm card">
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('story.create') }}" class="px-2 py-0 mb-3 btn btn-primary">
                        <i class="mr-2 fas fa-plus"></i>Create New Story
                    </a>
                    <table class="table table-bordered">
                        <thead class="table-success">
                            <tr class="text-center">
                                <th class="text-center" scope="col">No</th>                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                {{-- <th scope="col">Description</th>
                                <th scope="col">Content</th> --}}
                                <th scope="col">Action</th>

                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            @foreach($stories as $i => $story)
                                <tr>
                                    <td style="width: 30px;">{{ $i+1 }}</td>
                                    <td style="width: 50px;"><img src="{{ asset('storage/images/stories/' . $story->image) }}" alt="{{ $story->title }}" width="70px" height="100px"></td>
                                    <td style="width: 150px;">{{ $story->title }}</td>
                                    <td style="width: 100px;">{{ $story->category->name }}</td>
                                    {{-- <td>{{ Str::limit($story->description, 100) }}</td>
                                    <td>
                                        {{ Str::limit($story->description, 100) }}
                                        @if (strlen($story->description) > 100)
                                            <a href="{{ route('story.show', $story->id) }}">Selengkapnya</a>
                                        @endif
                                    </td>                                    <td>
                                        {{ Str::limit($story->content, 100) }}
                                        @if (strlen($story->content) > 100)
                                            <a href="{{ route('story.show', $story->id) }}">Selengkapnya</a>
                                        @endif
                                    </td> --}}
                                    <td style="width: 110px;">
                                        <a href="{{ route('story.show', $story->id) }}" class="px-2 py-0 btn btn-success">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="{{ route('story.edit', $story->id) }}" class="px-2 py-0 btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form id="deleteForm_{{ $story->id }}" action="{{ route('story.destroy', $story->id) }}" method="POST" style="display: inline-block;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete('{{ $story->id }}')" class="px-2 py-0 btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(storyId) {
            if (confirm('Are you sure you want to delete this story?')) {
                document.getElementById('deleteForm_' + storyId).submit();
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
