<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <form action="{{ route('angkatan.update', $angkatan->id) }}" method="POST">
        @csrf
        <div class="w-full lg:w-2/3 lg:mx-auto">
            <div class="w-full px-4 pb-8">
                <label for="name" class="text-base text-blue-400 font-bold">Tahun</label>
                <input type="text"  id="name" name="tahun" value="{{ $angkatan->tahun }}" class="w-full bg-slate-200 text-black p-3 rounded-md focus:outline-none focus:ring-blue-500 focus:ring-1 focus:border-blue-500">
            </div>
            <div class="w-full px-4">
                <button onclick="alert('Anda Yakin Data Akan Diperbarui ?')" class="text-base font-semibold text-white bg-blue-400 py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500">Tambah</button>
            </div>
        </div>
        
    </form>

    
</x-layout>