<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-b from-blue-400 to-blue-600 h-screen flex flex-col items-center justify-center">
    
    <!-- Gambar Logo -->
    <div class="mb-6">
        <img src="{{ asset('img/logoapp.png') }}" alt="Logo" class="w-24 h-24 md:w-32 md:h-32 lg:w-40 lg:h-40 rounded-full shadow-lg">
    </div>

    <!-- Teks Welcome -->
    <h1 class="text-4xl font-extrabold text-white mb-4">Welcome to Logbook PKL</h1>
    <p class="text-gray-200 mb-8 text-center max-w-md">Bergabunglah bersama kami dan rasakan layanan terbaik yang kami tawarkan. Daftar sekarang untuk memulai!</p>

    <!-- Tombol Login dan Register -->
    <div class="space-y-4 w-full max-w-xs">
        <a href="{{ route('login') }}" class="block bg-sky-500 text-white text-lg font-semibold py-3 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out shadow-md hover:shadow-lg text-center">Login</a>
        <a href="{{ route('register') }}" class="block bg-green-500 text-white text-lg font-semibold py-3 rounded-lg hover:bg-green-600 transition duration-300 ease-in-out shadow-md hover:shadow-lg text-center">Register</a>
    </div>

    <!-- Teks Tambahan -->
    <div class="mt-8 text-center">
        <p class="text-sm text-gray-300">Already have an account? <a href="{{ route('login') }}" class="text-sky-500 font-semibold hover:underline transition duration-200">Login here</a></p>
        <p class="text-sm text-gray-300">Don't have an account? <a href="{{ route('register') }}" class="text-green-200 font-semibold hover:underline transition duration-200">Register here</a></p>
    </div>
    
</body>
</html>
