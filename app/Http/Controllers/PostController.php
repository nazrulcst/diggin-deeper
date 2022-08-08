<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use App\Events\PostCreateEvent;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    
    public function index()
    {
    
        Event::dispatch(new PostCreateEvent() );
        $posts = Cache::get('posts',function(){
            return Post::get();
        });

        return view('blog.index')->with('posts',$posts);

    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=> 'required|unique:posts|max:255',
            'description'=> 'required|max:255',
        ]);

        $post = Post::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'user_id'=>1,
        ]);

        return back()->with('success', 'Post created successfully');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        $post = Post::find($id);
        return view('blog.edit')->with('post',$post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $validated = $request->validate([
            'title'=> 'required|unique:posts|max:255',
            'description'=> 'required|max:255',
        ]);

        $post->title = $request->title; 
        $post->description = $request->description; 
        $post->update();
        return back()->with('success', 'Post created successfully');
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return back()->with('success', 'Post deleted successfully');
        
    }
}
