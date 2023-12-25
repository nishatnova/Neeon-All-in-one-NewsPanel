<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Reporter;
use Illuminate\Http\Request;
use Session;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $reporterPost;

    public function index()
    {
        return view('admin.post.index', [
            'posts' => Post::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post.add', [
            'categories' => Category::all(),
            'reporters' => Reporter::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Post::newPost($request);

        return back()->with('message', 'Post info created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'reporters' => Reporter::all(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Post::updatePost($request, $post);
        return redirect('/post')->with('message', 'Post info updated successfully!');

       /* if(Session::get('reporter_id'))
        {
            Post::updatePost($request, $post);
            return redirect('/reporter-dashboard')->with('message', 'Post info updated successfully.');
        }
        elseif(Auth::user()->id)
        {
            Post::updatePost($request, $post);
            return redirect('/post')->with('message', 'Post info updated successfully.');
        }
       */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::deletePost($post);
        return back()->with('message', 'Post info deleted successfully!');
    }
}
