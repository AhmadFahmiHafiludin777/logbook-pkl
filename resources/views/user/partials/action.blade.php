<div class="py-3 px-6 text-gray-700 flex">

    @if ($row->deleted_at)
        
        <form action="{{ route('user.restore', $row->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="bg-green-600 rounded-md text-white px-4 py-2 ml-4 text-lg hover:border hover:border-green-800 transition duration-300">
                Restore
            </button>
        </form>

    @else
    
        @can('view-user') 
        <a href="{{ route('user.show', $row->id) }}" class="rounded-md bg-sky-500 text-lg text-white px-4 py-2 hover:border hover:border-sky-600 transition duration-300 ml-4">Lihat</a>
        @endcan
        @can('edit-user')
        <a href="{{ route('user.edit', $row->id) }}" class="rounded-md bg-yellow-500 text-lg text-white px-4 py-2 ml-2 hover:border hover:border-yellow-600 transition duration-300">Edit</a>
        @endcan
        @can('impersonate-user')
        <a href="{{ route('user.impersonate', $row->id) }}" class="rounded-md bg-green-500 text-lg text-white px-4 py-2 ml-2 hover:border hover:border-yellow-600 transition duration-300">Impersonate</a>
        @endcan
        @can('delete-user')
        <form action="{{ route('user.destroy', $row->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
                <button type="submit" class="bg-red-600 rounded-md text-white px-4 py-2 ml-2 text-lg hover:border hover:border-red-800 transition duration-300" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
        @endcan
    @endif
    
</div>
