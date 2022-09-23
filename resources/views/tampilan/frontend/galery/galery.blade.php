@extends('tampilan.layout.layout')

@section('container')

{{-- Notification started --}}
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
{{-- Notification Finished --}}

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

    {{-- content started --}}
    <div class="navbarSlide"></div>
    <content>
        <div class="galery">
            <div class="container">
                <div class="title">
                    <h1>Our Galeries</h1>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <img src="{{ url('storage/'.$galery[0]->image) }}" class="img-fluid" style="height: 450px; width:100%; object-fit:cover;">
                    </div>
                </div>
                <div class="row mt-3">
                    @foreach($galery->skip(1) as $galeries)
                    <div class="col-sm-12 col-md-4 mb-3">
                        <img src="{{ url('storage/'.$galeries->image) }}" class="img-fluid">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </content>
    {{-- content Finished --}}

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

        // navbar slideDown Started
        $(window).scroll(function(){
            const scroll = $(this).scrollTop()
            if(scroll > $('.navbarSlide').offset().top -250){
                $('.navbar').addClass('changeColor')
            } else {
                $('.navbar').removeClass('changeColor')
            }
        })
        // navbar slideDown Finsihed
    </script>

@endsection