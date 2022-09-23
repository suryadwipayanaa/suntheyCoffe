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

    {{-- contact us started --}}
    <div class="navbarSlide"></div>
    <div class="contactUs">
        <div class="container">
            <div class="title text-center">
                <h1>Contact Us</h1>
            </div>
            <div class="row align-items-center">
                @foreach($contacts as $contact)
                <div class="col-sm-12 col-md-6">
                    <div class="gambar">
                        <img src="{{ url('storage/'.$contact->image) }}" alt="" width="100%">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <a href="{{ $contact->linkMap }}"><i class="bi bi-person-badge-fill"></i> {{ $contact->nama }}</a>
                    <a href="{{ $contact->linkMap }}"><i class="bi bi-geo-alt-fill"></i> {{ $contact->alamat }}</a>
                    <a href="mailto:{{ $contact->email }}"><i class="bi bi-envelope-fill"></i> {{ $contact->email }}</a>
                    <a href="https://instagram.com/"><i class="bi bi-instagram"></i> {{ $contact->instagram }}</a>
                    <a href="https://wa.me/{{ $contact->whatsapp }}"><i class="bi bi-telephone-forward-fill"></i> {{ $contact->telp }}</a>
                    <a href="https://wa.me/{{ $contact->whatsapp }}"><i class="bi bi-whatsapp"></i> {{ $contact->whatsapp }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- contact us fnished --}}


    <script>
        // jquery header started
        $(window).on('load',function(){
            $('header img').addClass('slideLeft')
            $('header .kanan').addClass('slideright')
        })

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
        // jquery header finished

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