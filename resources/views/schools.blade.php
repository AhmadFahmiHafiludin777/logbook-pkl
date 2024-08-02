<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  @foreach ($schools as $school)
    <article class="py-8 border-b  border-gray-300">
      <a href="/schools/{{ $school['slug'] }}" class="hover:underline"><h2 >{{ $school['nama'] }}</h2></a>
      <h3>{{ $school ['no_telp'] }}</h3>
      <p>{{ Str::limit($school ['alamat'], 100) }}</p>
      <a href="/schools/{{ $school['slug'] }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
    </article>
    @endforeach
  </x-layout>
