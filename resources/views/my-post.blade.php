<style>
    /* Card Shadow and Hover Effect */
    .custom-shadow {
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        border-radius: 8px;
    }
    
    .custom-shadow:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    /* Delete Icon */
    .delete-icon {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #ffffff;
        background-color: rgba(255, 0, 0, 0.7);
        padding: 4px 8px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }
    
    .delete-icon:hover {
        background-color: #ff0000;
    }

    /* Scroll-to-Top Button */
    .scroll-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: none;
        background-color: #444;
        color: white;
        border: none;
        border-radius: 50%;
        padding: 10px;
        font-size: 18px;
        cursor: pointer;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease;
    }
    
    .scroll-top:hover {
        background-color: #666;
    }

    /* Image Container and Hover Effect */
   
    
    .card-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease, filter 0.3s ease;
        filter: brightness(90%);
    }
    .card-link {
        text-decoration: none;
        color: inherit;
    }
    .card-img:hover {
        transform: scale(1.05);
        filter: brightness(100%);
    }

    /* Card Text Colors */
    .card {
        color: #444;
    }

    .card h5, .card p {
        color: inherit;
    }
    
    /* Adjust text color per card background for readability */
    .bg-primary, .bg-dark, .bg-danger {
        color: #f8f9fa;
    }

    .bg-warning, .bg-light {
        color: #333;
    }
    
    /* Thumbnail styling */
    .thumbnail-container {
        width: 80px;
        height: 80px;
        padding: 5px;
        overflow: hidden;
        border-radius: 10px;
        margin-bottom: 10px;
        cursor: pointer;
    }
    .thumbnail-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    .thumbnail-img:hover {
        transform: scale(1.1);
    }

    /* Modal Styling */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
     
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .modal-content {
        background-color: #fff;
        /* padding: 20px; */
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        max-width: 70%;
        max-height: 50vh;
        width: auto;
        margin: 0 20px;
        position: relative;
        left: 10%;
        top: 20%;
    }
    .modal img {
        width: 100%;
        height: auto;
        max-height: 70vh;
        border-radius: 8px;
    }
    .close-modal {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 1.5rem;
        cursor: pointer;
        color: #555;
    }
    
</style>

<x-nav-layout>
    <div class="container mt-5">
        <div class="row mt-8">
            @php
                $colors = ['bg-primary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-light', 'bg-dark'];
            @endphp
            <h4 class="text-primary pb-2 border-bottom border-primary">
                <i class="fas fa-clipboard"></i> My Post
            </h4>

            <a href="{{ route('post.index') }}" style="text-decoration: none; font-weight:bold;">
                <i class="fas fa-arrow-left mb-3"></i> Dashboard
            </a>
            @if (session('delete'))
                <div>
                    <p class="text-danger">{{ session('delete') }}</p>
                </div>
            @endif

            @foreach ($posts as $index => $post)
                <div class="col-md-4 col-sm-6 mb-4">
                    @php
                        $bgColor = $colors[$index % count($colors)];
                        $textColorClass = in_array($bgColor, ['bg-light', 'bg-warning']) ? 'text-dark' : 'text-white';
                    @endphp
                <a href="{{ route('post.show', $post->id) }}" class="card-link">
                    <div class="card custom-shadow position-relative {{ $bgColor }} {{ $textColorClass }}">
                        <!-- Delete Icon -->
                        <form method="post" action="{{ route('post.destroy', $post) }}">
                            @method('DELETE')
                            @csrf
                            <button class="btn fas fa-trash delete-icon"></button>
                        </form>
                         <!-- Image section, click to preview in modal -->
                    @if ($post->image)
                    <div class="thumbnail-container" onclick="openModal('{{ asset('storage/'.$post->image) }}', event)">
                        <img src="{{ asset('storage/'.$post->image) }}" alt="Post Thumbnail" class="thumbnail-img">
                    </div>
                @endif
        
                <!-- Card body, -->
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->Title }}</h5>
                        <p class="card-text">{{ Str::words($post->Body, 18) }}</p>
                        <p class="timestamp">Created {{ $post->created_at->diffForHumans() }}</p>
                    </div>
            </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Scroll-to-top button -->
    <button id="scrollToTopBtn" class="scroll-top">
        <i class="fas fa-arrow-up"></i>
    </button>
</x-nav-layout>

<script>
    // Scroll-to-top functionality
    window.onscroll = function () {
        const scrollToTopBtn = document.getElementById("scrollToTopBtn");
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            scrollToTopBtn.style.display = "block";
        } else {
            scrollToTopBtn.style.display = "none";
        }
    };

    document.getElementById("scrollToTopBtn").onclick = function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };
</script>
