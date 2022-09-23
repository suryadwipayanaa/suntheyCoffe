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

    <div class="category">
        <div class="title">
            <h1 class="text-center">Our Category</h1>
        </div>
        <div class="container">
            <div class="row">
                @foreach($categories as $category)
                <div class="col-sm-12 col-md-4">
                   <a href="/blogs">
                    <div class="image">
                        <h5 class="floatingCategory">{{ $category->category }}</h5>
                        <img src="{{ url('storage/'.$category->image) }}" width="100%">
                      </div>
                   </a>
                  </div>
                @endforeach
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
