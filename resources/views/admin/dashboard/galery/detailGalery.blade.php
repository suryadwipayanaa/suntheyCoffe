@extends('admin.layout.layout')

@section('container')
<h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-home"></i>
    </span> {{ $galery->nama }}
  </h3>
  <ul class="navigation mt-4">
    <li class="left"><a href="/dashboard/galery"><i class="bi bi-arrow-bar-left"></i> Back To Table</a></li>
    <li class="tengah"><a href="/dashboard/galery/{{ $galery->slug }}/edit"><i class="bi bi-pencil-square"></i> Edit Table</a></li>
    <li class="kanan"> 
        <form method="POST" action="/dashboard/galery/{{ $galery->slug }}" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="bg-transparent" name="submit" style="outline: none; border:none;"><i class="bi bi-trash3-fill" onclick="return confirm('yakin?')"></i> Delete Row</button>
          </form>
    </li>
  </ul>
  <div class="card mb-3">
    <img src="{{ url('storage/'.$galery->image) }}" style="height: 500px; object-fit:cover;">
  </div>
@endsection