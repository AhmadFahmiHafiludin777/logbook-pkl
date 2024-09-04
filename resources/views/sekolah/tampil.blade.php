<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="flex items-center justify-between">
        <h4 class="text-3xl">List Sekolah</h4>
        <div class="">
            <a href="{{ route('sekolah.tambah') }}" class="rounded-sm bg-blue-500 text-white px-4 py-2 hover:border hover:border-sky-300 transition duration-300">+ Tambah Sekolah</a>
        </div>
    </div>
    
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="w-full bg-blue-500 border-b">
                    <th class="py-3 px-6 text-left font-medium text-white uppercase">ID</th>
                    <th class="py-3 px-6 text-left font-medium text-white uppercase">nama</th>
                    <th class="py-3 px-6 text-left font-medium text-white uppercase">email</th>
                    <th class="py-3 px-6 text-left font-medium text-white uppercase">no_telp</th>
                    <th class="py-3 px-6 text-left font-medium text-white uppercase">alamat</th>
                    <th class="py-3 px-6 text-left font-medium text-white uppercase">aksi</th>

                </tr>
            </thead>
            <tbody>
                @foreach($sekolah as $data)
                <tr class="border-b hover:bg-gray-50 transition duration-300">
                    <td class="py-3 px-6 text-gray-700 font-semibold">{{ $data->id }}</td>
                    <td class="py-3 px-6 text-gray-700">{{ $data->nama }}</td>
                    <td class="py-3 px-6 text-gray-700">{{ $data->email }}</td>
                    <td class="py-3 px-6 text-gray-700">{{ $data->no_telp }}</td>
                    <td class="py-3 px-6 text-gray-700">{{ $data->alamat }}</td>
                    <td class="py-3 px-6 text-gray-700 flex space-x-2">
                        <a href="{{ route('sekolah.edit', $data->id) }}" class="rounded-lg bg-yellow-500 text-white px-2 py-1 hover:border hover:border-yellow-600 transition duration-300">Edit</a>
                        <form action="{{ route('sekolah.delete', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');">
                            @csrf
                            <button type="submit" class="bg-red-600 rounded-lg text-white px-2 py-1 hover:border hover:border-red-800 transition duration-300">Hapus</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>