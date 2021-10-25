@extends('layouts.main')

@section('content')
<div class="row justify-content-center mt-3">
    <div class="card mb-2 col-md-8">
        <div class="card-header text-center">
            Upload New Video  
        </div>

        <div class="card-body">
            <form action="{{route('comment.update',$comment->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="comment">Comment Content</label>
                    <textarea type="text" name="comment" id="comment" rows="4" class="form-control @error('comment') is-invalid @enderror">{{$comment->body}}</textarea>
                    @error('comment')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                

        

                <div class="form-group row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-secondary">Update</button>
                    </div>
                </div>

            </form>
        </div>    
    </div>
</div>        
@endsection

