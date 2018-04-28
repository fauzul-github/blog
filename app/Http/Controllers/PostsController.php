<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Carbon\Carbon;



class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(){
        if(($month = request('month') || $year = request('year'))){
            $posts = Post::latest()
                ->filter(request(['month', 'year']))
                ->get();
        }
        else{
           $posts = Post::latest()->get(); 
        }
        
        
        
        
        //$posts = $posts->get();
        
        
        
        return view('posts.index', compact('posts'));
    }
    
    public function show($id){
        $post = Post::find($id);
        //$comments = Comment::find([$id, auth()->user()->id]);
        //echo "<pre>";
        //print_r($comments);
        return view('posts.show', compact('post'));
        
    }
    
    public function create(){
        return view('posts.create');
    }
    
    public function store(){
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);
        
        auth()->user()->publish(
            new Post(request(['title','body']))
         );
        
        session()->flash('message', 'Your post has now been published.');
        
        return redirect('/');
        
    }
    
    public function edit($id){
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }
    
    public function update(Request $request, $id){
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);
        
                
        $post= Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/posts/'.$id);       
        
    }
    
    public function delete($post_id){
        $post = Post::find($post_id);
        $post->delete();
        
         $comments = Comment::where('post_id', $post_id)->get();
         foreach($comments as $comment){
             $comment = Comment::find($comment['id']);
             $comment->delete();
         }
         
         return redirect('/');
        
        
        
    }
}
