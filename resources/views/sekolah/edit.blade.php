<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="w-3/4 border border-slate-200 rounded-xl mx-auto mt-4 shadow-lg  p-5">
        <form action="{{ route('sekolah.update', $sekolah->id) }}" method="POST">
            @csrf
            <label for="nama" class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">Nama</span>
                <input type="text" id="nama" name="nama" placeholder="masukkan nama..." value="{{ $sekolah->nama }}" class="h-12 px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            </label>
            <label for="email" class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">Email</span>
                <input type="text" id="email" name="email" placeholder="masukkan email..." value="{{ $sekolah->email }}" class="h-12 px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            </label>
            <label for="no_telp" class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">No Telepon</span>
                <input type="text" id="no_telp" name="no_telp" placeholder="masukkan no telepon..." value="{{ $sekolah->no_telp }}" class="h-12 px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            </label>
            <label for="alamat" class="block mb-4">
                <span class="text-base block font-bold mb-1 text-blue-400">Alamat</span>
                <input type="text" id="alamat" name="alamat" placeholder="masukkan alamat..." value="{{ $sekolah->alamat }}" class="h-12 px-3 py-2 border shadow rounded w-full block text-sm placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            </label>

            <div class="w-full px-4 mt-5">
                <button onclick="alert('Anda Yakin Data Akan Diperbarui ?')" class="text-base font-semibold text-white bg-blue-400 py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500">Edit</button>
            </div>
        </form>

        

    </div>

    
</x-layout>