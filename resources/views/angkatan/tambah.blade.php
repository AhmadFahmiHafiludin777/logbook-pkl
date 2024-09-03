<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')

</head>
<body>
    <h4>Tambah Angkatan</h4>

    <form action="{{ route('angkatan.submit') }}" method="post">
        @csrf
        <label">Tahun</label>
        <input type="text" name="tahun" class="mb-2">

        <button class="text-blue-800">Tambah</button>
    </form>
</body>
</html>