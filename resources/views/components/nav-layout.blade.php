<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LostAndFound</title>

    <!-- Bootstrap 5 CSS -->
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
       body {
      
        background-size: auto; /* Maintains the image's original size */
        background-position: center; /* Keeps the image centered */
        background-repeat: no-repeat; /* Prevents tiling/repeating */
        background-attachment: fixed; /* Keeps the image fixed when scrolling */
        color: rgb(0, 0, 0);
        display: flex;
        flex-direction: column;
        min-height: 100vh;
}


        /* Navbar Styling */
        .navbar {
            background-color: rgba(0, 0, 0,1);
            padding: 1rem 1rem;
          
         
        }

        .navbar-brand {
            color: #fff;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-toggler {
            border-color: #fff;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 0.55)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .navbar-nav .nav-link {
            color: #f8f9fa;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease-in-out;
        }

        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
            color: #ffc107;
        }

        .dropdown-menu {
            background-color: rgba(0, 0, 0, 0.9);
            border: none;
        }

        .dropdown-menu .dropdown-item {
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: rgba(255, 193, 7, 0.7);
        }

        .form-label {
            color: #000;
            font-weight: bold;
            text-transform: capitalize;
        }

        .footer {
            background-color: rgba(0, 0, 0, 0.7);
            text-align: center;
            padding: 10px;
            margin-top: auto;
            width: 100%;
        }

        .footer a {
            color: #ffc107;
            text-decoration: none;
        }

        .footer a:hover {
            color: #fff;
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LostAndFound</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('post.index') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="fas fa-comments"></i> Chats
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("post.search")}}">
                            <i class="fas fa-search"></i> search
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-thumbtack"></i> Posts
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('create') }}"><i class="fas fa-plus-circle"></i> New Post</a></li>
                            <li><a class="dropdown-item" href="{{ route('MyPost') }}"><i class="fas fa-list-alt"></i> My Posts</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-light">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
    
                    <!-- User Info with Profile Picture -->
                    <li class="nav-item d-flex align-items-center ms-3">
                        <img src="{{ auth()->user()->profile_image ??  asset('storage/images/avatar.png') }}"alt="Profile Picture" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                        <span class="nav-link text-light ms-2">{{ auth()->user()->name }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    

    <!-- Main Content -->
    <div class="container mt-5">
        
        {{$slot}} <!-- Your main content goes here -->
    </div>

    <!-- Footer -->
    <footer class="footer">
        
        <p></p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
<script>
    // Close the navbar when clicking outside of it
    document.addEventListener('click', function(event) {
        const navbar = document.getElementById('navbarNav');
        const toggler = document.querySelector('.navbar-toggler');

        // Check if the clicked target is outside the navbar
        if (!navbar.contains(event.target) && !toggler.contains(event.target)) {
            const collapse = bootstrap.Collapse.getInstance(navbar);
            if (collapse) {
                collapse.hide(); // Hide the navbar
            }
        }
    });
</script>
