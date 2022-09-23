@extends('admin.layout.layout')

@section('container')
<h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-home"></i>
    </span> Detail {{ $promo->promo }}
  </h3>
  <ul class="navigation mt-4">
    <li class="left"><a href="/dashboard/promo"><i class="bi bi-arrow-bar-left"></i> Back To Promo</a></li>
    <li class="tengah"><a href="/dashboard/promo/{{ $promo->slug }}/edit"><i class="bi bi-pencil-square"></i> Edit Promo</a></li>
    <li class="kanan"> 
        <form method="POST" action="/dashboard/promo/{{ $promo->slug }}" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="bg-transparent" name="submit" style="outline: none; border:none;"><i class="bi bi-trash3-fill" onclick="return confirm('yakin?')"></i> Delete Promo</button>
          </form>
    </li>
  </ul>
  <div class="card mb-3">
    <img src="{{ url('storage/'.$promo->image) }}" style="height: 500px; object-fit:cover;">
    <div class="card-body">
      <h5 class="card-title">{{ $promo->promo }}</h5>
      <p class="card-text">{!! $promo->deskripsi !!}</p>
      <p class="card-text"><small class="text-muted">{{ $promo->created_at->diffForHumans() }}</small></p>
    </div>
  </div>
@endsection
