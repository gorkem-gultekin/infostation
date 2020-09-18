<?php


namespace App\Helpers;


class UploadPaths
{
    public static $uploadPaths=array(
        'content_photos'=>'/uploads/content',
        'profile_photos'=>'uploads/profiles'
    );
    public static function getUploadPath($path)
    {
        return public_path().self::$uploadPaths[$path];
    }
}
