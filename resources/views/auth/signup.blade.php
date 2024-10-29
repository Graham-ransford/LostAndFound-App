
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
   <!-- Bootstrap CSS -->
   <link href="/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
  {{-- @vite(["resources/css/app.css","resources/js/app.js"]) --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head> 
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
  <div class="container p-5 shadow-lg rounded bg-white">
    <div class="row">
      <div class="col-lg-6 d-none d-lg-block">
        <img src="https://source.unsplash.com/600x800/?school,students" alt="Signup Image" class="img-fluid rounded">
      </div>
      <div class="col-lg-6">
        <h2 class="text-center">Signup</h2>
        <p class="text-center text-muted">Create a new account and join us!</p>

        <form method="POST" action="{{'/'}}">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" placeholder="John Doe" name="name" value="{{old('name')}}">
          @error("name")
            <p class="text-danger">{{$message}}</p>
          @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="text" class="form-control" id="email" placeholder="example@example.com" name="email" value="{{old('email')}}">
            @error("email")
            <p class="text-danger">{{$message}}</p>
          @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control border-3 @error('password')border-danger  @enderror" id="password" placeholder="**********" name="password">
            @error('password')
            <p class=" text-danger">   {{$message}}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control border-3 @error('password')border-danger  @enderror" id="password_confirmation" placeholder="**********" name="password_confirmation">
          </div>
          <div class="mb-3 d-flex justify-content-between" >
            <a class="text-decoration-none" href="{{route("login")}}">Already have Account</a>
            <a href="#" class="d-flex align-items-center text-decoration-none">
              <i class="fab fa-google me-2"></i>Google
            </a>
          </div>
          <button type="submit" class="btn btn-primary w-100">Signup</button>
        </form>
      </div>
    </div>
  </div>
  <script src="/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>

  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>
</html>
