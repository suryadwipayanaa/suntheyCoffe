@extends('admin.layout.layout')

@section('container')
<h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-home"></i>
    </span> Detail {{ $produk->nama }}
  </h3>
  <ul class="navigation mt-4">
    <li class="left"><a href="/dashboard/allProduk"><i class="bi bi-arrow-bar-left"></i> Back To Produk Terbaru</a></li>
    <li class="tengah"><a href="/dashboard/allProduk/{{ $produk->slug }}/edit"><i class="bi bi-pencil-square"></i> Edit Produk Terbaru</a></li>
    <li class="kanan"> 
        <form method="POST" action="/dashboard/allProduk/{{ $produk->slug }}" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="bg-transparent" name="submit" style="outline: none; border:none;"><i class="bi bi-trash3-fill" onclick="return confirm('yakin?')"></i> Delete Produk</button>
          </form>
    </li>
  </ul>
  <div class="card mb-3">
    <img src="{{ url('storage/'.$produk->image) }}" style="height: 500px; object-fit:cover;">
    <div class="card-body">
      <h5 class="card-title">{{ $produk->nama }}</h5>
      <h5 class="card-title category"><i class="bi bi-journals"></i> {{ $produk->category->category }}</h5>
      <p class="card-text">{!! $produk->deskripsi !!}</p>
      <h5 class="card-title" id="harga"><i class="bi bi-currency-dollar"></i> {{ $produk->harga}}</h5>
      <p class="card-text"><small class="text-muted">{{ $produk->created_at->diffForHumans() }}</small></p>
    </div>
  </div>
@endsection