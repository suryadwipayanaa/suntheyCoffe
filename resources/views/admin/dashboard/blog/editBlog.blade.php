@extends('admin.layout.layout')

@section('container')
    <div class="contaner">
       <div class="row">
        <div class="col-lg-8">
            <h3 class="page-title mb-4">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Edit Blog
            </h3>
                <form method="post" action="/dashboard/blog/{{ $blog->slug }}" enctype="multipart/form-data">
                  @method('put')
                    @csrf
                    <input type="hidden" name="oldImage" value="{{ $blog->image }}">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="name@example.com" required onfocus="" value="{{ old('title', $blog->title) }}">
                        <label for="title">Title Produk</label>
                        @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                      </div>

                      <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="slug" required value="{{ old('slug', $blog->slug) }}">
                        <label for="slug">Slug</label>
                        <p style="margin: 2px 5px; font-weight:100">Otomatis Digenerate</p>
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>


                      <div class="mb-3">
                      <label for="category_id">Category</label>
                      <select class="form-select" name="category_id" aria-label="Default select example">
                       @foreach($category as $cate)
                      @if(old('category_id') == $cate->id)
                      <option value="{{ $cate->id }}" selected>{{ $cate->category }}</option>
                      @else
                      <option value="{{ $cate->id }}">{{ $cate->category }}</option>
                      @endif
                       @endforeach
                      </select>
                    </div>

                      <div class="mb-4">
                        @if($blog->image)
                          <div class="row">
                            <div class="col-sm-12 col-md-6">
                              <img id="imagePreview" src="{{ url('storage/'.$blog->image) }}" class="img-fluid">
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
                        <label for="desFull" class="form-label">Deskripsi</label>
                          @error('desFull')
                            {{ $message }}
                          @enderror
                        <input id="desFull" type="hidden" name="desFull" value="{{ old('desFull', $blog->desFull) }}">
                        <trix-editor input="desFull"></trix-editor>
                      </div>

                      <button type="submit" name="submit" class="btn-tambah bg-gradient-primary">Tambah Postingan</button>
                </form>
        </div>
       </div>
    </div>

    <script>
        
        const nama = document.querySelector('#title')
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

