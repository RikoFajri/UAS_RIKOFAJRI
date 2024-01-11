@extends('layout.template')

@section('title', $baju['type'])

@section('content')

<div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-9">
        <div class="card-body">
          <h2 class="card-title">{{ $baju['type'] }}</h2>
          <p class="card-text">{{ $baju['price'] }}</p>
          <p class="card-text">Ukuran : {{ $baju->category->nama_kategori }}</p>
          <p class="card-text">Fabric : {{ $baju['fabric'] }}</p>
          <p class="card-text">Color : {{ $baju['color'] }}</p>
          <a href="https://shp.ee/staon6d" style="text-decoration: none; color: white;">
              <img src="{{ asset('images/shoope.png') }}" alt="Shopee Logo" width="30" height="30"> Shopee
          </a>
          <p></p>         
          <a href="/" class="btn btn-danger">Kembali</a>
          <a href="#" class="btn btn-link"><i class="fas fa-heart text-danger"></i></a>
        </div>
      </div>
      <div class="col-md-3">
        <img src="/images/{{ $baju['foto_sampul'] }}" class="img-fluid rounded-end" alt="...">
      </div>
    </div>
</div>

@endsection
