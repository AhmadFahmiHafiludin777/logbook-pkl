<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="flex items-center justify-between">
        <h4 class="text-3xl">List Pembimbing Lapangan</h4>
        
        @can('create-pembimbing-lapangan')
        <div class="">
            <a href="{{ route('pembimbingLapangan.create') }}" class="rounded-sm bg-blue-500 text-white px-4 py-2 hover:border hover:border-sky-300 transition duration-300">+ Tambah Pembimbing Lapangan</a>
        </div>
        @endcan
    </div>
   
    
    <div class="overflow-x-auto mt-4">
        <table id="pembimbinglapangantable" class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="w-full border-b">
                    <th class="py-3 px-6 text-left font-medium text-white uppercase">ID</th>
                    <th class="py-3 px-6 text-left font-medium text-white uppercase">Nama</th>
                    <th class="py-3 px-6 text-left font-medium text-white uppercase">aksi</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>

        
    </div>
</x-layout>

<script>
    $(function() {
        $('#pembimbinglapangantable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('data.pembimbingLapangan') }}",
            error: function (xhr, error, thrown) {
            console.log(xhr.responseText); 
            },
            columns: [
                {data: 'id'},
                { data: 'nama' },
                { data: 'action', orderable: false, searchable: false },
            ],
            
            
        });
    });
</script>