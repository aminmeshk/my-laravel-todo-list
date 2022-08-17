<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <style>
    .material-symbols-outlined {
      font-variation-settings:
        'FILL'0,
        'wght'400,
        'GRAD'0,
        'opsz'48
    }
  </style>

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
  <div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Heading -->
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $header }}
      </div>
    </header>

    <!-- Page Content -->
    <main>
      @if (session('message'))
        <x-flash-message>
          {{ session('message') }}
        </x-flash-message>
      @endif
      {{ $slot }}
    </main>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/party-js@latest/bundle/party.min.js"></script>
<script>
  import party from "party-js";
</script>
</html>
