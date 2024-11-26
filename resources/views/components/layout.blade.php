<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100 scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="icon" href="{{ asset('img/logoapp1.png') }}" sizes="32x32"> --}}
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.tailwindcss.css">

    <link href="https://cdn.datatables.net/v/bs5/dt-2.1.6/datatables.min.css" rel="stylesheet"> --}}
{{-- Tailwind 1 start --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> --}} --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}
    {{-- Tailwind 1 End --}}

    {{-- Tailwind 2 start --}}

    {{-- <link rel="stylesheet" href="https://code.jquery.com/jquery-3.7.1.js">
    <link rel="stylesheet" href="https://cdn.tailwindcss.com/">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/js/dataTables.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/js/dataTables.tailwindcss.js">
    <link rel="stylesheet" href="https://cdn.tailwindcss.com/"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.tailwindcss.css">


    <title>{{ $title }}</title>
</head>
<body class="h-full">
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
<div class="min-h-full ">
    <x-navbar></x-navbar>
  
   <x-header>{{ $title }}</x-header>
   <x-flash-message></x-flash-message>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="w-10 h-10 bg-sky-200 rounded-full flex fixed bottom-5 right-5 -translate-x-1/2 cursor-pointer hover:animate-pulse"><a href="#" class="text-xl m-auto">🔝</a></div>
        {{ $slot }}
      </div>
    </main>
    
  </div>

 {{-- Tailwind 1 start --}}
  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> --}}
  {{-- Tailwind 1 end --}}

  {{-- <script src="https://cdn.datatables.net/v/bs5/dt-2.1.6/datatables.min.js"></script> --}}

  {{-- Tailwind 2 start --}}
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.tailwindcss.com/"></script>
  <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  {{-- <script src="https://cdn.datatables.net/2.1.7/js/dataTables.tailwindcss.js"></script> --}}
  <script src="https://cdn.tailwindcss.com/"></script>
  {{-- Taiwind 2 end --}}
  <script>
        $(document).ready(function () {
            $('#table').DataTable(); 
            })
    </script>


  
</body>
</html>