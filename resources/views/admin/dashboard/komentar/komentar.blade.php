@extends('admin.layout.layout')

@section('container')
<div class="produkTerbaru">
  <div class="row">
    <div class="col-lg-8">
      <h3 class="page-title mb-3">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Komentar
      </h3>
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
              <th scope="col">Title</th>

              <th scope="col">Image</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>

        
          @foreach($blogs as $blog)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $blog->title }}</td>
            <td>
                <img src="{{ url('storage/'.$blog->image) }}">
            </td>
            <td>
              <a href="/dashboard/komentar/{{ $blog->slug }}"> <i class="bi bi-eye-fill"></i></a>
            </td>
          </tr>
          @endforeach
     
        
          </tbody>
        </table>
    </div>
  </div>
</div>
@endsection
