<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  @foreach($siswas as $siswa)
  <article class="py-8 border-b  border-gray-300">
    <h2><b>Nama : </b> {{ $siswa['nama'] }}</h2>
    <h5><b>Pembimbing Lapangan : </b>{{ $siswa->pembimbingLapangan->nama }}</h5>
    <h5><b>No_Telp : </b>{{ $siswa['no_telp'] }}</h5>
    <p style="color: gray";>| {{ $siswa->created_at->diffForHumans() }}</p>
  </article>
  @endforeach</x-layout>