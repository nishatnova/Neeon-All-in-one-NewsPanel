<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\ReporterPost;
use Illuminate\Http\Request;
use Session;

class ReporterProfileController extends Controller
{
    private $post;
    public function dashboard()
    {
        return view('reporter.post.index', [
            'reporterPosts' => Post::where('reporter_id', Session::get('reporter_id'))->get()

        ]);
    }

    public function edit($id)
    {
        return view('reporter.post.edit', [
            'reporterPost' => Post::find($id),
            'categories' => Category::all(),
        ]);
    }
    public function update(Request $request, $id)
    {
        $reporterPost = Post::find($id);
        Post::updatePost($request, $reporterPost);
        return redirect('/reporter-dashboard')->with('message', 'Post info updated successfully.');
    }
    public function destroy($id)
    {
        $reporterPost = Post::find($id);
        Post::deletePost($reporterPost);
        return back()->with('message', 'Post info deleted successfully.');
    }
}
