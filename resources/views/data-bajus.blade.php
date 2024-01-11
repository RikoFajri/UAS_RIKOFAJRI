@extends('layout.template')

@section('title', 'Data Baju')

@section('content')

<h1>Data Semua Barang</h1>
<a href="/bajus/create" class="btn btn-danger">Input New Barang</a>


<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Item</th>
        <th scope="col">Size</th>
        <th scope="col">Price</th>
        <th scope="col">Fabric</th>
        <th scope="col">Color</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($bajus as $baju)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $baju->type }}</td>
            <td>{{ $baju->category->nama_kategori }}</td>
            <td>{{ $baju->price }}</td>
            <td>{{ $baju->fabric }}</td>
             <td>{{ $baju->color }}</td>
            <td class="text-nowrap">
                <a href="/baju/{{ $baju['id'] }}/edit" class="btn btn-warning">Edit</a>
                <a href="/baju/delete/{{ $baju->id }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
    <div class="d-flex justify-content-center">
        {{ $bajus->links() }}
    </div>
@endsection