<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use Auth;

class Post extends Model
{
    use HasFactory;
    private static $post, $image, $imageName, $extension, $directory, $imageUrl;

    private static function getImageUrl($request)
    {

        self::$image        = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory    = "admin/img/post-img/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    private static function saveBasicInfo($post, $request, $imageUrl)
    {
        $post->category_id = $request->category_id;
        $post->reporter_id = $request->reporter_id;
        if ($request->reporter_id == null)
        {
            $post->reporter_id = Session::get('reporter_id');
        }

        $post->title = $request->title;
        $post->short_description = $request->short_description;
        $post->long_description = $request->long_description;
        $post->image = $imageUrl;
        $post->status = $request->status;
        $post->save();
    }
    public static function newPost($request)
    {
        self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : 'upload/post.png';

        self::$post = new Post();
        self::saveBasicInfo(self::$post, $request, self::$imageUrl);
    }



    public static function updatePost($request, $post)
    {

        if ($request->file('image'))
        {
            if (file_exists($post->image))
            {
                unlink($post->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = $post->image;
        }
        self::saveBasicInfo($post, $request, self::$imageUrl);

    }

    public static function deletePost($post)
    {
        if (file_exists($post->image))
        {
            unlink($post->image);
        }
        $post->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function reporter()
    {
        return $this->belongsTo(Reporter::class);
    }


}
