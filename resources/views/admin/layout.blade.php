<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('admin.home') }}"">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('admin.categories.index') }}"">Categories</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('admin.trainers.index') }}"">Trainers</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.login') }}">Login</a>
                    </li>
                @endguest
            </ul>
            @auth
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item float-left">
                        <a class="nav-link" href="{{ route('admin.logout') }}">logout</a>
                    </li>
                </ul>
            @endauth
          </div>
        </div>
      </nav>


      <div class="container">
        @yield('content')
      </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
