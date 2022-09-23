@extends('admin.layout.layout')

@section('container')
    <div class="contaner">
       <div class="row">
        <div class="col-lg-8">
            <h3 class="page-title mb-4">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span>Edit Komentar
            </h3>
                <form method="post" action="/dashboard/peopleSay/{{ $say->slug }}" enctype="multipart/form-data">
                  @method('put')
                    @csrf
                    <input type="hidden" name="oldImage" value="{{ $say->image }}">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="name@example.com" required onfocus="" value="{{ old('nama',$say->nama) }}">
                        <label for="nama">nama</label>
                        @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                      </div>

                      <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="slug" required value="{{ old('slug',$say->slug) }}">
                        <label for="slug">Slug</label>
                        <p style="margin: 2px 5px; font-weight:100">Otomatis Digenerate</p>
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="mb-4">
                        @if($say->image)
                          <div class="row">
                            <div class="col-sm-12 col-md-6">
                              <img id="imagePreview" src="{{ url('storage/'.$say->image) }}" class="img-fluid">
                            </div>
                          </div>
                        @endif
                        <label for="image" class="form-label">Upload Image</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()" value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      
                      <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                          @error('deskripsi')
                            {{ $message }}
                          @enderror
                        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $say->deskripsi) }}">
                        <trix-editor input="deskripsi"></trix-editor>
                      </div>

                      <button type="submit" name="submit" class="btn-tambah bg-gradient-primary">Edit Komentar</button>
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