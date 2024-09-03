<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <title>Document</title>
</head>
<body>
    <div class="flex">
        <h4>List Angkatan</h4>
        <div class="mx-auto">
            <a href="{{ route('angkatan.tambah') }}" class="rounded-full bg-green-500">Tambah Angkatan</a>
        </div>
    </div>
    
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="w-full bg-gray-100 border-b">
                    <th class="py-3 px-6 text-left font-medium text-gray-700 uppercase">ID</th>
                    <th class="py-3 px-6 text-left font-medium text-gray-700 uppercase">Tahun</th>
                    <th class="py-3 px-6 text-left font-medium text-gray-700 uppercase">created_at</th>
                    <th class="py-3 px-6 text-left font-medium text-gray-700 uppercase">update_at</th>


                </tr>
            </thead>
            <tbody>
                @foreach($angkatan as $data)
                <tr class="border-b">
                    <td class="py-3 px-6 text-gray-700">{{ $data->id }}</td>
                    <td class="py-3 px-6 text-gray-700">{{ $data->tahun }}</td>
                    <td class="py-3 px-6 text-gray-700">{{ $data->created_at }}</td>
                    <td class="py-3 px-6 text-gray-700">{{ $data->updated_at }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>


