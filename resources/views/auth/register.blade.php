<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite('resources/css/app.css')

</head>
<body>
    <div class="max-w-sm mx-auto bg-slate-50 shadow-lg rounded-lg p-8 mt-16 md:max-w-md lg:max-w-lg">
        <img class="w-10 h-15" src="{{ asset('img/logoapp.png') }}" alt="Logo">
        <h1 class="text-2xl font-bold text-center text-gray-700 mb-6">Register</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" placeholder="Your name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') is-invalid @enderror">
                @error('name')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" placeholder="name@example.com" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') is-invalid @enderror">
                @error('email')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            
            <div class="mb-4 relative">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') is-invalid @enderror">
                <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePassword('password', 'eye-icon')">
                    <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-6 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17.94 17.94A10 10 0 0 1 12 18c-4.42 0-8-3.58-8-8 0-1.64.49-3.17 1.35-4.44" />
                        <path d="M1 1l22 22" /> 
                        <path d="M9.9 9.9a3 3 0 0 0 4.24 4.24" />
                        <path d="M3.51 3.51A10 10 0 0 1 12 6c4.42 0 8 3.58 8 8 0 1.64-.49 3.17-1.35 4.44M12 12a3 3 0 0 0 3-3" />
                    </svg>
                </span>
                @error('password')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4 relative">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password_confirmation') is-invalid @enderror">
                <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePassword('password_confirmation', 'eye-icon-confirm')">
                    <svg id="eye-icon-confirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-6 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17.94 17.94A10 10 0 0 1 12 18c-4.42 0-8-3.58-8-8 0-1.64.49-3.17 1.35-4.44" />
                        <path d="M1 1l22 22" /> 
                        <path d="M9.9 9.9a3 3 0 0 0 4.24 4.24" />
                        <path d="M3.51 3.51A10 10 0 0 1 12 6c4.42 0 8 3.58 8 8 0 1.64-.49 3.17-1.35 4.44M12 12a3 3 0 0 0 3-3" />
                    </svg>
                </span>
                @error('password_confirmation')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 text-white font-medium py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Register</button>
            </div>
        </form>
        
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Already have an account?</p>
            <a href="{{ route('login') }}" class="inline-block bg-gray-100 text-blue-500 hover:bg-gray-200 px-4 py-2 rounded-md text-sm font-medium mt-2">Login</a>
        </div>
    </div>
    
    <script>
        function togglePassword(inputId, iconId) {
            var passwordField = document.getElementById(inputId);
            var eyeIcon = document.getElementById(iconId);
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.innerHTML = `
                    <path d="M1 12c1.73-3.8 5.12-6 9-6s7.27 2.2 9 6-5.12 6-9 6-7.27-2.2-9-6z" />
                    <circle cx="12" cy="12" r="3" />
                `;
            } else {
                passwordField.type = 'password';
                eyeIcon.innerHTML = `
                    <path d="M17.94 17.94A10 10 0 0 1 12 18c-4.42 0-8-3.58-8-8 0-1.64.49-3.17 1.35-4.44" />
                    <path d="M1 1l22 22" />
                    <path d="M9.9 9.9a3 3 0 0 0 4.24 4.24" />
                    <path d="M3.51 3.51A10 10 0 0 1 12 6c4.42 0 8 3.58 8 8 0 1.64-.49 3.17-1.35 4.44M12 12a3 3 0 0 0 3-3" />
                `;
            }
        }
    </script>
    
</body>
</html>