<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-extrabold mb-6 text-gray-900">Detail Pembimbng Sekolah</h1>

        <div class="bg-white shadow-lg rounded-lg border border-gray-200 p-6">
            <h2 class="text-2xl font-semibold text-gray-800">{{ $pembimbingSekolah->nama }}</h2>
            
            <div class="mt-4 space-y-2">
                <p class="text-gray-600">
                    <strong class="font-medium">No Telepon:</strong> {{ $pembimbingSekolah->no_telp }}
                </p>

                <p class="text-gray-600">
                    <strong class="font-medium">Daftar Siswa yang Dibimbing:</strong>
                    @if($siswa->isNotEmpty())
                        <ul class="list-disc pl-5 space-y-2">
                            @foreach($siswa as $item)
                                <li class="text-gray-600">{{ $item->nama }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">Belum ada siswa yang dibimbing oleh pembimbing ini.</p>
                    @endif
                </p>

                <p class="text-gray-600">
                    <strong class="font-medium">CREATED_AT:</strong> {{ $pembimbingSekolah->created_at }}
                </p>
                <p class="text-gray-600">
                    <strong class="font-medium">UPDATED_AT:</strong> {{ $pembimbingSekolah->updated_at }}
                </p>
            </div>

            <div class="mt-6 flex space-x-2">
                <a href="{{ route('pembimbingSekolah.index') }}" class="bg-blue-600 text-white px-5 py-3 rounded-lg shadow hover:bg-blue-700 transition duration-150 ease-in-out">
                    Kembali ke Daftar Pembimbing Sekolah
                </a>
                
            </div>
        </div>
    </div>
</x-layout>
