@extends('admin.layout.layout')

@section('container')
<h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-home"></i>
    </span> Detail {{ $contact->nama }}
  </h3>
  <ul class="navigation mt-4">
    <li class="left"><a href="/dashboard/contact"><i class="bi bi-arrow-bar-left"></i> Back To Contact</a></li>
    <li class="tengah"><a href="/dashboard/contact/{{ $contact->slug }}/edit"><i class="bi bi-pencil-square"></i> Edit Contact</a></li>
    <li class="kanan"> 
        <form method="POST" action="/dashboard/contact/{{ $contact->slug }}" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="bg-transparent" name="submit" style="outline: none; border:none;"><i class="bi bi-trash3-fill" onclick="return confirm('yakin?')"></i> Delete Contact</button>
          </form>
    </li>
  </ul>
  <div class="card mb-3">
    <img src="{{ url('storage/'.$contact->image) }}" style="height: 500px; object-fit:cover;">
    <div class="card-body contact">
        <a href="{{ $contact->linkMap }}"><i class="bi bi-person-badge-fill"></i> {{ $contact->nama }}</a>
        <a href="{{ $contact->linkMap }}"><i class="bi bi-geo-alt-fill"></i> {{ $contact->alamat }}</a>
        <a href="mailto:{{ $contact->email }}"><i class="bi bi-envelope-fill"></i> {{ $contact->email }}</a>
        <a href="https://instagram.com/{{ $contact->instagram }}"><i class="bi bi-instagram"></i> {{ $contact->instagram }}</a>
        <a href="https://wa.me/{{ $contact->telp }}"><i class="bi bi-telephone-forward-fill"></i> {{ $contact->telp }}</a>
        <a href="https://wa.me/{{ $contact->whatsapp }}"><i class="bi bi-whatsapp"></i> {{ $contact->whatsapp }}</a>
      <p class="card-text mt-3"><small class="text-muted">{{ $contact->created_at->diffForHumans() }}</small></p>
    </div>
  </div>
@endsection