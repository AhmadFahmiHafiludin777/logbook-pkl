<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="flex items-center justify-between">
        <h4 class="text-3xl">List Sekolah</h4>

        @can('create-sekolah')
        <div class="">
            <a href="{{ route('sekolah.create') }}" class="rounded-sm bg-blue-500 text-white px-4 py-2 hover:border hover:border-sky-300 transition duration-300">+ Tambah Sekolah</a>
        </div>
        @endcan
    </div>
    
    <div class="overflow-x-auto mt-4">
        <table id="table" class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="w-full bg-blue-500 border-b">
                    <th class="py-3 px-6 text-left font-medium text-white uppercase">ID</th>
                    <th class="py-3 px-6 text-left font-medium text-white uppercase">nama</th>
                    <th class="py-3 px-6 text-left font-medium text-white uppercase">aksi</th>

                </tr>
            </thead>
            <tbody>
                @foreach($sekolah as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>
                        @can('view-sekolah')
                        <a href="{{ route('sekolah.show', $data->id) }}" class="rounded-md bg-sky-500 text-lg text-white px-4 py-2 hover:border hover:border-sky-600 transition duration-300 ml-4">Lihat</a>
                        @endcan
                        @can('edit-sekolah')
                        <a href="{{ route('sekolah.edit', $data->id) }}" class="rounded-md bg-yellow-500 text-lg text-white px-4 py-2 ml-2 hover:border hover:border-yellow-600 transition duration-300">Edit</a>
                        @endcan
                        @can('delete-sekolah')
                        <form action="{{ route('sekolah.destroy', $data->id) }}" method="POST" style="display: inline" onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');">
                            @method('DELETE')
                            @csrf
                            @if ($data->jurusanSekolah()->exists())
                                <button type="button" class="bg-red-300 rounded-md text-white px-4 py-2 ml-2 text-lg cursor-not-allowed relative group" disabled>
                                    Delete
                                </button>
                            @else
                                <button type="submit" class="bg-red-600 rounded-md text-white px-4 py-2 ml-2 text-lg hover:border hover:border-red-800 transition duration-300">Delete</button>
                            @endif
                        </form>
                        @endcan
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="mt-4">
            {{ $sekolah->links() }}
        </div> --}}
    </div>
</x-layout>