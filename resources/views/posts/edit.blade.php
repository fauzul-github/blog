@extends('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">
    <h1>
        Edit Post
    </h1>
    
    <form method="POST" action="/posts/{{$post->id}}/update">
        {{ csrf_field()}}
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ $post['title']}}">
        </div>
        
        <div class="form-group">
          <label for="body">Body:</label>
          <textarea id='body' name='body' class="form-control">{{ $post->body }}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        
        @include('layouts.errors')
    </form>
    
    
</div>
@endsection