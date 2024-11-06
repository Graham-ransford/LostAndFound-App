<style>
    /* Container styling */
    .container {
        max-width: 800px;
        margin: auto;
    }

    /* Card styling */
    .custom-card {
        background-color: #007bff;
        color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    
    .custom-card-body {
        padding: 1.5rem;
    }

    /* Thumbnail styling */
    .thumbnail-container {
        width: 100px;
        height: 100px;
        padding: 5px;
        overflow: hidden;
        border-radius: 10px;
        margin-bottom: 15px;
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

    /* Button styling */
    .btn-custom {
        background-color: #ffffff;
        color: #007bff;
        border: none;
        margin-top: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    
    .btn-custom:hover {
        background-color: #007bff;
        color: white;
    }
    
    .delete-btn {
        color: #dc3545;
        background: none;
        border: none;
    }
    
    .delete-btn:hover {
        color: #ff4d4f;
    }
    
    /* Icons styling */
    .icon {
        margin-right: 8px;
    }
</style>

 <x-nav-layout>
    {{--<div class="container mt-5">
        <a href="{{ route('post.index') }}" class="btn btn-link" style="text-decoration:none">
            <i class="fas fa-arrow-left icon"></i> Dashboard
        </a>
        @if (session('delete'))
                <div>
                    <p class="text-danger">{{ session('delete') }}</p>
                </div>
            @endif
        <div class="card custom-card mb-4">
            <div class="card-body custom-card-body">
                <!-- Image section -->
                @if ($post->image)
                    <div class="thumbnail-container" onclick="openModal('{{ asset('storage/'.$post->image) }}', event)">
                        <img src="{{ asset('storage/'.$post->image) }}" alt="Post Thumbnail" class="thumbnail-img">
                    </div>
                @endif
                
                <!-- Post details -->
                <h5 class="card-title">
                    <i class="fas fa-info-circle icon"></i>{{ $post->Title }}
                </h5>
                <p class="card-text">{{ $post->Body }}</p>
                <p class="card-text">
                    <i class="fas fa-calendar-alt icon"></i>Created at {{ $post->created_at->diffForHumans() }}
                </p>

                <!-- Action buttons -->
                <div class="d-flex justify-content-between">
                    @auth
                        @if (auth()->user()->id === $post->user_id)
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-custom">
                                <i class="fas fa-pencil-alt icon"></i>Edit
                            </a>
                        @else
                            <a href="#" class="btn btn-custom">
                                <i class="fas fa-comment-dots icon"></i>Connect
                            </a>
                        @endif
                    @else
                        <script>
                            window.location.href = "{{ route('login') }}";
                        </script>
                    @endauth
                </div>
                
                    
                    <form method="post" action="{{ route('post.destroy2', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn" title="Delete Post">
                            <i class="fas fa-trash icon"></i> Delete
                        </button>
                    </form>
                    
                    
                </div>
            </div>
         --}}


           
            
           <!-- Details Page -->
<!-- Details Page -->
<div class="container mt-5">
    <a href="{{ route('post.index') }}" class="btn btn-link" style="text-decoration:none">
        <i class="fas fa-arrow-left icon"></i> Dashboard
    </a>
<div class="p-2">
    <div class="w-100 rounded overflow-hidden mb-3">
        <img src="{{ asset('storage/'.$post->image) }}" alt="Detailed Item Image" class="w-100" style="object-fit: cover; max-height: 200px;">
    </div>

    <h4 class="font-weight-bold">{{ $post->Title }}</h4>
    <p class="text-muted small mb-2">
        <i class="fas fa-user mr-2"></i> {{ $post->user->name }}
    </p>
    <p class="text-muted small mb-2">Created: {{ $post->created_at->diffForHumans() }}</p>
    <div class="mb-2 text-muted small overflow-hidden">
        <p>
            {{ $post->Body }}
        </p>
    </div>

    <!-- Other Information Section -->
    <div class="d-flex py-2 border-top border-bottom border-secondary gap-3">
        <div class="d-flex align-items-center p-2 rounded bg-light gap-2">
            <i class="fas fa-clock text-primary"></i>
            <span class="small font-weight-medium">{{$post->Date}}</span>
        </div>
        <div class="d-flex align-items-center p-2 rounded bg-light gap-2">
            <i class="fas fa-times text-primary"></i>
            <span class="small font-weight-medium">{{$post->Time_Found}}</span>
        </div>
        <div class="d-flex align-items-center p-2 rounded bg-light gap-2">
            <i class="fas fa-map-marker-alt text-primary"></i>
            <span class="small font-weight-medium">{{$post->Location}}</span>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="d-flex gap-3 py-2">
    @auth
     @if (auth()->user()->id === $post->user_id)
       
            <a href="{{ route('post.edit', $post->id) }}" class="btn p-2 rounded bg-light text-primary">
                <i class="fas fa-pencil-alt icon"></i>
            </a>
    @else
        <button onclick="#" class="btn btn-custom">
        <i class="fas fa-comment-dots icon"></i>Connect
          </button>
   
    @endif
    @endauth
        <form method="post" action="{{ route('post.destroy2', $post->id) }}">
            @csrf
            @method('DELETE')
        <button class="btn p-2 rounded bg-light text-danger">
            <i class="fas fa-trash"></i>
        </button>
    </form>
    </div>
</div>
</div>


            


</x-nav-layout>
{{-- 
 <div class="container mt-5">
        <a href="{{ route('post.index') }}" class="btn btn-link" style="text-decoration:none">
            <i class="fas fa-arrow-left icon"></i> Dashboard
        </a>
        @if (session('delete'))
                <div>
                    <p class="text-danger">{{ session('delete') }}</p>
                </div>
            @endif
        <div class="card custom-card mb-4">
            <div class="card-body custom-card-body">
                <!-- Image section -->
                @if ($post->image)
                    <div class="thumbnail-container" onclick="openModal('{{ asset('storage/'.$post->image) }}', event)">
                        <img src="{{ asset('storage/'.$post->image) }}" alt="Post Thumbnail" class="thumbnail-img">
                    </div>
                @endif
                
                <!-- Post details -->
                <h5 class="card-title">
                    <i class="fas fa-info-circle icon"></i>{{ $post->Title }}
                </h5>
                <p class="card-text">{{ $post->Body }}</p>
                <p class="card-text">
                    <i class="fas fa-calendar-alt icon"></i>Created at {{ $post->created_at->diffForHumans() }}
                </p>

                <!-- Action buttons -->
                <div class="d-flex justify-content-between">
                    @auth
                        @if (auth()->user()->id === $post->user_id)
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-custom">
                                <i class="fas fa-pencil-alt icon"></i>Edit
                            </a>
                        @else
                            <a href="#" class="btn btn-custom">
                                <i class="fas fa-comment-dots icon"></i>Connect
                            </a>
                        @endif
                    @else
                        <script>
                            window.location.href = "{{ route('login') }}";
                        </script>
                    @endauth
                </div>
                
                    
                    <form method="post" action="{{ route('post.destroy2', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn" title="Delete Post">
                            <i class="fas fa-trash icon"></i> Delete
                        </button>
                    </form>
                    
                    
                </div>
            </div> --}}