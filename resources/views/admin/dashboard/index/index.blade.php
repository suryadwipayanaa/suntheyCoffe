@extends('admin.layout.layout')

@section('container')
<div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> Dashboard
    </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        </li>
      </ul>
    </nav>
  </div>
  <div class="row">
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-danger card-img-holder text-white">
        <div class="card-body">
          <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">All Produk <i class="mdi mdi-chart-line mdi-24px float-right"></i>
          </h4>
          <h2 class="mb-5">{{ $allProduk->count() }} Produk</h2>
          <h6 class="card-text">The Best Our Menu</h6>
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-info card-img-holder text-white">
        <div class="card-body">
          <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">All Promo <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
          </h4>
          <h2 class="mb-5">{{ $allPromo->count() }} Promo</h2>
          <h6 class="card-text">Terhitung Sejak 20 Desember 2021</h6>
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-success card-img-holder text-white">
        <div class="card-body">
          <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Our Blogs <i class="mdi mdi-diamond mdi-24px float-right"></i>
          </h4>
          <h2 class="mb-5">{{ $blog->count() }} Blog</h2>
          <h6 class="card-text">Sejak Website Ini Dibuat</h6>
        </div>
      </div>
    </div>
  </div>
@endsection
