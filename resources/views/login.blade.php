<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Optional CSS for footer styling */
        .footer {
            background-color: black;
            color: white;
            padding: 20px 0;
            margin-top: 50px;
        }
        .footer ul {
            padding: 0;
            list-style: none;
        }
        .footer ul li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    @error('email')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
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
                            <a href="https://www.instagram.com/pogohouseofficial?igsh=cTk0MjZtb2ZwZ2d2">
                               <img src="images/ig.jpg" alt="" width="30" height="30"> Instagram
                            </a>
                        </li>
                        <li>
                            <a href="https://shp.ee/staon6d">
                                <img src="images/shoope.png" alt="Shopee Logo" width="30" height="30"> Shopee
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Contact</h5>
                    <ul>
                        <li>Email: pogostore@gmail.com</li>
                        <li>Phone: +6289654938286</li>
                        <li>Address:  jl. Sutan Syahrir 26 Tarok Dipo, Bukittinggi.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center text-muted mt-3">
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS (optional, if you need JavaScript features) -->
    <script src="/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
