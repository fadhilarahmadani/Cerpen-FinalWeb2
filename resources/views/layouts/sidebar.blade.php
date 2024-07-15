<aside class="py-6 w-[240px] bg-white h-screen fixed">
    <div class="flex flex-col items-center justify-between w-full h-full">

        <div class="w-full px-6">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="flex items-center w-full p-3 rounded-md">
                    <i class="mr-4 text-lg ri-logout-circle-line"></i>
                    <span class="font-semibold">Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>
