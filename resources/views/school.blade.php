<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <article class="py-8">
      <h2 >{{ $school['nama'] }}</h2>
      <h3>{{ $school ['no_telp'] }}</h3>
      <p>{{$school ['alamat'] }}</p>
      <a href="/schools" class="font-medium text-blue-500 hover:underline">&laquo;Back to schools</a>
    </article>
  </x-layout>
