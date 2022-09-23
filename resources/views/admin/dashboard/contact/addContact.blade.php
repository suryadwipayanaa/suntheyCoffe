@extends('admin.layout.layout')

@section('container')
    <div class="contaner">
       <div class="row">
        <div class="col-lg-8">
            <h3 class="page-title mb-4">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Add Contact
            </h3>
                <form method="post" action="/dashboard/contact" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="name@example.com" required onfocus="" value="{{ old('nama') }}">
                        <label for="nama">Nama</label>
                        @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                      </div>

                      <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="slug" required value="{{ old('slug') }}">
                        <label for="slug">Slug</label>
                        <p style="margin: 2px 5px; font-weight:100">Otomatis Digenerate</p>
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('linkMap') is-invalid @enderror" name="linkMap"  placeholder="name@example.com" required onfocus="" value="{{ old('linkMap') }}">
                        <label for="linkMap">Link Map</label>
                        @error('linkMap')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                      </div>

                      <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"  placeholder="name@example.com" required onfocus="" value="{{ old('alamat') }}">
                        <label for="alamat">Alamat</label>
                        @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                      </div>

                      <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="name@example.com" required onfocus="" value="{{ old('email') }}">
                        <label for="email">Email</label>
                        @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                      </div>

                      <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram"  placeholder="name@example.com" required onfocus="" value="{{ old('instagram') }}">
                        <label for="instagram">Instagram</label>
                        @error('instagram')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                      </div>
                      
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp"  placeholder="name@example.com" required onfocus="" value="{{ old('telp') }}">
                        <label for="telp">Telp</label>
                        @error('telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                      </div>
                      
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp"  placeholder="name@example.com" required onfocus="" value="{{ old('whatsapp') }}">
                        <label for="whatsapp">Whatsapp</label>
                        @error('whatsapp')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                      </div>

                      <div class="mb-4">
                        <img id="imagePreview" class="img-fluid">
                        <label for="image" class="form-label">Upload Image</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()" required value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <button type="submit" name="submit" class="btn-tambah bg-gradient-primary">Tambah Contact</button>
                </form>
        </div>
       </div>
    </div>

    <script>
        
        const nama = document.querySelector('#nama')
        const slug = document.querySelector('#slug')

        nama.addEventListener('keyup',function(){
            let newSlug = nama.value
            slug.value = newSlug.replace(/ /g,"-").toLowerCase()
        })

     previewImage=()=>{
        const image = document.querySelector('#image')
        const previewImage = document.querySelector('#imagePreview')

        previewImage.style.width = '300px'
        previewImage.style.marginBottom = '30px'
        previewImage.style.display = 'block'

        const reader = new FileReader()
        reader.readAsDataURL(image.files[0])

        reader.onload=(e)=>{
            previewImage.src = e.target.result
        }
     }


     </script>
@endsection



