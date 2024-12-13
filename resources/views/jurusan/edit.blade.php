<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="w-3/4 border border-slate-200 rounded-xl mx-auto mt-4 shadow-lg  p-5">
        <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="kode">
                <span class="text-base block font-bold mb-1 text-blue-400">Kode</span>
                <input type="kode" id="kode" name="kode" placeholder="masukkan tahun..." value="{{ $jurusan->kode }}" class="h-12 px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            </label>
            @error('kode')
            <p class="text-red-500 text-sm ml-1 mt-2">{{ $message }}</p>
                
            @enderror

            <label for="nama">
                <span class="text-base block font-bold mb-1 text-blue-400">Nama</span>
                <input type="text" id="nama" name="nama" placeholder="masukkan tahun..." value="{{ $jurusan->nama }}" class="h-12 px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            </label>
            @error('nama')
            <p class="text-red-500 text-sm ml-1 mt-2">{{ $message }}</p>
                
            @enderror

            <div class="w-full px-4 mt-5">
                <button type="submit" onclick="return confirm('Anda Yakin Data Akan Diperbarui ?')" class="text-base font-semibold text-white bg-blue-400 py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500">Update</button>
            </div>
        </form>

        

    </div>

    
</x-layout>