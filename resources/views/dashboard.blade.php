<style>
    /* Card Styling */
    .custom-shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.2s ease-in-out;
    }
    .custom-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .card-link {
        text-decoration: none;
        color: inherit;
    }
    .delete-icon {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        font-size: 1.2rem;
        transition: color 0.2s ease-in-out;
    }
    .text-dark .delete-icon {
        color: #000;
    }
    .text-white .delete-icon {
        color: #fff;
    }
    .delete-icon:hover {
        color: #ff4d4d !important;
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
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        max-width: 800px;
        max-height: 80vh;
        width: 90%;
        margin: 0 auto;
        position: relative;
        z-index: 1001;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .modal img {
        max-width: 80%;
        max-height: 70vh;
        border-radius: 8px;
        object-fit: contain;
    }

    .close-modal {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 1.5rem;
        cursor: pointer;
        color: #555;
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
</style>

<x-nav-layout>
    <div class="container mt-5">
        <div class="row mt-8">
            <h4 class="text-primary pb-2 border-bottom border-primary"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</h4>
            
            <!-- Check if there are any posts -->
            @if ($posts->isEmpty())
                <p class="text-muted">No posts available at the moment.</p>
            @else
                <!-- Loop through posts if available -->
                @foreach ($posts as $post)
                    <div class="d-flex align-items-start gap-3 border-bottom py-2 border-secondary">
                        <div class="rounded overflow-hidden thumbnail-container" onclick="openModal('{{ asset('storage/'.$post->image) }}', event)" style="width: 70px; height: 70px; flex-shrink: 0;">
                            @if ($post->image)
                                <img src="{{ asset('storage/'.$post->image) }}" alt="Found Item Image" class="w-100 h-100 object-cover thumbnail-img">
                            @endif
                        </div>
                        <div class="flex-fill">
                            <a href="{{ route('post.show', $post->id) }}" class="card-link">
                                <h1 class="font-weight-bold h5 mb-1">{{ $post->Title }}</h1>
                                <p class="mb-2 text-muted small">Created: {{ $post->created_at->diffForHumans() }}</p>
                                <div class="overflow-hidden mb-2" style="height: 80px;">
                                    <p class="small">
                                        {{ Str::words($post->Body, 18) }}
                                    </p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between justify-content-md-end gap-2">
                                    <div class="d-flex align-items-center p-2 rounded bg-light gap-2">
                                        <i class="fas fa-eye"></i>
                                        <p class="small font-weight-medium mb-0">{{ $post->views }}</p>
                                    </div>
                                    <button class="btn p-0">
                                        <i class="fas fa-flag p-2 rounded bg-light"></i>
                                    </button>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <!-- Scroll-to-top button -->
        <button id="scrollToTopBtn" class="scroll-top">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>

    <!-- Modal for Full Image View -->
    <div id="imageModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <img id="modalImage" src="" alt="Full Image View">
        </div>
    </div>

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

    // Function to open the modal with the full image
    function openModal(imageUrl, event) {
        event.stopPropagation(); // Prevent link from being followed
        document.getElementById('modalImage').src = imageUrl;
        document.getElementById('imageModal').style.display = 'flex';
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById('imageModal').style.display = 'none';
    }

    // Close the modal when clicking outside the modal content
    window.onclick = function(event) {
        const modal = document.getElementById('imageModal');
        if (event.target === modal) {
            closeModal();
        }
    };
</script>
