<style>
    .custom-shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.2s ease-in-out;
    }
    
    .custom-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
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
            <h4 class="text-primary pb-2 border-bottom border-primary">My Post</h4>
            @if (session('delete'))
            <div>
                <p class="text-danger">{{session('delete')}}</p>
            </div>
            @endif
            @foreach ($posts as $index => $post)
                <div class="col-md-4 col-sm-6 mb-4">
                    @php
                        $textColor = ($colors[$index % count($colors)] == 'bg-light') ? 'text-dark' : 'text-white';
                    @endphp
                    <div class="card {{ $colors[$index % count($colors)] }} {{ $textColor }} custom-shadow position-relative">
                        <!-- Delete Icon -->
                        <form method="post" action="{{route("post.destroy",$post)}}">
                            @method('DELETE')
                            @csrf
                            <button class="btn fas fa-trash delete-icon ">
                            </button>
                            
                        </form>
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->Title }}</h5>
                            <p class="card-title">Posted by {{ $post->Title }}</p>
                            <p class="card-text">{{ $post->Body}}</p>
                            <p class="card-text h6">Created at {{ $post->created_at->diffForHumans() }}</p>
                            
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-nav-layout>


