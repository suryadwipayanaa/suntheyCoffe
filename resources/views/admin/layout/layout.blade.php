<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sunthey Coffe | {{ $title }}</title>
    <link rel="stylesheet" href="{{ url('/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/pure.css') }}">
    <link rel="shortcut icon" href="{{ url('/assets/images/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/trix.css') }}">
    <script type="text/javascript" src="{{ url('trix.js') }}"></script>
    <style>
      trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
      }

      .active{
        color: #51a8ed;
      }
    </style>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-scroller">
     
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="/dashboard"><img src="{{ url('/assets/images/logo.svg') }}" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="/dashboard"><img src="{{ url('/assets/images/logo-mini.svg') }}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
      
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
             <form method="post" action="/logout">
                @csrf
                <button type="submit" name="submit" class="btn btn-primary" style="font-weight: bold">Logout <i class="bi bi-box-arrow-in-right"></i></button>
             </form> 
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{ url('/assets/images/faces/face1.jpg') }}" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">Surya</span>
                  <span class="text-secondary text-small">Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/dashboard">
                <span class="menu-title">Dashboard</span>
                <i class="bi bi-house-door-fill menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/dashboard/category">
                <span class="menu-title">Category</span>
                <i class="bi bi-clipboard-fill menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/dashboard/promo">
                <span class="menu-title">Promo Terbaru</span>
                <i class="bi bi-currency-dollar menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/dashboard/allProduk">
                <span class="menu-title">All Produk</span>
                <i class="bi bi-journals menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/dashboard/peopleSay">
                <span class="menu-title">People Say</span>
                <i class="bi bi-people-fill menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/dashboard/galery">
                <span class="menu-title">Galery</span>
                <i class="bi bi-images menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/dashboard/contact">
                <span class="menu-title">Contact</span>
                <i class="bi bi-person-lines-fill menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/dashboard/blog">
                <span class="menu-title">Blogs</span>
                <i class="bi bi-bookmarks-fill menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/dashboard/komentar">
                <span class="menu-title">Komentar</span>
                <i class="bi bi-bookmarks-fill menu-icon"></i>
              </a>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center mt-4 px-3 mb-2 text-muted">
              <span>Administrator</span>
            </h6>
            <li class="nav-item">
              <a class="nav-link" href="/dashboard/admin">
                <span class="menu-title">Tambah Admin</span>
                <i class="bi bi-person-plus-fill menu-icon"></i>
              </a>
            </li>
          </ul>
          <ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('container')
            </div>
           </div>
         </div>
       </div>
     </div>
   </div>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ url('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ url('/assets/js/misc.js') }}"></script>
    <!-- JavaScript Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- endinject -->
  
  <script>
    document.addEventListener('trix-file-accept', function(e)){
      e.preventDefault()
    }
  </script>
  </body>
</html>