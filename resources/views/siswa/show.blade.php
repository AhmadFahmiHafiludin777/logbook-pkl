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

                <p class="text-gray-600"><strong>Angkatan:</strong> {{ $angkatanJurusanSekolah->angkatan->tahun }}</p>
                <p class="text-gray-600"><strong>Jurusan:</strong> {{ $angkatanJurusanSekolah->jurusanSekolah->jurusan->kode }}</p>
                <p class="text-gray-600"><strong>Sekolah:</strong> {{ $angkatanJurusanSekolah->jurusanSekolah->sekolah->nama }}</p>
                <p class="text-gray-600"><strong>Pembimbing Lapangan:</strong> {{ $pembimbingLapangan->nama }}</p>
                <p class="text-gray-600"><strong>Pembimbing Sekolah:</strong> {{ $pembimbingSekolah->nama }}</p>


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
