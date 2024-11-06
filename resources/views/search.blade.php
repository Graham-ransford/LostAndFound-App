<x-nav-layout>
    <div class="container mt-5">
        <!-- Search Form -->
        <form action="{{ route('post.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search for a post..." value="{{ request('query') }}" required>
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
        </form>

        <!-- Display Search Results -->
        <h5 class="mt-4">Search Results for "{{ $query }}"</h5>
        @if ($posts->isEmpty())
            <p>No results found.</p>
        @else
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            <img src="{{ asset('storage/'.$post->image) }}" alt="Post Image" class="card-img-top" style="height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->Title }}</h5>
                                <p class="card-text">{{ Str::limit($post->Body, 100) }}</p>
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-nav-layout>
