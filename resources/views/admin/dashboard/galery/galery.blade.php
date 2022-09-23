@extends('admin.layout.layout')

@section('container')
<div class="produkTerbaru">
  <div class="row">
    <div class="col-lg-8">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Galery
      </h3>
      <a href="/dashboard/galery/create" class="tambah"><i class="bi bi-plus-lg"></i> Tambah Galery</a>
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
              <th scope="col">Nama</th>
              <th scope="col">Image</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>

          @foreach($galeries as $galery)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $galery->nama }}</td>
            <td>
                <img src="{{ url('storage/'.$galery->image) }}">
            </td>
            <td>
              <a href="/dashboard/galery/{{ $galery->slug }}"> <i class="bi bi-eye-fill"></i></a>
              <a href="/dashboard/galery/{{ $galery->slug }}/edit"> <i class="bi bi-pencil-square"></i></a>
              <form method="POST" action="/dashboard/galery/{{ $galery->slug }}" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="bg-transparent" name="submit" style="outline: none; border:none;"><i class="bi bi-trash3-fill" onclick="return confirm('yakin?')"></i></button>
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
