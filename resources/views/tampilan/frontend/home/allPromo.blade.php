@extends('tampilan.layout.layout')

@section('container')
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

       {{-- diskon started --}}
       <div class="intro" id="diskon">
        <div class="allPromoTitle">
            <h2>Semua Promo</h2>
        </div>
        <hr>
        <br>
        <div class="navbarSlide"></div>
        <div class="container">
            @foreach($promos as $promo)
            <div class="row mb-5">
              <div class="col-sm-12 col-md-6 kiri" style="text-align: center;">
                <h1>Promo Sunthey Coffe</h1>
                <strong style="margin: 20px auto"><i class="bi bi-bicycle"></i> {{ $promo->promo }}</strong>
                <p>{!! $promo->deskripsi !!}</p>
            </div>
            <div class="col-sm-12 col-md-6 img">
                <p class="promo">Promo Spesial</p>
                <img src="{{ url('storage/'.$promo->image) }}">
            </div>
        </div>
        <hr>
        <br>
        @endforeach
        </div>
    </div>
    {{-- diskon finished --}}


    <script>
        // jquery header started
        $(window).on('load',function(){
              $('header img').addClass('slideLeft')
              $('header .kanan').addClass('slideright')
          })
          // jquery header finished

            // jquery promo sunthey coffe started
        $(window).scroll(function(){
            const scroll = $(this).scrollTop();
            if(scroll > $('#diskon').offset().top -350){
                $('#diskon .kiri').addClass('slideLeftPromo')
                $('#diskon img').addClass('slideRightPromo')
            } else {
                $('#diskon .kiri').removeClass('slideLeftPromo')
                $('#diskon img').removeClass('slideRightPromo')
            }
        })

        // promo finished
  </script>
@endsection
