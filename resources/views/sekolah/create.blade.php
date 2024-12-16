<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="w-3/4 border border-slate-200 rounded-xl mx-auto mt-4 shadow-lg p-5">
        <form action="{{ route('sekolah.store') }}" method="POST">
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

            <fieldset class="space-y-4">
                <legend class="text-base font-bold text-blue-400">Jurusan</legend>
                @foreach ($jurusan as $item)
                    <div class="flex items-center space-x-3">
                        <input type="checkbox" id="jurusan-{{ $item->id }}" name="jurusan[]" value="{{ $item->id }}" 
                            class="w-5 h-5 rounded border-gray-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        <label for="jurusan-{{ $item->id }}" class="text-sm text-gray-600">{{ $item->kode }}</label>
                    </div>
                @endforeach
            </fieldset>

            <fieldset class="space-y-4">
                <legend class="text-base font-bold text-blue-400">Angkatan</legend>
                @foreach ($angkatan as $item)
                    <div class="flex items-center space-x-3">
                        <input type="checkbox" id="angkatan-{{ $item->id }}" name="angkatan[]" value="{{ $item->id }}" 
                            class="w-5 h-5 rounded border-gray-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        <label for="angkatan-{{ $item->id }}" class="text-sm text-gray-600">{{ $item->tahun }}</label>
                    </div>
                @endforeach
            </fieldset>
            
            
    
            <div class="w-full px-4 mt-5">
                <button type="submit" onclick="return confirm('Anda Yakin Data Akan Ditambahkan ?')" class="text-base font-semibold text-white bg-blue-400 py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500">Tambah</button>
            </div>
        </form>
    </div>
    
    
</x-layout>