<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="w-3/4 border border-slate-200 rounded-xl mx-auto mt-4 shadow-lg  p-5">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <label for="name" class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">Nama</span>
                <input type="text" id="name" name="name" placeholder="masukkan nama..."  class="h-12 px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            </label>
            @error('name')
            <p class="text-red-500 ml-1 text-sm mt-1 mb-1">{{ $message }}</p>
                
            @enderror

            <label for="email" class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">Email</span>
                <input type="text" id="email" name="email" placeholder="masukkan email..." class="h-12 px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            </label>
            @error('email')
            <p class="text-red-500 text-sm mt-1 mb-1 ml-1">{{ $message }}</p>
                
            @enderror

            <label class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">Roles</span>
                <div class="mt-2 space-y-2">
                    @foreach($roles as $role)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" 
                                   {{ in_array($role->id, $userRoles ?? []) ? 'checked' : '' }}
                                   class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700">{{ $role->name }}</span>
                        </label>
                    @endforeach
                </div>
            </label>
            @error('roles')
            <p class="text-red-500 text-sm mt-1 mb-1 ml-1">{{ $message }}</p>
                
            @enderror


            <label for="password" class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">Password</span>
                <input type="password" id="password" name="password" placeholder="masukkan password..." class="h-12 px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            </label>
            @error('password')
                <p class="text-red-500 text-sm mt-1 mb-1 ml-1">{{ $message }}</p>
            @enderror

            <label for="password_confirmation" class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">Konfirmasi Password</span>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="masukkan ulang password..." class="h-12 px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            </label>
            @error('password_confirmation')
                <p class="text-red-500 text-sm mt-1 mb-1 ml-1">{{ $message }}</p>
            @enderror


            <div class="w-full px-4 mt-5">
                <button type="submit" onclick="return confirm('Anda Yakin Data Akan Ditambahkan ?')" class="text-base font-semibold text-white bg-blue-400 py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500">Tambah</button>
            </div>
        </form>

        

    </div>
    
</x-layout>