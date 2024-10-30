<x-nav-layout>
    <div class="container mt-5">
        <div class="card custom-shadow mb-4" style="background-color: #007bff; color: white;">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-info-circle"></i> {{ $post->Title }}</h5>
                <p class="card-text">{{ $post->Body }}</p>
                <p class="card-text">Created at {{ $post->created_at->diffForHumans() }}</p>
                <div class="text-end">
                    <a href="#" class="btn btn-light">
                        <i class="fas fa-comment-dots"></i> Connect
                    </a>
                </div>
            </div>
        </div>

        <div class="card custom-shadow mb-4" style="background-color: #007bff; color: white;">
            <div class="card-body">
                
                <p class="card-text">
                    <i class="fas fa-calendar-alt"></i> Date Found: 
                </p>
                <p class="card-text">
                    <i class="fas fa-clock"></i> Time Found:
                </p>
                <p class="card-text">
                    <i class="fas fa-map-marker-alt"></i> Location: 
                </p>
            </div>
        </div>
    </div>
</x-nav-layout>
