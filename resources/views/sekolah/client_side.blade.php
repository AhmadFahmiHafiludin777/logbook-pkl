<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <table class="table" id="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nama</td>
                <td>Email</td>
                <td>No Telepon</td>
                <td>Alamat</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($sekolah as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->no_telp }}</td>
                <td>{{ $data->alamat }}</td>
                <td class="py-3 px-6 text-gray-700 flex items-center justify-center space-x-2">
                    <a href="{{ route('sekolah.show', $data->id) }}" class="rounded-lg bg-sky-500 text-white px-2 py-1 hover:border hover:border-sky-600 transition duration-300" >Lihat</a>
                    <a href="{{ route('sekolah.edit', $data->id) }}" class="rounded-lg bg-yellow-500 text-white px-2 py-1 hover:border hover:border-yellow-600 transition duration-300">Edit</a>
                    <form action="{{ route('sekolah.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="bg-red-600 rounded-lg text-white px-2 py-1 hover:border hover:border-red-800 transition duration-300">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</x-layout>
