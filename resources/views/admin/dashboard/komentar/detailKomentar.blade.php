@extends('admin.layout.layout')

@section('container')
<h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-home"></i>
    </span> Komentar Of 
  </h3>
  <ul class="navigation mt-4">
    <li class="left"><a href="/dashboard/komentar"><i class="bi bi-arrow-bar-left"></i> Back To Komentar</a></li>
  </ul>
  <div class="card mb-3">
    <img src="{{ url('storage/'.$slug->image) }}" style="height: 500px; object-fit:cover;">
    <div class="card-body">

      @if(session()->has('success'))
      <div class="alert alert-primary" role="alert">
        {{ session('success') }}
      </div>
      @endif

        <h1 class="mb-3">{{ $slug->title }}</h1>
   @if($blogs->count())
   @foreach($blogs as $blog)
   <div class="row mb-2 allKomentar">
     <div class="col-sm-12 col-md-8">
         <h5>{{ $blog->namaLengkap }}</h5>
         <p>{{ $blog->komentar }}</p>
     </div>
     <div class="col-sm-12 col-md-4">
       <form method="POST" action="/dashboard/komentar/{{ $blog->id }}" class="d-inline">
         @method('delete')
         @csrf
         <button type="submit" class="bg-transparent" name="submit" style="outline: none; border:none;"><i class="bi bi-trash3-fill" onclick="return confirm('yakin?')"></i></button>
       </form>
     </div>
 </div>
   @endforeach
   @else
   <p style="background-color:red; width:fit-content; padding:5px 10px; margin:20px auto;">Komentar Masih Kosong</p>
   @endif
   
    </div>
  </div>
@endsection