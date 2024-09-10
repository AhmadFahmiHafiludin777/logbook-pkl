<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="flex items-center justify-between">
        <h4 class="text-3xl">List Angkatan</h4>
        
        <div class="">
            <a href="{{ route('angkatan.create') }}" class="rounded-sm bg-blue-500 text-white px-4 py-2 hover:border hover:border-sky-300 transition duration-300">+ Tambah Angkatan</a>
        </div>
    </div>
    
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="w-full bg-blue-500 border-b">
                    <th class="py-3 px-6 text-left font-medium text-white uppercase">ID</th>
                    <th class="py-3 px-6 text-center font-medium text-white uppercase">Tahun</th>
                    <th class="py-3 px-6 text-center font-medium text-white uppercase">aksi</th>

                </tr>
            </thead>
            <tbody>
                @foreach($angkatan as $data)
                <tr class="border-b hover:bg-gray-50 transition duration-300">
                    <td class="py-3 px-6 text-left text-gray-700 font-semibold">{{ $data->id }}</td>
                    <td class="py-3 px-6 text-center text-gray-700">{{ $data->tahun }}</td>
                    <td class="py-3 px-6 text-center text-gray-700 flex items-center justify-center space-x-2">
                        <a href="{{ route('angkatan.show', $data->id) }}" class="rounded-md bg-sky-500 text-white px-2 py-1 hover:border hover:border-sky-600 transition duration-300" >Lihat</a>
                        <a href="{{ route('angkatan.edit', $data->id) }}" class="rounded-md bg-yellow-500 text-white px-2 py-1 hover:border hover:border-yellow-600 transition duration-300 ">Edit</a>
                        
                        <form action="{{ route('angkatan.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="bg-red-600 rounded-md text-white px-2 py-1 hover:border hover:border-red-800 transition duration-300">Hapus</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $angkatan->links() }}
        </div>
    </div>
</x-layout>