@include('layouts.sidebar');
{{-- @include('layouts.app'); --}}

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
                    <h3 class="my-4 text-center">Short Stories List</h3>
                    <hr>
                </div>

                <div class="border-0 rounded shadow-sm card">
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('story.create') }}" class="px-4 py-2 mb-3 btn btn-primary">
                        <i class="mr-2 fas fa-plus"></i>Create New Story
                    </a>

                    <div class="bg-white border mt-7 border-borderPrimary rounded-xl">

                        <table class="w-full table-fixed">
                            <thead class="text-left" style="background-color: #ede4d3;">

                                <tr class="border-b border-borderPrimary">
                                    {{-- <th class="text-center" scope="col">No</th> --}}
                                    <th class="w-2/12 py-4 text-center ">Image</th>
                                    <th class="w-3/12">Title</th>
                                    <th class="w-3/12">Category</th>
                                    <th class="w-2/12">Action</th>
                                </tr>
                            </thead>

                            <tbody class="table-row-group font-semibold">
                                @foreach($stories as $i => $story)
                                <tr class="border-b border-borderPrimary">
                                    {{-- <td style="width: 30px;">{{ $i+1 }}</td> --}}
                                    <td class="px-16 py-2"><img src="{{ asset('storage/images/stories/' . $story->image) }}" alt="{{ $story->title }}" width="70px" height="100px"></td>
                                    <td style="width: 150px;">{{ $story->title }}</td>
                                    <td style="width: 100px;">{{ $story->category->name }}</td>
                                    <td style="width: 100px;">
                                        {{-- <a href="{{ route('story.show', $story->id) }}" class="px-2 py-0 btn btn-success">
                                            <i class="fas fa-info-circle"></i>
                                        </a> --}}
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
                    <div class="mt-4">
                        {{ $stories->links() }}
                    </div>
                </div>
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
