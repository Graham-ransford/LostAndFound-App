<x-nav-layout>
    <div class="container mt-5 ">
       
        <h6 class="mb-5">"Kindness is the gentle reminder 
            that what isn’t yours deserves to be returned;
             it’s a reflection of the goodness in our hearts."
            </h6>
            @if (session('success'))
            <div>
                <p class="text-success">{{session('success')}}</p>
            </div>
            @endif
        <form action="{{ route('post.store') }}" method="POST">
            @csrf <!-- Include CSRF token for security -->
            
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="Title" value="{{old('name')}}">
                @error('Title')
            <p class=" text-danger">   {{$message}}</p>
            @enderror
            </div>
            
            <div class="mb-3">
                <label for="body" class="form-label">Description</label>
                <textarea class="form-control" id="body" name="Body" rows="5" ></textarea>
                @error('Body')
                <p class=" text-danger">   {{$message}}</p>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-nav-layout>
