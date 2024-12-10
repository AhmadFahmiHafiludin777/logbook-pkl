<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-center text-3xl font-extrabold text-blue-500">Kelola Sistem Logbook PKL</h3>

    <div class="flex justify-center gap-2 flex-wrap mt-5">
        @can('view-angkatan')
        <a href="/angkatan" class="w-[85%] md:w-[30%] xl:w-[23%] mx-2">
            <div class="h-40 rounded-2xl bg-white flex mt-6 shadow-2xl hover:font-bold hover:bg-blue-500 transition duration-500">
                <h4 class="text-3xl m-auto">Data Angkatan</h4>
            </div>
        </a>
        @endcan
    
        @can('view-sekolah')
        <a href="/sekolah" class="w-[85%] md:w-[30%] xl:w-[23%] mx-2">
            <div class="h-40 rounded-2xl bg-white flex mt-6 shadow-2xl hover:font-bold hover:bg-blue-500 transition duration-500">
                <h4 class="text-3xl m-auto">Data Sekolah</h4>
            </div>
        </a>
        @endcan
        
        @can('view-jurusan')
        <a href="/jurusan" class="w-[85%] md:w-[30%] xl:w-[23%] mx-2">
            <div class="h-40 rounded-2xl bg-white flex mt-6 shadow-2xl hover:font-bold hover:bg-blue-500 transition duration-500">
                <h4 class="text-3xl m-auto">Data Jurusan</h4>
            </div>
        </a>
        @endcan

        @can('view-user')
        <a href="/user" class="w-[85%] md:w-[30%] xl:w-[23%] mx-2">
            <div class="h-40 rounded-2xl bg-white flex mt-6 shadow-2xl hover:font-bold hover:bg-blue-500 transition duration-500">
                <h4 class="text-3xl m-auto">Data User</h4>
            </div>
        </a>
        @endcan

        @can('view-siswa')
        <a href="/siswa" class="w-[85%] md:w-[30%] xl:w-[23%] mx-2">
            <div class="h-40 rounded-2xl bg-white flex mt-6 shadow-2xl hover:font-bold hover:bg-blue-500 transition duration-500">
                <h4 class="text-3xl m-auto">Data Siswa</h4>
            </div>
        </a>
        @endcan

        <a href="#" class="w-[85%] md:w-[30%] xl:w-[23%] mx-2">
            <div class="h-40 rounded-2xl bg-white flex mt-6 shadow-2xl hover:font-bold hover:bg-blue-500 transition duration-500">
                <h4 class="text-3xl m-auto">Data Angkatan</h4>
            </div>
        </a>

        <a href="#" class="w-[85%] md:w-[30%] xl:w-[23%] mx-2">
            <div class="h-40 rounded-2xl bg-white flex mt-6 shadow-2xl hover:font-bold hover:bg-blue-500 transition duration-500">
                <h4 class="text-3xl m-auto">Data Angkatan</h4>
            </div>
        </a>

        <a href="#" class="w-[85%] md:w-[30%] xl:w-[23%] mx-2">
            <div class="h-40 rounded-2xl bg-white flex mt-6 shadow-2xl hover:font-bold hover:bg-blue-500 transition duration-500">
                <h4 class="text-3xl m-auto">Data Angkatan</h4>
            </div>
        </a>
    </div>
</x-layout>
