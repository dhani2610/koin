<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>@yield('title')</title>
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
    @livewireStyles

  </head>
  <body>
    @include('includes.header')

    <main class="main">
      @yield('content')
    </main>

    @include('includes.footer')
    
    @stack('prepend-script')    
    @include('includes.script')
    @stack('addon-script')
    @livewireScripts    

  </body>
</html>