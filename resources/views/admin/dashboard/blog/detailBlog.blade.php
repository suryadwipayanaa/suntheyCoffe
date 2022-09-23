@extends('admin.layout.layout')

@section('container')
<h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-home"></i>
    </span> Detail {{ $blog->title }}
  </h3>
  <ul class="navigation mt-4">
    <li class="left"><a href="/dashboard/blog"><i class="bi bi-arrow-bar-left"></i> Back To Postingan</a></li>
    <li class="tengah"><a href="/dashboard/blog/{{ $blog->slug }}/edit"><i class="bi bi-pencil-square"></i> Edit Postingan</a></li>
    <li class="kanan"> 
        <form method="POST" action="/dashboard/blog/{{ $blog->slug }}" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="bg-transparent" name="submit" style="outline: none; border:none;"><i class="bi bi-trash3-fill" onclick="return confirm('yakin?')"></i> Delete Postingan</button>
          </form>
    </li>
  </ul>
  <div class="card mb-3">
    <img src="{{ url('storage/'.$blog->image) }}" style="height: 500px; object-fit:cover;">
    <div class="card-body">
      <h5 class="card-title">{{ $blog->title }}</h5>
      <h5 class="card-title category"><i class="bi bi-journals"></i> {{ $blog->category->category }}</h5>
      <p class="card-text">{!! $blog->desFull !!}</p>
      <p class="card-text"><small class="text-muted">{{ $blog->created_at->diffForHumans() }}</small></p>
    </div>
  </div>
@endsection