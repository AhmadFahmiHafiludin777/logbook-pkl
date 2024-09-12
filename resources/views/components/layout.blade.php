<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100 scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://cdn.datatables.net/v/bs5/dt-2.1.6/datatables.min.css" rel="stylesheet">


    <title>home</title>
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
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="w-10 h-10 bg-sky-200 rounded-full flex fixed bottom-5 right-5 -translate-x-1/2 cursor-pointer hover:animate-pulse"><a href="#" class="text-xl m-auto">🔝</a></div>
        {{ $slot }}
      </div>
    </main>
    
  </div>

 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/dt-2.1.6/datatables.min.js"></script>
  <script>
        $(document).ready(function () {
            $('#table').DataTable(); 
            })
    </script>


  
</body>
</html>