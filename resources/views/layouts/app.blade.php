<header>
    <div class="fixed z-10 p-2 px-12 navbar bg-base-100">
        <div class="flex-1">
            <div class="flex items-center px-12">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-12 h-12">
                <a class="ml-4 btn btn-ghost font-32">Cerpen</a>
            </div>
        </div>
        <div class="flex-none gap-2">
          <div class="form-control">
            <input type="text" placeholder="Search" class="w-24 input input-bordered md:w-auto" />
          </div>
          <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
              <div class="w-10 rounded-full">
                <img alt="Tailwind CSS Navbar component" src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
              </div>
            </div>
            <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
              <li>
                <a class="justify-between">
                  Profile
                  <span class="badge">New</span>
                </a>
              </li>
              <li><a>Settings</a></li>
              <li>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="flex items-center w-full p-3 rounded-md">
                        <i class="mr-4 text-lg ri-logout-circle-line"></i>
                        <span class="font-semibold">Logout</span>
                    </button>
                </form></li>
            </ul>
          </div>
        </div>
      </div>
  </header>
