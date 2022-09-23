@extends('tampilan.layout.layout')

@section('container')

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
                <p>{!! $produkTerbaru->deskripsi !!}</p>
                <p class="harga">Rp. {{ $produkTerbaru->harga }}</p> 
        </div>
        <hr>
        @endforeach
            </div>
        </div>
    </div>
    
     {{-- header started --}}
     <header>
        <div class="container">
            <div class="row align-items-center"> 
                <div class="col-sm-12 col-md-6 kiri">
                        <img src="{{ url('/images/benner.png') }}">
                </div>
                    <div class="col-sm-12 col-md-6 kanan">
                        <h1>Sunthey Coffe</h1>
                        <h5>FRESHLY BREWED</h5>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic sequi nobis repellendus quidem magnam fugiat laudantium dolor quo autem inventore.</p>
                    </div>
            </div>
        </div>
    </header>
    {{-- header finished --}}

    {{-- Blogs started --}}
    <div class="navbarSlide"></div>
    <div class="blogs">
        <div class="container">
            <div class="title text-center">
                <h1>Our Blog's</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti quae sit recusandae, est corrupti omnis quasi quisquam commodi architecto eius?</p>
            </div>
            <div class="row atas">
                <div class="col-sm-12 col-md-12">
                    <div class="card mb-3">
                        <div class="category">{{ $blog[0]->category->category }}</div>
                        <img src="{{ url('storage/'.$blog[0]->image) }}" class="card-img-top" alt="ces">
                        <div class="card-body">
                          <h5 class="card-title">{{ $blog[0]->title }}</h5>
                          <p>Created By <span>Sunthey Coffe</span></p>
                          <p class="card-text">{{ $blog[0]->desSingkat }}</p>
                          <a href="/blogs/{{ $blog[0]->slug }}" class="btn">Read More</a>
                          <p class="card-text"><small class="text-muted">{{ $blog[0]->created_at->diffForhumans() }}</small></p>
                        </div>
                      </div>
                </div>
            </div>
            <div class="row">
                @foreach($blog->skip(1) as $b)
                <div class="col-sm-12 col-md-4">
                    <div class="card">
                        <div class="category">{{ $b->category->category }}</div>
                        <img src="{{ url('storage/'.$b->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{ $b->title }}</h5>
                          <p>Created By <span>Sunthey Coffe</span></p>
                          <p class="card-text">{{ $b->desSingkat }}</p>
                          <a href="/blogs/{{ $b->slug }}" class="btn">Read More</a>
                          <p class="card-text mt-2"><small class="text-muted">{{ $b->created_at->diffForhumans() }}</small></p>
                        </div>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Blog finished --}}


    <script>
          // jquery header started
          $(window).on('load',function(){
            $('header img').addClass('slideLeft')
            $('header .kanan').addClass('slideright')
        })
        // jquery header finished

    //    mode dark started

    $('.bi-moon-fill').on('click',function(){
        $('.bi-moon-fill').toggleClass('bi-sun-fill')
        $('body').toggleClass('changeToDark')
    })
    //    mode dark finished
    

        // notification click started
        $('.bell').on('click',function(){
            $('.floating').toggleClass('active')
        })
        // notification click finished

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

        </script>
@endsection