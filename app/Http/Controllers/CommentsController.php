<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
   public function store(Post $post){
       
       $post->addComment(request('body'));

       
       return back();
   }
   
   public function edit($id, $user_id, $post_id){
       $post = Post::find($post_id);
       return view('comments.edit', compact(['id', 'post_id', 'post']));
   }
   
   public function update(Request $request, $id, $post_id){
       
       $comment = Comment::find($id);
       $comment->body = $request->input('body');
       $comment->save();
       return redirect('/posts/'.$post_id); 
   }
   
   public function delete($id, $post_id){
       
      $comment = Comment::find($id);
      $comment->delete();
      return redirect('/posts/'.$post_id);
   }
}
