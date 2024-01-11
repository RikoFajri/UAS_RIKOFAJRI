@extends('layout.template')

@section('title', 'Homepage')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>    
@endif
<!-- Slider section -->
<div id="bajuSlider" class="carousel slide" data-ride="carousel" style="max-width: 100%; margin: auto;">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/pogo.png" class="d-block w-100" alt="Slider Image 1" style="width: 50px; height: 700px;">
        </div>
        <div class="carousel-item">
            <img src="images/gambar1.jpg" class="d-block w-100" alt="Slider Image 2" style="width: 50px; height: 700px;">
        </div>
        <div class="carousel-item">
            <img src="images/gambar4.jpg" class="d-block w-100" alt="Slider Image 2" style="width: 50px; height: 700px;">
        </div>
         <div class="carousel-item">
            <img src="images/gambar3.jpg" class="d-block w-100" alt="Slider Image 2" style="width: 50px; height: 700px;">
        </div>
        <!-- Tambahkan gambar slider sesuai kebutuhan -->
    </div>
    <a class="carousel-control-prev" href="#bajuSlider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
    <a class="carousel-control-next" href="#bajuSlider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
</div>


<h1 class="text-center py-4" style="font-family: Arial Black;">LIST ITEM</h1>


<div class="row">
    @foreach ($bajus as $baju)
    <div class="col-lg-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: 'Britannic Bold', sans-serif;">{{ $baju['type'] }}</h5>
                        <p class="card-text" style="font-family: 'Britannic Bold', sans-serif;">{{ $baju['price'] }}</p>
                        <a href="/baju/{{ $baju['id'] }}" class="btn btn-dark">Read More</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="/images/{{ $baju['foto_sampul'] }}" class="img-fluid rounded-end" alt="...">
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-center">
        {{ $bajus->links() }}
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    $('#bajuSlider').carousel({
        interval: 3000 // Atur interval slide ke 3 detik
    });
</script>
@endsection
