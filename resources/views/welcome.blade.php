<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-b from-blue-400 to-blue-600 h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-10 max-w-sm mx-auto text-center">
        
        <div class="mb-6">
            <img src="{{ asset('img/logoapp.png') }}" alt="Logo" class="mx-auto w-24 h-24 md:w-32 md:h-32 lg:w-40 lg:h-40">
        </div>
        
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome to Logbook PKL</h1>
        <p class="text-gray-600 mb-6">Bergabunglah bersama kami untuk merasakan layanan terbaik yang kami tawarkan. Daftar sekarang untuk memulai!</p>
        
        <div class="space-y-4">
            <a href="{{ route('login') }}" class="block bg-blue-500 text-white text-lg font-semibold py-2 rounded-md hover:bg-blue-600 transition duration-200">Login</a>
            <a href="{{ route('register') }}" class="block bg-green-500 text-white text-lg font-semibold py-2 rounded-md hover:bg-green-600 transition duration-200">Register</a>
        </div>
        
        <div class="mt-6">
            <p class="text-sm text-gray-600">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login here</a></p>
            <p class="text-sm text-gray-600">Don't have an account? <a href="{{ route('register') }}" class="text-green-500 hover:underline">Register here</a></p>
        </div>
    </div>
</body>
</html>

