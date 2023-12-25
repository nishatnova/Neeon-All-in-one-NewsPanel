<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category, $image, $imageName, $directory, $imageUrl;

    private static function getImageUrl($request)
    {

        self::$image        = $request->file('image');
        self::$imageName    = self::$image->getClientOriginalName();
        self::$directory    = "admin/img/category-img/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    private static function saveBasicInfo($category, $request, $imageUrl)
    {
        $category->name           = $request->name;
        $category->image          = $imageUrl;
        $category->description    = $request->description;
        $category->status         = $request->status;
        $category->save();
    }

    public static function newCategory($request)
    {
        self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : ' ';

        self::$category = new Category();
        self::saveBasicInfo(self::$category, $request, self::$imageUrl);
    }

    public static function updateCategory($request, $category)
    {
        if ($request->file('image'))
        {
            if (file_exists($category->image))
            {
                unlink($category->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = $category->image;
        }
        self::saveBasicInfo($category, $request, self::$imageUrl);
    }

    public static function deleteCategory($category)
    {
        if (file_exists($category->image))
        {
            unlink($category->image);
        }
        $category->delete();
    }



}
