@extends('tampilan.layout.layout')

@section('container')

<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login Dulu Ya</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Harap Login Terlebih Dahulu
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="/login" class="btn btn-primary">Login</a>
        </div>
      </div>
    </div>
  </div>

    <div class="floating">
        <div class="notification">
            <div class="row">
        @foreach($produkTerbarus as $produkTerbaru)
        <div class="col-sm-12">
            <div class="gambar">
                <img src="{{ url('storage/'.$produkTerbaru->image) }}" width="100%" style="display: block; margin-bottom:10px">
                <p class="new">NEW</p>
            </div>
                <h5 class="mt-3">{{ $produkTerbaru->nama }}</h5>
                <p>{!! $produkTerbaru->desFull !!}</p>
                <p class="harga">Rp. {{ $produkTerbaru->harga }}</p> 
        </div>
        <hr>
        @endforeach
            </div>
        </div>
    </div>

  <div class="detailBlogs">
     <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <img src="{{ url('storage/'.$blog->image) }}" width="50%">
            </div>
        </div>
        <div class="title">
            <div class="navbarSlide"></div>
            <h1>{{ $blog->title }}</h1>
            <strong>Created By Sunthey Coffe in {{ $blog->category->category }}</strong>
            <p class="card-text mt-2"><small class="text-muted">{{ $blog->created_at->diffForhumans() }}</small></p>
            <hr>
            <p class="deskripsi">{!! $blog->desFull !!}</p>
        </div>
        <div class="komentar">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h1>Komentar</h1>
                    @if(session()->has('success'))
                    
                    <div class="alert my-3 alert-primary" role="alert">
                      {{ session('success') }}
                    </div>
                    @endif

                    <form method="POST" action="/blogs/{{ $blog->slug }}">
                        @csrf
                        @if(auth()->user())
                        <input type="hidden" name="blogs_id" value="{{ $blog->id }}">
                        @endif
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" placeholder="Username" name="username" required aria-label="Username" aria-describedby="addon-wrapping"
                            @if(auth()->user())
                            value="{{ old('username', auth()->user()->username) }}"
                            @endif
                             >
                          </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-envelope-open-fill"></i></span>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="namaLengkap" 
                            @if(auth()->user())
                            value="{{ old('namaLengkap', auth()->user()->nama) }}"
                            @endif
                             required aria-label="Username" aria-describedby="addon-wrapping">
                          </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-pencil-fill"></i></span>
                            <input type="text" class="form-control" placeholder="komentar" name="komentar" required aria-label="Username" aria-describedby="addon-wrapping">
                          </div>
                          @if(auth()->user())
                          <button type="submit" class="btnKomentar" name="button">Submit</button>
                          @else
                          <button class="btnKomentar" name="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
                          @endif
                    </form>
                </div>
                
               <div class="allKomentar">
                <div class="row">
                  @if($komentar->count())
                  @foreach($komentar as $people)
                  <div class="col-sm-12 col-md-12 loping">
                      <strong>{{ $people->namaLengkap }}</strong>
                      <p>{{ $people->komentar }}</p>
                  </div>
                  @endforeach
                  @else
                  <p style="background-color:red; margin:20px auto; padding:5px 10px; border-radius:5px; width:fit-content">Belum Ada Komentar</p>
                  @endif
                </div>
            </div>
            </div>
        </div>
       </div>
    </div>

    <script>

        //    mode dark started

    $('.bi-moon-fill').on('click',function(){
        $('.bi-moon-fill').toggleClass('bi-sun-fill')
        $('body').toggleClass('changeToDark')
    })
    //    mode dark finished
    
    // jquery navbar started
        $(window).scroll(function(){
            const scroll = $(this).scrollTop()
            if(scroll > $('.navbarSlide').offset().top -250){
                $('.navbar').addClass('changeColor')
            } else {
                $('.navbar').removeClass('changeColor')
            }
        })
        // jquery navbar finished

        
        // notification click started
        $('.bell').on('click',function(){
            $('.floating').toggleClass('active')
        })
        // notification click finished
    </script>
@endsection

