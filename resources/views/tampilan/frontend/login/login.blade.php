<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('/style/login.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>{{ $title }}</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="login">
        <div class="background">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <img src="{{ url('/images/place.jpg') }}" width="100%">
                        <p>Sunthey Coffe 2022</p>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <h1>Login <span>Area</span></h1>
                        @if(session()->has('sucess'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('sucess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        @if(session()->has('successLogout'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('successLogout') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                
                        @if(session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                       <form method="POST" action="/login">
                        @csrf
                        <div class="form-floating mb-3">
                            <i class="bi bi-person-fill"></i></label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Username</label>
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="form-floating">
                            <i class="bi bi-key-fill"></i>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <button type="submit" name="submit" class="btn btnLogin">Login</button>
                          <br>
                          <strong>Dont't have any account ? <a href="/register">Register</a></strong>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

</body>
</html>