<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporter extends Model
{
    use HasFactory;
    private static $reporter;

    private static function saveBasicInfo($reporter, $request)
    {
       $reporter->name           = $request->name;
       $reporter->email           = $request->email;
       $reporter->password           = bcrypt($request->password);
       $reporter->mobile           = $request->mobile;
       $reporter->blood_group           = $request->blood_group;
       $reporter->district_name           = $request->district_name;
       $reporter->save();
    }

    public static function newReporter($request)
    {
        self::$reporter = new Reporter();
        self::saveBasicInfo(self::$reporter, $request);
    }
    public static function updateReporter($request, $reporter)
    {
        self::saveBasicInfo($reporter, $request);
    }
    public static function deleteReporter($reporter)
    {
       $reporter->delete();
    }
}
