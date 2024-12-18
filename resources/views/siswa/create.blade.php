<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-3/4 border border-slate-200 rounded-xl mx-auto mt-4 shadow-lg p-5">
        <form action="{{ route('siswa.store') }}" method="POST">
            @csrf
            <label for="nama" class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">Nama</span>
                <input type="text" id="nama" name="nama" placeholder="masukkan nama..." class="h-12 px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            </label>
            @error('nama')
            <p class="text-red-500 text-sm mt-2 ml-1">{{ $message }}</p>
                
            @enderror
            <label for="email" class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">Email</span>
                <input type="text" id="email" name="email" placeholder="masukkan email..." class="h-12 px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            </label>
            @error('email')
            <p class="text-red-500 text-sm mt-2 ml-1">{{ $message }}</p>
                
            @enderror
            <label for="no_telp" class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">No Telepon</span>
                <input type="text" id="no_telp" name="no_telp" placeholder="masukkan nomor telepon..." class="h-12 px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            </label>
            @error('no_telp')
            <p class="text-red-500 text-sm mt-2 ml-1">{{ $message }}</p>
                
            @enderror
            <label for="alamat" class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">Alamat</span>
                <input type="text" id="alamat" name="alamat" placeholder="masukkan alamat..." class="h-12 px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            </label>
            @error('alamat')
            <p class="text-red-500 text-sm mt-2 ml-1">{{ $message }}</p>
                
            @enderror

            <label for="angkatan_jurusan_sekolah_id" class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">Angkatan Jurusan Sekolah</span>
                <select name="angkatan_jurusan_sekolah_id" id="angkatan_jurusan_sekolah_id" class="h-12 px-3 py-2 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
                    <option value="" disabled selected>-- Pilih Angkatan Jurusan Sekolah --</option>
                    @foreach ($angkatanJurusanSekolah as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->angkatan->tahun }} - {{ $item->jurusanSekolah->sekolah->nama }} - {{ $item->jurusanSekolah->jurusan->kode }}
                        </option>
                    @endforeach
                </select>
            </label>
            @error('angkatan_jurusan_sekolah_id')
            <p class="text-red-500 text-sm mt-2 ml-1">{{ $message }}</p>
            @enderror

            <label for="pembimbing_lapangan_id" class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">Pembimbing Lapangan</span>
                <select name="pembimbing_lapangan_id" id="pembimbing_lapangan_id" class="h-12 px-3 py-2 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
                    <option value="" disabled selected>-- Pilih Pembimbing Lapangan --</option>
                    @foreach ($pembimbingLapangan as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </label>
            @error('pembimbing_lapangan_id')
            <p class="text-red-500 text-sm mt-2 ml-1">{{ $message }}</p>
            @enderror

            <label for="pembimbing_sekolah_id" class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">Pembimbing Sekolah</span>
                <select name="pembimbing_sekolah_id" id="pembimbing_sekolah_id" class="h-12 px-3 py-2 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
                    <option value="" disabled selected>-- Pilih Pembimbing Sekolah --</option>
                    @foreach ($pembimbingSekolah as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </label>
            @error('pembimbing_sekolah_id')
            <p class="text-red-500 text-sm mt-2 ml-1">{{ $message }}</p>
            @enderror
    
            <div class="w-full px-4 mt-5">
                <button onclick="alert('Anda Yakin Data Akan Ditambahkan ?')" class="text-base font-semibold text-white bg-blue-400 py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500">Tambah</button>
            </div>
        </form>
    </div>
    
    
</x-layout>
