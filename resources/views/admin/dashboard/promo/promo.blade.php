@extends('admin.layout.layout')

@section('container')
<div class="produkTerbaru">
  <div class="row">
    <div class="col-lg-8">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Promo Terbaru
      </h3>
      <a href="/dashboard/promo/create" class="tambah"><i class="bi bi-plus-lg"></i> Tambah Promo</a>
      @if(session()->has('success'))
      <div class="alert alert-primary" role="alert">
        {{ session('success') }}
      </div>
      @endif
      @if(session()->has('successDelete'))
      <div class="alert alert-danger" role="alert">
        {{ session('successDelete') }}
      </div>
      @endif
      @if(session()->has('successUpdate'))
      <div class="alert alert-primary" role="alert">
        {{ session('successUpdate') }}
      </div>
      @endif
      <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Promo</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>

           @foreach($promos as $promo)
           <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $promo->promo }}</td>
            <td>
              <a href="/dashboard/promo/{{ $promo->slug }}"> <i class="bi bi-eye-fill"></i></a>
              <a href="/dashboard/promo/{{ $promo->slug }}/edit"> <i class="bi bi-pencil-square"></i></a>
              <form method="POST" action="/dashboard/promo/{{ $promo->slug }}" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="bg-transparent" onclick="return confirm('yakin?')" name="submit" style="outline: none; border:none;"><i class="bi bi-trash3-fill"></i></button>
              </form>
            </td>
          </tr>
           @endforeach
          
          </tbody>
        </table>
    </div>
  </div>
</div>
@endsection
