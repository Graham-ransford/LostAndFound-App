<style>
    .custom-shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Adjust shadow for a realistic effect */
        transition: transform 0.2s ease-in-out; /* Smooth hover effect */
    }
    
    .custom-shadow:hover {
        transform: translateY(-5px); /* Slight lift on hover */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Enhance shadow on hover */
    }
    .container{
        z-index: -1000;
    }
</style>
<x-nav-layout>
    <div class="container mt-5">
        <div class="row mt-8">
            
           
            @php
                // Define an array of colors for the cards
                $colors = ['bg-primary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-light', 'bg-dark'];
            @endphp
            
            <!-- Post Card -->
            @foreach ($posts as $index => $post)
                <div class="col-md-4 col-sm-6 mb-4">
                    @php
                        // Determine text color based on background color
                        $textColor = ($colors[$index % count($colors)] == 'bg-light') ? 'text-dark' : 'text-white';
                    @endphp
                    <div class="card {{ $colors[$index % count($colors)] }} {{ $textColor }} custom-shadow"> <!-- Assign color based on index -->
                        <div class="card-body">
                            <!-- Card Name (Title) -->
                            <h5 class="card-title">{{ $post->Title }}</h5>
                            <p class="card-title">Posted by {{ $post->Title }}</p>
                            <!-- Card Body -->
                            <p class="card-text">{{ Str::words($post->Body, 20) }}</p>
                            <p class="card-text h6">Created at {{ $post->created_at->diffForHumans() }}</p>
                            
                            <!-- Conditional Display of Read More Button -->
                            @if (str_word_count($post->Body) > 20)
                                <a href="#" class="btn btn-light">Read More</a> <!-- Button color changed to light for contrast -->
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    
</x-nav-layout>
