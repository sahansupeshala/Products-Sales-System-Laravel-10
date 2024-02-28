<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CeylonLinux-Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="style.css" rel="stylesheet" type='text/css'> -->
    <link rel="stylesheet" href="{{asset('cssfile/aos.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="{{asset('aos.min.js')}}"></script>
    <script src="{{asset('bs-init.js')}}"></script>
</head>
<div class="row">
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('main')}}"><h4><B>Ceylon Linux</B></h4></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active text-white" href="{{route('customers.index')}}"><h5><b>Customer</b></h5></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-white" href="{{route('products.index')}}"><h5><b>Product</b></h5></a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white"  id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <b>Free Issues</b>
                </a>
                <ul class="dropdown-menu bg-success" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item text-white" href="{{route('freeIssues.create')}}"><b>Create</b></a></li>
                  <li><a class="dropdown-item text-white" href="{{route('freeIssues.index')}}"><b>View</b></a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white"  id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <b>Placing Order</b>
                </a>
                <ul class="dropdown-menu bg-success " aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item text-white" href="{{route('placingOrders.create')}}"><b>Create</b></a></li>
                  <li><a class="dropdown-item text-white" href="{{route('placingOrders.index')}}"><b>View</b></a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</div>
<section >
    @yield('content')
</section>

