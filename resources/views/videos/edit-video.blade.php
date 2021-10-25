@extends('layouts.main')

@section('content')
<div class="row justify-content-center mt-3">
    <div class="card mb-2 col-md-8">
        <div class="card-header text-center">
            Update Video Data  
        </div>

        <div class="card-body">
            <form action="{{route('videos.update',$video->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="title">Video Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$video->title}}">
                    @error('title')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group file-area">
                    <label for="image">Cover Photo</label>
                    <input type="file" accept="image/*" onchange="readCoverImage(this);" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    <div class="input-title">Pull the picture to here or Click to choose manually</div>

                    @error('image')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <img id="cover-image-thumb" src="{{ Storage::url($video->image_path) }}" class="col-2" width="100" height="100"> 
                    <span class="input-name col-6"></span>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-secondary mt-4">Update</button>
                    </div>
                </div>

            </form>
        </div>    
    </div>
</div>        
@endsection

@section('script')
    <script>
        function readCoverImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#cover-image-thumb').attr('src', e.target.result);
                };
                
                reader.readAsDataURL(input.files[0]);
                $(".input-name").html(input.files[0].name);
            }
        }

    </script>
@endsection