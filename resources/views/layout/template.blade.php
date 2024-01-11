<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POGOHOUSE - @yield('title', 'Website')</title>
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  </head>
  
  <body>

    
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container">
        <style>
            .navbar-brand {
                font-family: "Arial Black", Arial, sans-serif;
            }
            
        </style>

        <!-- Kemudian pada bagian HTML Anda -->
        <a class="navbar-brand" href="/">PogoHouse</a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>

              @auth
              <li class="nav-item">
                <a class="nav-link" href="/bajus/data">Data Barang</a>
              </li>
              @endauth
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <form action="/" class="d-flex" role="search">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
              </form>
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <form action="/logout" method="post">
                    @csrf
                  <li>
                    <button type="submit" class="dropdown-item">Logout</button>
                  </li>
                  </form>
                 
                </ul>
              </li> 
              @else
              <li class="nav-item">
                <a class="nav-link" href="/login"><i class="bi bi-person-lock"></i> Login</a>
              </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>

      <div class="container my-2">
        @yield('content')
      </div>

 <footer class="footer bg-dark  text-white ">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>Location</h5>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.759015682666!2d100.37551777496458!3d-0.3123963996845315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd53949cf13ed6f%3A0x3d7f71caea419855!2sPOGO%20HOUSE!5e0!3m2!1sid!2sid!4v1704206361502!5m2!1sid!2sid" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="col-md-3">
                <h5>Social Media</h5>
                <ul>
                    <li>
                       <a href="https://www.instagram.com/pogohouseofficial?igsh=cTk0MjZtb2ZwZ2d2" style="text-decoration: none; color: white;">
                            <img src="{{ asset('images/ig.jpg') }}" alt="Instagram Logo" width="30" height="30"> Instagram
                        </a>
                    </li>
                    <li>
                          <a href="https://shp.ee/staon6d" style="text-decoration: none; color: white;">
                            <img src="{{ asset('images/shoope.png') }}" alt="Shopee Logo" width="30" height="30"> Shopee
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3">
                <h5>Contact</h5>
                <ul>
                    <li>Email: pogostore@gmail.com</li>
                    <li>Phone: +6289654938286</li>
                    <li>Address: jl. Sutan Syahrir 26 Tarok Dipo, Bukittinggi.</li>
                </ul>
            </div>
        </div>
    </div>
 
    <footer class="bg-dark text-center text-white py-2">
        Powered By Pogo House 
      </footer>

</footer>


    <script src="/bootstrap/bootstrap.bundle.min.js"></script>
  </body>
</html>