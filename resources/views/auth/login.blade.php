<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Login Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
        rel="stylesheet" />
</head>

<body style="background-color: #F7EEDD;">
    <div class="flex items-center justify-center h-screen">
        <div
            class="bg-[url('{{ asset('images/authBg.png') }}')] h-full bg-center bg-no-repeat flex justify-center items-center">
            <div
                class="bg-[#EDE4D3] rounded-3xl min-w-[500px] py-[50px] px-[57px] flex flex-col text-center text-[#202224] font-semibold shadow-lg">
                <p class="text-3xl font-bold text-black">Login to Account</p>
                <p class="mt-6 text-black">Please enter your email and password to continue</p>
                <form id="form" method="POST" action="/login" class="mt-9">
                    @csrf
                    @error('error')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                    <div class="flex flex-col text-left">
                        <label for="email" class="text-black">Email Address</label>
                        <input type="email" name="email"
                            class="mt-4 bg-[#F1F4F9] p-2 border-[#D8D8D8] border rounded-lg text-[#202224] outline-none"
                            id="email" required />
                    </div>
                    <div class="flex flex-col mt-10 text-left">
                        <div class="flex justify-between">
                            <label for="password" class="text-black">Password</label>
                            <a href="" class="text-black">Forget Password?</a>
                        </div>
                        <input type="password" name="password"
                            class="mt-4 bg-[#F1F4F9] p-2 border-[#D8D8D8] border rounded-lg text-[#202224] outline-none"
                            id="password" required />
                    </div>
                    <div class="flex items-center mt-6">
                        <input class="inline-block" type="checkbox" id="remember-me" />
                        <label for="remember-me" class="inline-block ml-3 text-black">Remember me</label>
                    </div>
                </form>
                <button form="form" type="submit"
                    class="inline py-3 mt-10 font-bold text-white transition bg-[#FF7F50] rounded-lg hover:bg-[#a45437]">
                    Sign In
                </button>
                <p class="mt-6 text-black">Not have an account?</p>
                <a href="{{ route('register') }}"
                    class="inline px-4 py-2 font-bold text-black transition bg-transparent border border-[#a45437] rounded-lg hover:bg-[#a45437] hover:text-white">
                    sign Up
                </a>
            </div>
        </div>
    </div>
</body>

</html>
