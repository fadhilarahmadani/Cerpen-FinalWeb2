@include('layouts.sidebar');

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cerpen</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    .bg-custom {
        background-color: #32415c;
    }
</style>
<body>
    <main class="p-7 bg-backgroundPrimary min-h-screen w-full mt-[70px]">
    <div class="flex items-center justify-between ">
        <p class="text-3xl font-bold">Stories</p>
        <a href="{{route ('stories.store')}}" class="inline-flex justify-center h-full py-3 text-base font-bold text-white rounded-md bg-primary w-36">
            <p class="-mb-[2px]">Add</p>
        </a>
    </div>

      {{-- CTA START --}}
        <div class="bg-white border mt-7 border-borderPrimary rounded-xl">
            <table class="w-full table-fixed">
                <thead class="text-left">
                    <tr class="border-b border-borderPrimary">
                        <th class="w-2/12 py-4 text-center">Image</th>
                        <th class="w-3/12">Story Name</th>
                        <th class="w-3/12">Category</th>
                        <th class="w-3/12">Description</th>
                        <th class="w-3/12">Content</th>
                        <th class="w-2/12">Action</th>
                    </tr>
                </thead>
                <tbody class="table-row-group font-semibold">
                    @foreach ($stories as $story)
                    <tr class="border-b border-borderPrimary">
                        <td class="flex justify-center py-6">
                            <div class="overflow-hidden rounded-xl">
                                <img src="{{ asset('storage/images/stories/'.$story->image) }}" alt="" width="130" />
                            </div>
                        </td>
                        <td>{{ $story->title }}</td>
                        <td>{{ Str::ucfirst($story->category->name) }}</td>
                        <td>{{ Str::ucfirst($story->description) }}</td>
                        <td>{{ $story->content }}</td>
                        <td class="h-full">
                            <div class="inline-flex rounded-lg bg-[#FAFBFD] border border-borderPrimary">
                                <a href="/stories/{{ $story->id }}/edit" class="px-4 py-2 text-black">
                                    <i class="ri-edit-box-line"></i>
                                </a>
                                <div class="w-[1px] bg-borderPrimary h-10"></div>
                                <form action="{{ route('stories.destroy', $story->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 text-red-500">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Menampilkan Previous/Next Pagination --}}
        {{-- <div class="mt-5">
            {{ $stories->links() }}
        </div>
    </main> --}}
    <div class="w-full px-6">
        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="flex items-center w-full p-3 rounded-md">
                <i class="mr-4 text-lg ri-logout-circle-line"></i>
                <span class="font-semibold">Logout</span>
            </button>
        </form>
    </div>
</body>
</html>

{{-- @section('content') --}}

{{-- @endsection --}}
