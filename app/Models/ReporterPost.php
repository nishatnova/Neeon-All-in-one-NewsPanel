<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class ReporterPost extends Model
{
    use HasFactory;
    private static $reporterPost, $image, $imageName, $extension, $directory, $imageUrl;

    private static function getImageUrl($request)
    {

        self::$image        = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory    = "upload/reporterPost-images/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    private static function saveBasicInfo($reporterPost, $request, $imageUrl)
    {
        $reporterPost->category_id = $request->category_id;
        $reporterPost->reporter_id = Session::get('reporter_id') ;
        $reporterPost->title = $request->title;
        $reporterPost->short_description = $request->short_description;
        $reporterPost->long_description = $request->long_description;
        $reporterPost->image = $imageUrl;
        $reporterPost->status = $request->status;
        $reporterPost->save();
    }
    public static function newReporterPost($request)
    {
        self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : 'upload/post.png';

        self::$reporterPost = new ReporterPost();
        self::saveBasicInfo(self::$reporterPost, $request, self::$imageUrl);
    }

    public static function updateReporterPost($request, $reporterPost)
    {
        if ($request->file('image'))
        {
            if (file_exists($reporterPost->image))
            {
                unlink($reporterPost->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = $reporterPost->image;
        }
        self::saveBasicInfo($reporterPost, $request, self::$imageUrl);

    }

    public static function deleteReporterPost($reporterPost)
    {
        if (file_exists($reporterPost->image))
        {
            unlink($reporterPost->image);
        }
        $reporterPost->delete();
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
