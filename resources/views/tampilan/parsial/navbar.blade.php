<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/"><i class="bi bi-cup-hot-fill"></i> Sunthey Coffe</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/')? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('about')? 'active' : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('galery')? 'active' : '' }}" href="/galery">Galery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('contact')? 'active' : '' }}" href="/contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('blogs*')? 'active' : '' }}" href="/blogs">Blogs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('category*')? 'active' : '' }}" href="/category">Category</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item me-3 bell">
            <a class="nav-link active" aria-current="page"><i class="bi bi-bell-fill"></i></a>
          </li>
          <li class="nav-item dark">
            <a class="nav-link active" aria-current="page"><i class="bi bi-moon-fill"></i></a>
          </li>
          @if(auth()->user())
            
            @else
            <li class="nav-item dark">
              <a href="/login" class="nav-link active ms-4 fw-bold" aria-current="page">Login</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>