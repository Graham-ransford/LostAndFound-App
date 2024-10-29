<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
  <div class="container p-5 shadow-lg rounded bg-white">
    <div class="row">
      <div class="col-lg-6 d-none d-lg-block">
        <img src="https://source.unsplash.com/600x800/?school,students" alt="Login Image" class="img-fluid rounded">
      </div>
      <div class="col-lg-6">
        <h2 class="text-center">Login</h2>
        <p class="text-center text-muted">Welcome back! Please log in to your account.</p>
        
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="example@example.com" value="{{ old('email') }}">
            @error('email')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="********" name="password">
            @error('password')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="d-flex align-items-center mb-4">
            <input type="checkbox" class="form-check-input me-2" id="remember" name="remember">
            <label for="remember" class="form-check-label">Remember me</label>
          </div>
          <div class="mb-3 d-flex justify-content-between">
            <a class="text-decoration-none" href="{{ route('signup') }}">Create Account</a>
            <a href="#" class="d-flex align-items-center text-decoration-none">
              <i class="fab fa-google me-2"></i> Sign in with Google
            </a>
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
