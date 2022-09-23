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
        <content>
            <div class="navbarSlide"></div>
            <div class="aboutPlaces">
             <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                         <img src="{{ url('/images/ruangan.jpg') }}" width="100%">
                    </div>
                    <div class="col-sm-12 col-md-6 kanan">
                        <h1>Fasilitas Ruangan</h1>
                        <strong>Ruangan Sangat Bagus Dan Rapi</strong>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nemo facere molestiae illo ipsam, placeat recusandae incidunt. Corrupti, veniam quo! Adipisci minus, reiciendis optio, cumque magnam quia non ratione temporibus eius, dolore recusandae beatae dignissimos fugit repellendus facilis magni? Molestiae, itaque. Reprehenderit libero iusto eaque doloremque vel cum iste deleniti!</p>
                        <a href="/galery" id="btnToGalery">Visit More</a>
                    </div>
                </div>
             </div>
            </div>
            <div class="aboutKaryawan">
             <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 kanan">
                        <h1>Fasilitas Pelayanan</h1>
                        <strong>Pelayanan Sangat Ramah</strong>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nemo facere molestiae illo ipsam, placeat recusandae incidunt. Corrupti, veniam quo! Adipisci minus, reiciendis optio, cumque magnam quia non ratione temporibus eius, dolore recusandae beatae dignissimos fugit repellendus facilis magni? Molestiae, itaque. Reprehenderit libero iusto eaque doloremque vel cum iste deleniti!</p>
                        <a href="/galery" id="btnToGalery">Visit More</a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <img src="{{ url('/images/pelayananRamah.jpg') }}" width="100%">
                   </div>
                </div>
             </div>
            </div>
            <div class="aboutPlaces" id="menuTop">
                <div class="container">
                   <div class="row">
                       <div class="col-sm-12 col-md-6">
                            <img src="{{ url('/images/menuBerkualitas.jpg') }}" width="100%">
                       </div>
                       <div class="col-sm-12 col-md-6 kanan">
                           <h1>Menu Berkualitas</h1>
                           <strong>Kualitas Dan Kerapian Dijamin</strong>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente nemo facere molestiae illo ipsam, placeat recusandae incidunt. Corrupti, veniam quo! Adipisci minus, reiciendis optio, cumque magnam quia non ratione temporibus eius, dolore recusandae beatae dignissimos fugit repellendus facilis magni? Molestiae, itaque. Reprehenderit libero iusto eaque doloremque vel cum iste deleniti!</p>
                           <a href="/galery" id="btnToGalery">Visit More</a>
                       </div>
                   </div>
                </div>
               </div>
        </content>
        {{-- content finished --}}


        <script>

            // jquery header started
        $(window).on('load',function(){
            $('header img').addClass('slideLeft')
            $('header .kanan').addClass('slideright')
        })
        // jquery header finished

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

  //    mode dark started

    $('.bi-moon-fill').on('click',function(){
        $('.bi-moon-fill').toggleClass('bi-sun-fill')
        $('body').toggleClass('changeToDark')
    })
    //    mode dark finished

        // jquery aboutplaces started
        $(window).scroll(function(){
            const scroll = $(this).scrollTop()
            if(scroll > $('.navbarSlide').offset().top -250){
                $('.aboutPlaces img').addClass('active')
                $('.aboutPlaces .kanan').addClass('active2')

            } else {
                $('.aboutPlaces img').removeClass('active')
                $('.aboutPlaces .kanan').removeClass('active2')
            }
        })
        // jquery aboutplaces finished

        $(window).scroll(function(){
            const scroll = $(this).scrollTop()
            if(scroll > $('.aboutKaryawan').offset().top -250){
                $('.aboutKaryawan img').addClass('active3')
                $('.aboutKaryawan .kanan').addClass('active4')
            } else {
                $('.aboutKaryawan img').removeClass('active3')
                $('.aboutKaryawan .kanan').removeClass('active4')

            }
        })

        $(window).scroll(function(){
            const scroll = $(this).scrollTop()
            if(scroll > $('#menuTop').offset().top -250){
                $('#menuTop img').addClass('active5')
                $('#menuTop .kanan').addClass('active6')
            } else {
                $('#menuTop img').removeClass('active5')
                $('#menuTop .kanan').removeClass('active6')

            }
        })
        </script>
@endsection
