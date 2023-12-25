<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ReporterPost;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Reporter;
use Session;

class ReporterPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reporter.post.add', [
            'categories' => Category::all(),
            'reporters' => Reporter::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->post = Post::newPost($request);

        return back()->with('message', 'Post info created successfully! Wait for admin to be accepted for publish!');


    }

    /**
     * Display the specified resource.
     */
    public function show(ReporterPost $reporterPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReporterPost $reporterPost)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReporterPost $reporterPost)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReporterPost $reporterPost)
    {
        ReporterPost::deleteReporterPost($reporterPost);
        return back()->with('message', 'Post info deleted successfully.');
    }
}
