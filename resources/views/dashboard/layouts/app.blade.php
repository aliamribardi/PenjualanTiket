<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Aliamri" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>AAB · Jual Tiket</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('backend/assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    
    <!-- Custom styles for this template -->
    <link href="{{ asset('backend/css/dashboard.css') }}" rel="stylesheet">
  </head>
  <body>
    
    {{-- Header --}}
    @include('dashboard.layouts.header')
    {{-- End Header --}}

<div class="container-fluid">
  <div class="row">
    
    {{-- Sidebar --}}
    @include('dashboard.layouts.sidebar')
    {{-- End Sidebar --}}

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    
    {{-- Content --}}
    @yield('content')
    {{-- End Content --}}

    </main>
  </div>
</div>


    <script src="{{ asset('backend/assets/dist/js/bootstrap.bundle.min.js') }}"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="{{ asset('backend/js/dashboard.js') }}"></script>
  </body>
</html>
