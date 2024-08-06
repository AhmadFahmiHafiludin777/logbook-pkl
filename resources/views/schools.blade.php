<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  @foreach ($sekolahs as $school)
    <article class="py-8 border-b  border-gray-300">
      <a href="/schools/{{ $school['nama'] }}" class="hover:underline"><h2 >{{ $school['nama'] }}</h2></a>
      <h2>{{ $school['email'] }}</h2>
      <h3>{{ $school ['no_telp'] }}</h3>
      <p>{{ Str::limit($school ['alamat'], 10) }}</p>
      <a href="/schools/{{ $school['nama'] }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a> <br>
      <h6 style="color: gray";>| {{ $school->created_at->diffForHumans() }}</h6>
      
    </article>
    @endforeach
  </x-layout>
