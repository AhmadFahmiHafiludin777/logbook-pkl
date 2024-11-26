<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow sm:rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Profile</h2>
    
            <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name', auth()->user()->name) }}" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-200 ease-in-out">
                    @error('name')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
    
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email', auth()->user()->email) }}" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-200 ease-in-out">
                    @error('email')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="flex items-center">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                        Update Profile
                    </button>
                    
                </div>
            </form>

            <h2 class="text-xl font-semibold mb-4 mt-5">Update Password</h2>
            <form method="POST" action="{{ route('profile.update.password') }}" class="mt-6 space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                    <div class="relative mt-1">
                        <input id="current_password" name="current_password" type="password" required
                            class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePassword('current_password', 'eye-icon-current')">
                            <svg id="eye-icon-current" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17.94 17.94A10 10 0 0 1 12 18c-4.42 0-8-3.58-8-8 0-1.64.49-3.17 1.35-4.44" />
                                <path d="M1 1l22 22" />
                                <path d="M9.9 9.9a3 3 0 0 0 4.24 4.24" />
                                <path d="M3.51 3.51A10 10 0 0 1 12 6c4.42 0 8 3.58 8 8 0 1.64-.49 3.17-1.35 4.44M12 12a3 3 0 0 0 3-3" />
                            </svg>
                        </span>
                        @error('current_password')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <div class="relative mt-1">
                        <input id="password" name="password" type="password" required
                            class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePassword('password', 'eye-icon-new')">
                            <svg id="eye-icon-new" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                    <div class="relative mt-1">
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePassword('password_confirmation', 'eye-icon-confirm')">
                            <svg id="eye-icon-confirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                </div>

                <div class="flex items-center">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update Password
                    </button>
                    
                </div>
            </form>

        </div>
    </div>
</x-layout>

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
                <path d="M1 1l22 22" /> <!-- Garis miring -->
                <path d="M9.9 9.9a3 3 0 0 0 4.24 4.24" />
                <path d="M3.51 3.51A10 10 0 0 1 12 6c4.42 0 8 3.58 8 8 0 1.64-.49 3.17-1.35 4.44M12 12a3 3 0 0 0 3-3" />
            `;
        }
    }
</script>
