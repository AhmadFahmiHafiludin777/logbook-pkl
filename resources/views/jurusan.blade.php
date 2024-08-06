<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  @foreach($jurusans as $jurusan)
  <article class="py-8 border-b  border-gray-300">
    <h2><b>Kode Jurusan : </b> {{ $jurusan['kode'] }}</h2>
    <h5><b>Nama Jurusan : </b>{{ $jurusan['nama'] }}</h5>
    <p style="color: gray";>| {{ $jurusan->created_at->diffForHumans() }}</p>
  </article>
  @endforeach
</x-layout>