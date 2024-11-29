<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-extrabold mb-6 text-gray-900">Detail User</h1>

        <div class="bg-white shadow-lg rounded-lg border border-gray-200 p-6">
            <h2 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h2>
            
            <div class="mt-4 space-y-2">
                <p class="text-gray-600">
                    <strong class="font-medium">Email :</strong> {{ $user->email }}
                </p>
                <p class="text-gray-600">
                    <strong class="font-medium">Roles:</strong>
                    @if ($user->roles->isEmpty())
                        <span class="text-red-500">User belum memiliki role</span>
                    @else
                        <ul class="list-disc list-inside text-gray-800 mt-2">
                            @foreach ($user->roles as $role)
                                <li>{{ $role->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </p>
                <p class="text-gray-600">
                    <strong class="font-medium">CREATED_AT :</strong> {{ $user->created_at }}
                </p>
                <p class="text-gray-600">
                    <strong class="font-medium">UPDATED_AT :</strong> {{ $user->updated_at }}
                </p>
            </div>

            <div class="mt-6 flex space-x-2">
                <a href="{{ route('user.index') }}" class="bg-blue-600 text-white px-5 py-3 rounded-lg shadow hover:bg-blue-700 transition duration-150 ease-in-out">
                    Kembali ke Daftar User
                </a>
                
            </div>

        </div>
    </div>
</x-layout>