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

    {{-- content started --}}
    <content>
        {{-- intro started --}}
        <div class="intro">
            <div class="navbarSlide"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <img src="{{ url('/images/place.jpg') }}">
                    </div>
                    <div class="col-sm-12 col-md-6 kanan">
                        <h1>Sunthey Coffe</h1>
                        <strong>The Best Coffe</strong>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae impedit aspernatur eligendi sapiente quos laboriosam rerum, a dolorum! Necessitatibus deserunt ea inventore. Quo, labore ea nisi accusamus ipsum ipsa blanditiis consequuntur repellat consectetur. Quidem quaerat porro consequuntur, sint ad dolorum tenetur illo doloribus est dicta, deserunt necessitatibus iure fugit nam?</p>
                        <a href="/blogs">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- intro finished --}}
        {{-- produk terbaru started --}}
        <div class="produkTerbaru">
            <div class="container">
                <div class="title">
                    <h1>Produk Terbaru</h1>
                <strong>Rasa Dan Kwalitas Dijamin</strong>
                <p class="atas">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus sed quaerat sapiente eaque consectetur aperiam ut ratione corrupti. Optio voluptatibus non officiis recusandae molestias nostrum labore quia odit voluptas sequi!</p>
               </div>
                <div class="row">
                   @foreach($produkTerbarus as $produkTerbaru)
                   <div class="col-sm-12 col-md-4">
                    <div class="card" style="width: 100%">
                        <div class="produkCatagori">
                            <p>{{ $produkTerbaru->category->category }}</p>
                        </div>
                        <img src="{{ url('storage/'.$produkTerbaru->image) }}" class="card-img-top" alt="Menu">
                        <div class="card-body">
                          <h5 class="card-title">{{ $produkTerbaru->nama }}</h5>
                          <p class="card-text">{!! $produkTerbaru->deskripsi !!}</p>
                          <a href="#allmenu" class="btn">Visit Product</a>
                        </div>
                      </div>
                </div>
                   @endforeach
                </div>
            </div>
        </div>
        {{-- produk terbaru finished --}}

        {{-- diskon started --}}
        <div class="intro" id="diskon">
            <div class="navbarSlide"></div>
            <div class="container">
                <div class="row">
                  @foreach($promos as $promo)
                  <div class="col-sm-12 col-md-6 kiri" style="text-align: center;">
                    <h1>Promo Sunthey Coffe</h1>
                    <strong style="margin: 20px auto"><i class="bi bi-bicycle"></i> {{ $promo->promo }}</strong>
                    <p>{!! $promo->deskripsi !!}</p>
                    <a href="/home/allPromo" style="margin:auto">Cek Semua Promo</a>
                </div>
                <div class="col-sm-12 col-md-6 img">
                    <p class="promo">Promo Spesial</p>
                    <img src="{{ url('storage/'.$promo->image) }}">
                </div>
                  @endforeach
                </div>
            </div>
        </div>
        {{-- diskon finished --}}

        {{-- All menu started --}}
        <div class="allMenu" id="allMenu">
            <div class="container">
                <div class="title">
                    <h1>Full Menu</h1>
                    <strong>Dijamin memuaskan</strong>
                    <p class="atas">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus est cumque ad corporis libero quod possimus harum perferendis dolor quaerat.!</p>
                </div>
                <hr>
           <div class="swiper newswiper row">
            <div class="swiper-wrapper col-md-3 col-sm-3">
                    <div class="swiper-slide aktif" id="allmenu">
                        All Menu
                    </div>
                    @foreach($categories as $category)
                    <div class="swiper-slide" id="{{ $category->id }}">
                        {{ $category->category }}
                    </div>
                    @endforeach
            </div>
            <br>
            <br>
            <br>
            <div class="swiper-pagination"></div>
           </div>
           <div class="allMenuTitle">
            <h4>All Menu</h4>
        </div>
        <div class="row justify-content-end">
            <div class="col-sm-12 col-md-6 my-3">
                <form class="d-flex" role="search" id="search">
                    <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
                    <button class="btn-input" id="btnSearch" type="submit">Search</button>
                  </form>
            </div>
        </div>
           <div class="menu">
            {{-- card started --}}
            <div class="row">
              @foreach($allProduk as $produk)
              <div class="col-sm-12 col-md-4 mb-3">
                <div class="card">
                    <div class="produkCatagori">
                        <p>{{ $produk->category->category }}</p>
                    </div>
                    <img src="{{ url('storage/',$produk->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $produk->nama }}</h5>
                      <p class="card-text">{{ $produk->deskripsi }}</p>
                      <a href="#" class="btn btn-primary"><i class="bi bi-currency-dollar"></i> {{ $produk->harga }}</a>
                    </div>
                  </div>
            </div>
              @endforeach
            </div>
            {{-- card finished --}}
           </div>
            </div>
        </div>
        {{-- All menu finished --}}

        {{-- People Say Started --}}
        <div class="peopleSay">
            <div class="container">
                <div class="title mb-4">
                    <h2>What People Say?</h2>
                </div>
                <div class="row">
                  @foreach($peopleSay as $say)
                  <div class="col-sm-12 col-md-4">
                    <div class="card">
                        <img src="{{ url('storage/'.$say->image) }}"  class="card-img-top" width="100%" >
                        <div class="card-body">
                          <h5 class="card-title">{{ $say->nama }}</h5>
                          <p class="card-text">{!! $say->deskripsi !!}</p>
                        </div>
                      </div>
                </div>
                  @endforeach
                </div>
            </div>
        </div>
        {{-- People Say Finished--}}

    </content>
    {{-- content finished --}}


    {{-- jquery started --}}
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

        // jquery intro started
        $(window).scroll(function(){
            const scroll = $(this).scrollTop();
            if(scroll > $('.intro').offset().top -250){
                $('.intro img').addClass('slide')
                $('.intro .kanan').addClass('slideKanan')
            } else {
                $('.intro img').removeClass('slide')
                $('.intro .kanan').removeClass('slideKanan')
            }
        })
        // jquery intro finished

        // jquery produk terbaru started
        $(window).scroll(function(){
            const scroll = $(this).scrollTop();
            if(scroll > $('.produkTerbaru .title').offset().top - 250){
                $('.produkTerbaru .title').addClass('slideDown')
            } else {
                $('.produkTerbaru .title').removeClass('slideDown')
                
            }
        })

        $(window).scroll(function(){
            const scroll = $(this).scrollTop()
            if(scroll > $('.produkTerbaru .card').offset().top -250){
                $('.produkTerbaru .card').each(function(i){
                    setTimeout(function(){
                        $('.produkTerbaru .card').eq(i).addClass('slideDownCard')
                    },300*(i+1))
                });
            } else {
                $('.produkTerbaru .card').eq(i).removeClass('slideDownCard')
            }
        })

        // jquery produk terbaru finished

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


        $('.allMenu .swiper-slide').on('click',function(){
            $('.allMenu .swiper-slide').removeClass('aktif')
            $(this).addClass('aktif')
             
            let katagory = $(this).html()
            $('.allMenu h4').html(katagory)
        })

        $(window).scroll(function(){
            const scroll = $(this).scrollTop()
            if(scroll > $('.allMenu .title').offset().top - 250){
                $('.allmenu .title').addClass('allMenuSlideDown')
            } else {
                $('.allmenu .title').removeClass('allMenuSlideDown')
            }
        })

        // jquery loping makanan started

        $('.allMenu .swiper-slide').on('click',function(){
           const id = $(this).attr('id');
                if(id == 1){
                   $('.menu').html(`
                   <div class="row">
              @foreach($makanan as $produk)
              <div class="col-sm-12 col-md-4 mb-3">
                <div class="card">
                    <img src="{{ url('storage/',$produk->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $produk->nama }}</h5>
                      <p class="card-text">{{ $produk->deskripsi }}</p>
                      <a href="#" class="btn btn-primary"><i class="bi bi-currency-dollar"></i> {{ $produk->harga }}</a>
                    </div>
                  </div>
            </div>
              @endforeach
            </div>
                   `)
                } else if(id == 2){
                    $('.menu').html(`
                   <div class="row">
              @foreach($minuman as $produk)
              <div class="col-sm-12 col-md-4 mb-3">
                <div class="card">
                    <img src="{{ url('storage/',$produk->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $produk->nama }}</h5>
                      <p class="card-text">{{ $produk->deskripsi }}</p>
                      <a href="#" class="btn btn-primary"><i class="bi bi-currency-dollar"></i> {{ $produk->harga }}</a>
                    </div>
                  </div>
            </div>
              @endforeach
            </div>
                   `)
                } else if(id == 3){
                    $('.menu').html(`
                   <div class="row">
              @foreach($dessert as $produk)
              <div class="col-sm-12 col-md-4 mb-3">
                <div class="card">
                    <img src="{{ url('storage/',$produk->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $produk->nama }}</h5>
                      <p class="card-text">{{ $produk->deskripsi }}</p>
                      <a href="#" class="btn btn-primary"><i class="bi bi-currency-dollar"></i> {{ $produk->harga }}</a>
                    </div>
                  </div>
            </div>
              @endforeach
            </div>
                   `)
                } else {
                    $('.menu').html(`
                    <div class="row">
              @foreach($allProduk as $produk)
              <div class="col-sm-12 col-md-4 mb-3">
                <div class="card">
                    <div class="produkCatagori">
                        <p>{{ $produk->category->category }}</p>
                    </div>
                    <img src="{{ url('storage/',$produk->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $produk->nama }}</h5>
                      <p class="card-text">{{ $produk->deskripsi }}</p>
                      <a href="#" class="btn btn-primary"><i class="bi bi-currency-dollar"></i> {{ $produk->harga }}</a>
                    </div>
                  </div>
            </div>
              @endforeach
            </div>
                    `)
                }
        })


        // jquery looping makanan finsihed
        
          // jquery promo sunthey coffe finished

    </script>
    {{-- jquery finished --}}
@endsection
