<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-extrabold mb-6 text-gray-900">Detail Siswa</h1>

        <div class="bg-white shadow-lg rounded-lg border border-gray-200 p-6">
            <h2 class="text-2xl font-semibold text-gray-800">{{ $siswa->nama }}</h2>
            
            <div class="mt-4 space-y-2">
                <p class="text-gray-600">
                    <strong class="font-medium">Email:</strong> {{ $siswa->email }}
                </p>
                <p class="text-gray-600">
                    <strong class="font-medium">No. Telepon:</strong> {{ $siswa->no_telp }}
                </p>
                <p class="text-gray-600">
                    <strong class="font-medium">Alamat:</strong> {{ $siswa->alamat }}
                </p>
                <p class="text-gray-600">
                    <strong class="font-medium">CREATED_AT:</strong> {{ $siswa->created_at->format('d M Y, H:i') }}
                </p>
                <p class="text-gray-600">
                    <strong class="font-medium">UPDATED_AT:</strong> {{ $siswa->updated_at->format('d M Y, H:i') }}
                </p>
            </div>

            <div class="mt-6 flex space-x-2">
                <a href="{{ route('siswa.index') }}" class="bg-blue-600 text-white px-5 py-3 rounded-lg shadow hover:bg-blue-700 transition duration-150 ease-in-out">
                    Kembali ke Daftar Siswa
                </a>
                
            </div>
        </div>
    </div>
</x-layout>
