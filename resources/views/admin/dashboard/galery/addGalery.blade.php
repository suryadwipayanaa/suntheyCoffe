@extends('admin.layout.layout')

@section('container')
    <div class="contaner">
       <div class="row">
        <div class="col-lg-8">
            <h3 class="page-title mb-4">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Add Galery
            </h3>
                <form method="post" action="/dashboard/galery" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="name@example.com" required onfocus="" value="{{ old('nama') }}">
                        <label for="nama">nama</label>
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

                      <button type="submit" name="submit" class="btn-tambah bg-gradient-primary">Tambah Galery</button>
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

       previewImage = () =>{
        const image = document.querySelector('#image')
        const imagePreview = document.querySelector('#imagePreview')

        imagePreview.style.display = 'block'
        imagePreview.style.width = '300px'
        imagePreview.style.marginBottom = '20px'

        const reader = new FileReader()
        reader.readAsDataURL(image.files[0])

        reader.onload=(e)=>{
            imagePreview.src = e.target.result
        }
       }


     </script>
@endsection