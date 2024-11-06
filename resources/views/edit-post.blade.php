<x-nav-layout>
    <div class="container mt-5 ">
        <h4 class="text-primary pb-2 border-bottom border-primary"><i class="fas fa-minus-circle"></i> Edit Post</h4>
        {{-- <h6 class="mb-3">"Kindness is the gentle reminder that what isn’t yours deserves to be returned; it’s a reflection of the goodness in our hearts."</h6> --}}
        <a href="{{ route('post.index') }}" style="text-decoration: none; font-weight: bold;">
            <i class="fas fa-arrow-left"></i> Dashboard
        </a>

        @if (session('success'))
            <div>
                <p class="text-success">{{ session('success') }}</p>
            </div>
        @endif

        <form action="{{ route('post.update',$post)}}" method="POST" enctype="multipart/form-data"> <!-- Allow file upload -->
            @csrf <!-- Include CSRF token for security -->
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="Title" value="{{ $post->Title }}">
                @error('Title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Description</label>
                <textarea class="form-control" id="body" name="Body" rows="5" > {{$post->Body}}</textarea>
                @error('Body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="Date" class="form-label">Date</label>
                <input type="date" class="form-control" id="Date" name="Date" value="{{ $post->Date }}">
                @error('Date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="Time_Found" class="form-label">Time </label>
                <input type="time" class="form-control" id="title" name="Time_Found" value="{{ $post->Time_Found }}">
                @error('Time_Found')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="Location" class="form-label">Location</label>
                <input type="text" class="form-control" id="Location" name="Location" value="{{ $post->Location }}" placeholder="eg.NLT12">
                @error('Location')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Uploads with Bootstrap Styling -->
            <div class="mb-4">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image1" name="image" accept="image/*" onchange="previewImage(this, 'imagePreview1', 'file1Name')">
                <small id="file1Name" class="form-text text-muted"></small>
                <img id="imagePreview1" class="img-thumbnail mt-2" style="max-width: 200px;" alt="Image Preview" src="{{ asset('storage/'.$post->image) }}">
                
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            
            

            <button type="submit" class="btn btn-success">Edit</button>
        </form>
    </div>
</x-nav-layout>

<script>
    function previewImage(input, previewId, fileNameId) {
        const file = input.files[0];
        const fileName = file ? file.name : 'No file chosen';

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgPreview = document.getElementById(previewId);
                imgPreview.src = e.target.result;
                imgPreview.style.display = 'block'; // Show the image
                document.getElementById(fileNameId).textContent = fileName; // Show file name
            };
            reader.readAsDataURL(file);
        } else {
            document.getElementById(previewId).style.display = 'none'; // Hide if no file is selected
            document.getElementById(fileNameId).textContent = ''; // Clear the file name display
        }
    }
</script>
