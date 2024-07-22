<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet" />
</head>

<body style="background-color: #F7EEDD;">
    <div class="flex items-center justify-center h-screen">
            <div class="bg-[#EDE4D3] rounded-3xl min-w-[500px] py-[10px] px-[57px] flex flex-col text-center text-[#202224] font-semibold shadow-lg">
                <p class="text-3xl font-bold text-black">Create an Account</p>
                <p class="mt-6 text-black">Please fill in the details to register</p>
                <form id="form" method="POST" action="{{ route('register') }}" class="mt-9">
                    @csrf
                    @error('error')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                    <div class="flex flex-col text-left">
                        <label for="name" class="text-black">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="mt-4 bg-[#F1F4F9] p-2 border-[#D8D8D8] border rounded-lg text-[#202224] outline-none"
                            id="name" required />
                        @error('name')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col mt-6 text-left">
                        <label for="email" class="text-black">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="mt-4 bg-[#F1F4F9] p-2 border-[#D8D8D8] border rounded-lg text-[#202224] outline-none"
                            id="email" required />
                        @error('email')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col mt-6 text-left">
                        <label for="password" class="text-black">Password</label>
                        <input type="password" name="password"
                            class="mt-4 bg-[#F1F4F9] p-2 border-[#D8D8D8] border rounded-lg text-[#202224] outline-none"
                            id="password" required />
                        @error('password')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col mt-6 text-left">
                        <label for="password_confirmation" class="text-black">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                            class="mt-4 bg-[#F1F4F9] p-2 border-[#D8D8D8] border rounded-lg text-[#202224] outline-none"
                            id="password_confirmation" required />
                        @error('password_confirmation')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
                <button form="form" type="submit"
                    class="inline py-3 mt-10 font-bold text-white transition bg-[#FF7F50] hover:bg-[#a45437]">
                    Sign Up
                </button>
                <p class="mt-6 text-black">Already have an account?</p>
                <a href="{{ route('login') }}"
                class="inline px-4 py-2 font-bold text-black transition bg-transparent border border-[#a45437] rounded-lg hover:bg-[#a45437] hover:text-white">
                    Sign In
                </a>
            </div>
        </div>
    </div>
</body>

</html>
