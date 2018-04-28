@extends('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">
    <h1>{{ $post-> title }}</h1>
    {{ $post-> body }}
    @if(($post->user_id)== auth()->user()->id)
    <button type="button" class="btn btn-default"><a href="/posts/{{ $post->id }}/edit">Edit</a></button>
    <button type="button" class="btn btn-danger"><a href="/posts/{{ $post->id }}/delete">Delete</a></button>
    @endif
    <hr>
    
    <div class="comments">
        <ul class="list-group">
            @foreach($post->comments as $comment)
            <li class="list-group-item">
                <strong>
                    {{$comment->user->name}}: &nbsp;
                    
                </strong>
                {{ $comment->body }} <strong>{{ '('.$comment->created_at->diffForHumans().')' }}</strong>
                @if(($comment->user_id)== auth()->user()->id)
                <a href="/comments/{{$comment->id}}/{{$comment->user_id}}/{{ $comment->post_id}}/edit">Edit</a>
                <a href="/comments/{{$comment->id}}/{{ $comment->post_id}}/delete">Delete</a>
                @endif
                </li>    
            @endforeach
        </ul>
   
    </div>
    @if(Auth::check())
    
    <hr>
    
    <div class="card">
        <div class="card-block">
            <form method="POST" action="/posts/{{ $post->id }}/comments" >
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" placeholder="Your comment here." class="form-control"></textarea>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
            
        </div>
        
    </div>
    @endif
</div>

@endsection

