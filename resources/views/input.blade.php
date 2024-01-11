@extends('layout.template')
@section('title', 'Input Data Baju')
@section('content')
		<h2 class="mb-4">Tambah Barang Baru</h2>
        <form action="/baju/store" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="mb-3">
				<label for="id" class="form-label">ID Film:</label>
				<input type="text" class="form-control" id="id" name="id" required="">
			</div>
			<div class="mb-3">
				<label for="type" class="form-label">Type:</label>
				<input type="text" class="form-control" id="type" name="type" required="">
			</div>
			<div class="mb-3">
				<label for="category_id" class="form-label">Size:</label>
				<select name="category_id" id="category_id" class="form-select" >
					<option value="">Pilih Size</option>
					@foreach ($categories as $category)
						<option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
					@endforeach
				</select>
			</div>
			<div class="mb-3">
				<label for="price" class="form-label">Price:</label>
				<input class="form-control" id="price" name="price" rows="4" required="">
			</div>
			<div class="mb-3">
				<label for="fabric" class="form-label">Fabric:</label>
				<input type="text" class="form-control" id="fabric" name="fabric" required="">
			</div>
			<div class="mb-3">
				<label for="color" class="form-label">Color:</label>
				<input type="text" class="form-control" id="color" name="color" required="">
			</div>
			<div class="mb-3">
				<label for="foto_sampul" class="form-label">Foto Sampul:</label>
				<input type="file" class="form-control" id="foto_sampul" name="foto_sampul" required="">
			</div>
			<div class="mb-3">
				<button type="submit" class="btn btn-primary">Simpan</button>
				<a href="/bajus/data" class="btn btn-danger">Batal</a>
			</div>
		</form>
		@endsection