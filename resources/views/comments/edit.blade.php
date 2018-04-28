@extends('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">
    <h1>{{ $post-> title }}</h1>
    {{ $post-> body }}
    @if(($post->user_id)== auth()->user()->id)
    <button type="button" class="btn btn-default"><a href="/posts/{{ $post->id }}/edit">Edit</a></button>
    @endif
    <hr>
    
    <div class="comments">
        <ul class="list-group">
            @foreach($post->comments as $comment)
            <li class="list-group-item">
                <strong>
                    {{$comment->user->name}}: &nbsp;
                    
                </strong>
                @if(($comment->id)!= $id)
                {{ $comment->body }} 
                <strong>{{ '('.$comment->created_at->diffForHumans().')' }}</strong>
                @endif
                
                @if(($comment->user_id)== auth()->user()->id)
                    @if(($comment->id)!= $id)
                    <a href="/comments/{{$comment->id}}/{{$comment->user_id}}/{{ $comment->post_id}}/edit">Edit</a>
                    @else

                    @endif
                @endif
                </li> 
                
                
                @if(($comment->id)== $id)
                <div class="card">
        <div class="card-block">
            <form method="POST" action="/comments/{{ $id }}/{{$post_id}}/update" >
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" placeholder="" class="form-control">{{ $comment->body }}</textarea>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Edit Comment</button>
                </div>
            </form>
            
        </div>
        
    </div>
                
                @endif
                
                
            @endforeach
        </ul>
   
    </div>
    @if(Auth::check())
    
    <hr>
    
    
    @endif
</div>

@endsection

