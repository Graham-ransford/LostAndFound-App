<style>
    .custom-shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.2s ease-in-out;
    }
    .clicked {
        transform: scale(0.95); /* Slightly shrink the card */
        transition: transform 0.1s ease-in-out;
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
        color: #ffffff;
        cursor: pointer;
        font-size: 1.2rem;
    }
    
    .delete-icon:hover {
        color: #ff4d4d; /* Hover color for delete icon */
    }
</style>

<x-nav-layout>
    <div class="container mt-5">
        <div class="row mt-8">
            @php
                $colors = ['bg-primary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-light', 'bg-dark'];
            @endphp
            <h4 class="text-primary pb-2 border-bottom border-primary"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard</h4>
            
            @foreach ($posts as $index => $post)
                <div class="col-md-4 col-sm-6 mb-4">
                    @php
                        $textColor = ($colors[$index % count($colors)] == 'bg-light') ? 'text-dark' : 'text-white';
                    @endphp
                    <a href="{{ route('post.show', $post->id) }}" class="card-link clicked">
                        <div class="card {{ $colors[$index % count($colors)] }} {{ $textColor }} custom-shadow position-relative">
                        <!-- Delete Icon -->
                        <i class="fas fa-flag delete-icon" onclick="deletePost({{ $post->id }})"></i>
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->Title }}</h5>
                            <p class="card-title">Posted by {{ $post->user->name }}</p>
                            <p class="card-text">{{ Str::words($post->Body, 20) }}</p>
                            <p class="card-text h6">Created at {{ $post->created_at->diffForHumans() }}</p>
                            
                            @if (str_word_count($post->Body) > 20)
                                <a href="#" class="mt-2 btn btn-light">Read More</a>
                            @endif
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-nav-layout>


