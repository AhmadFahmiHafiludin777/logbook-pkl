<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-extrabold mb-6 text-gray-900">Detail Angkatan</h1>

        <div class="bg-white shadow-lg rounded-lg border border-gray-200 p-6">
            <h2 class="text-2xl font-semibold text-gray-800">Angkatan Tahun {{ $angkatan->tahun }}</h2>
            
            <div class="mt-4 space-y-2">
                <p class="text-gray-600">
                    <strong class="font-medium">Sekolah dan Jurusan:</strong>
                    <ul class="list-disc ml-6">
                        @foreach ($angkatan->angkatanJurusanSekolah as $angkatanJurusanSekolah)
                            <li>
                            
                                <span class="font-semibold">{{ $angkatanJurusanSekolah->jurusanSekolah->sekolah->nama }}</span>
                                <ul class="list-disc ml-6 mt-2">
                                    
                                    @foreach ($angkatanJurusanSekolah->jurusanSekolah->sekolah->jurusan as $jurusan)
                                        <li>{{ $jurusan->kode }}</li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </p>

                <p class="text-gray-600">
                    <strong class="font-medium">CREATED_AT:</strong> {{ $angkatan->created_at }}
                </p>
                <p class="text-gray-600">
                    <strong class="font-medium">UPDATED_AT:</strong> {{ $angkatan->updated_at }}
                </p>
            </div>

            <div class="mt-6 flex space-x-2">
                <a href="{{ route('angkatan.index') }}" class="bg-blue-600 text-white px-5 py-3 rounded-lg shadow hover:bg-blue-700 transition duration-150 ease-in-out">
                    Kembali ke Daftar Angkatan
                </a>
            </div>
        </div>
    </div>
</x-layout>
