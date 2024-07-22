<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Navbar</title>
</head>
<body>
<header>
    <div class="fixed z-10 flex items-center justify-between w-full p-4 bg-white shadow-md">
        <div class="flex items-center">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="w-12 h-12">
            <span href="#" class="ml-4 text-2xl font-bold text-gray-800">Cerpen</span>
        </div>
        <div class="flex items-center gap-4">
            <form action="{{ route('search') }}" method="GET" class="flex items-center">
                <input type="search" name="query" placeholder="Search" class="w-24 md:w-auto input input-bordered" value="{{ request('query') }}" />
            </form>
            <div class="relative">
                <button type="button" class="flex items-center justify-center w-10 h-10 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('user.png') }}" alt="User Avatar">
                </button>
                <div class="absolute right-0 z-20 hidden p-4 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none w-60" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" id="user-menu">
                    <div class="py-1" role="none">
                        @if (Auth::check())
                            <span class="block px-4 py-2 text-sm text-black" role="menuitem">Profile : {{ Auth::user()->name }}</span>
                            <form method="POST" action="/logout" role="none">
                                @csrf
                                <button type="submit" class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100" role="menuitem">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="block px-2 py-1 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.getElementById('user-menu-button').addEventListener('click', function() {
        document.getElementById('user-menu').classList.toggle('hidden');
    });
</script>
</body>
</html>
