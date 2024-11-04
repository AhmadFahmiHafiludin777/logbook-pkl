<div class="py-3 px-6 text-gray-700 flex">
    @can('view-angkatan') 
    <a href="{{ route('jurusan.show', $row->id) }}" class="rounded-md bg-sky-500 text-lg text-white px-2 py-1 hover:border hover:border-sky-600 transition duration-300 ml-4">Lihat</a>
    @endcan
    @if ((auth()->user()->hasAnyRole('Admin Super', 'Admin PKL')))
    <a href="{{ route('jurusan.edit', $row->id) }}" class="rounded-md bg-yellow-500 text-lg text-white px-2 py-1 ml-2 hover:border hover:border-yellow-600 transition duration-300">Edit</a>
    <form action="{{ route('jurusan.destroy', $row->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        @if ($hasRelation)
            <button type="button" class="bg-red-300 rounded-md text-white px-2 py-1 ml-2 text-lg cursor-not-allowed relative group" disabled>
                Delete
            </button>
        @else
            <button type="submit" class="bg-red-600 rounded-md text-white px-2 py-1 ml-2 text-lg hover:border hover:border-red-800 transition duration-300" onclick="return confirm('Are you sure?')">Delete</button>
        @endif
    </form>
    @endif
    
</div>