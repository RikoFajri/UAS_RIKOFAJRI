@extends('layout.template')  
@section('title', 'Input Data Baju')  
@section('content')
		<h2 class="mb-4">Edit Barang</h2>
		<form action="/baju/{{ $baju->id }}/edit" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="mb-3">
				<label for="id" class="form-label">ID Barang:</label>
				<input type="text" class="form-control" id="id" name="id" value="{{ $baju->id }}" disabled>
			</div>
			<div class="mb-3">
				<label for="type" class="form-label">Type:</label>
				<input type="text" class="form-control" id="type" name="type" value="{{ $baju->type }}" required="">
			</div>
			<div class="mb-3">
				<label for="category_id" class="form-label">Size:</label>
				<select name="category_id" id="category_id" class="form-select" required>
					<option value="">Pilih Size</option>
					@foreach ($categories as $category)
						<option value="{{ $category->id }}" {{ $baju->category_id == $category->id ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
					@endforeach
				</select>
			</div>
			<div class="mb-3">
				<label for="price" class="form-label">Price:</label>
				<input class="form-control" id="price" name="price" rows="4" required=""{{ $baju->price }}>
			</div>
			<div class="mb-3">
				<label for="fabric" class="form-label">Fabric:</label>
				<input type="text" class="form-control" id="fabric" name="fabric" value="{{ $baju->fabric }}" required="">
			</div>
			<div class="mb-3">
				<label for="color" class="form-label">Color:</label>
				<input type="text" class="form-control" id="color" name="color" value="{{ $baju->color }}" required="">
			</div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Sebelumnya:</label>
                <img src="/images/{{ $baju['foto_sampul'] }}" class="img-thumbnail" alt="..." width="100px">
            </div>
			<div class="mb-3">
				<label for="foto_sampul" class="form-label">Foto Sampul:</label>
				<input type="file" class="form-control" id="foto_sampul" name="foto_sampul">
			</div>
			<div class="mb-3">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
		@endsection