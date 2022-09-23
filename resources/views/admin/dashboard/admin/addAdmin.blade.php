@extends('admin.layout.layout')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="title">
                    <h3 class="page-title mb-4">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                          <i class="mdi mdi-home"></i>
                        </span> Add Admin
                    </h3>
                </div>
            <form method="POST" action="/dashboard/admin/store">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nama" id="floatingInput" placeholder="sunthey coffe">
                <label for="floatingInput">Nama</label>
              </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" id="floatingInput" placeholder="suntheycoffe">
                <label for="floatingInput">Username</label>
              </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="level" id="floatingInput" value="admin" readonly placeholder="suntheycoffe">
                <label for="floatingInput">Level</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
              <button type="submit" name="submit" class="btn btn-primary d-flex mt-4">Submit</button>
            </form>
            </div>
        </div>
    </div>
@endsection