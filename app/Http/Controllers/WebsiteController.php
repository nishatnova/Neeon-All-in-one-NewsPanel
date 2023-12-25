<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

class WebsiteController extends Controller
{
    private $latestCategories, $latestPosts, $posts, $lifestylePosts;
    public function index()
    {
        $this->latestCategories = Category::where('status',1)->orderBy('id', 'desc')->take(4)->get();
        $this->latestPosts = Post::where('status',1)->orderBy('id', 'desc')->take(4)->skip(1)->get();
        $this->lifestylePosts = Post::where(['status' => 1, 'category_id' => 13])->orderBy('id', 'desc')->take(4)->get();
        return view('website.home.index', ['latestCategories' => $this->latestCategories, 'latestPosts' => $this->latestPosts, 'lifestylePosts' => $this->lifestylePosts])->with(['last_post'=> Post::where('status', 1)->orderBy('created_at', 'desc')->first()]);
    }
    public function category($id)
    {
        $this->posts = Post::where(['category_id'=> $id, 'status'=>1])->orderBy('id','desc')->get();
        return view('website.category.index', ['posts' => $this->posts])->with('post', Post::find($id));
    }
    public function detail($id)
    {
        $this->categories = Category::all();
        $this->post = Post::find($id);
        return view('website.detail.index',['post' => $this->post, 'categories' => $this->categories]);
    }
}
