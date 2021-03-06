<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts = Post::orderBy('created_at','desc')->with(['user','likes'])->paginate(20); // return all posts in db ,  a laravel collection is returned
        // latest() can also be used Post::latest()->with...
        return view('posts.index',[ 
            'posts'=> $posts
        ]);
    }

    public function store(Request $request){
         
        $this->validate($request, [
          'title'=>'required',
          'body'=>'required'
        ]);

        $request->user()->posts()->create([  // can alo write $request->user
                                             //->posts()->create($request->only('body'))
           'title'=> $request->title,                                  
          'body' => $request->body
        ]);

       
        return back();
    }

    public function destroy(Post $post){

        $this->authorize('delete',$post);
        $post->delete();
        return back();
    }

    public function show(Post $post){
       return view('posts.show',[
         'post'=> $post
       ]);
    }
}
