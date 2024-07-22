<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color:#F7EEDD;
        }
        .btn-custom {
        background-color: #FF7F50;
    }
    .btn-custom:hover {
        background-color: #a45437;
    }
    </style>
</head>
<body class="flex items-center justify-center h-screen">
    <div class="w-full max-w-sm p-8 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center text-[#293247] mb-4">Subscribe to Premium</h1>
        <p class="mb-6 text-center text-gray-700">Subscribe to access premium stories and enjoy unlimited reading!</p>
        <form action="{{ route('subscribe') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="plan" class="block text-sm font-medium text-gray-700">Choose a Plan:</label>
                <select name="plan" id="plan" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-[#FADO6C] focus:border-[#FADO6C]">
                    <option value="monthly">Monthly - $10</option>
                    <option value="yearly">Yearly - $100</option>
                </select>
            </div>
            {{-- <button type="submit" class="w-full py-2 px-4 bg-[#FF7F50] text-black rounded-md">
                Subscribe Now
            </button> --}}
            <button type="submit" class="w-full py-2 font-bold text-white rounded btn-custom">
                Subscribe Now</button>

        </form>
    </div>
</body>
</html>
