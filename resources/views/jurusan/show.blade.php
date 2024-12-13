<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-extrabold mb-6 text-gray-900">Detail Jurusan</h1>

        <div class="bg-white shadow-lg rounded-lg border border-gray-200 p-6">
            <h2 class="text-2xl font-semibold text-gray-800">Jurusan {{ $jurusan->kode }}</h2>
            
            <div class="mt-4 space-y-2">
                <p class="text-gray-600">
                    <strong class="font-medium">Nama</strong> {{ $jurusan->nama }}
                </p>

                <p class="text-gray-600">
                    <strong class="font-medium">Sekolah:</strong>
                    <ul class="list-disc ml-6">
                        @foreach ($jurusan->sekolah as $item)
                            <li>{{ $item->nama }}</li>
                        @endforeach
                    </ul>
                </p>

                <p class="text-gray-600">
                    <strong class="font-medium">CREATED_AT:</strong> {{ $jurusan->created_at }}
                </p>
                <p class="text-gray-600">
                    <strong class="font-medium">UPDATED_AT:</strong> {{ $jurusan->updated_at }}
                </p>
            </div>

            <div class="mt-6 flex space-x-2">
                <a href="{{ route('jurusan.index') }}" class="bg-blue-600 text-white px-5 py-3 rounded-lg shadow hover:bg-blue-700 transition duration-150 ease-in-out">
                    Kembali ke Daftar Jurusan
                </a>
                
            </div>
        </div>
    </div>
</x-layout>
