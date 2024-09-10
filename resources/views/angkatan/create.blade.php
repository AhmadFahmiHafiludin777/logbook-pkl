<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="w-3/4 border border-slate-200 rounded-xl mx-auto mt-4 shadow-lg  p-5">
        <form action="{{ route('angkatan.store') }}" method="POST">
            @csrf
            <label for="email">
                <span class="text-base block font-bold mb-1 text-blue-400">Tahun</span>
                <input type="text" id="name" name="tahun" placeholder="masukkan tahun..."  class="h-12 px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            </label>
            @error('tahun')
            <p class="text-red-500 ml-1 text-sm mt-2">{{ $message }}</p>
                
            @enderror

            <div class="w-full px-4 mt-5">
                <button onclick="alert('Anda Yakin Data Akan Ditambahkan ?')" class="text-base font-semibold text-white bg-blue-400 py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500">Tambah</button>
            </div>
        </form>

        

    </div>
    
</x-layout>