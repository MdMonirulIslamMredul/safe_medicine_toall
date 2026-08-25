<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    public static $data, $image, $imageName, $directory, $imageUrl;

    public static function save_service($request)
    {


        self::$data = new About();
        self::$data->image1 = self::saveAboutImage1($request);
        self::$data->image2 = self::saveAboutImage2($request);
        self::$data->banner_image = self::saveBannerImage($request);
        // self::$data->foundation_image = self::saveFoundationImage($request);
        self::$data->foundation_name = $request->foundation_name;
        self::$data->foundation_name_bangla = $request->foundation_name_bangla;
        self::$data->foundation_name_ab = $request->foundation_name_ab;
        self::$data->director_name = $request->director_name;
        self::$data->director_name_bangla = $request->director_name_bangla;
        self::$data->director_name_ab = $request->director_name_ab;
        self::$data->title = $request->title;
        self::$data->title_bangla = $request->title_bangla;
        self::$data->title_ab = $request->title_ab;
        self::$data->des_eng = $request->des_eng;
        self::$data->des_bangla = $request->des_bangla;
        self::$data->des_ab = $request->des_ab;

        self::$data->save();
    }

    public static function update_service($request)
    {
        self::$data = About::find($request->id);

        self::$data->foundation_name = $request->foundation_name;
        self::$data->foundation_name_bangla = $request->foundation_name_bangla;
        self::$data->foundation_name_ab = $request->foundation_name_ab;
        self::$data->director_name = $request->director_name;
        self::$data->director_name_bangla = $request->director_name_bangla;
        self::$data->director_name_ab = $request->director_name_ab;
        self::$data->title = $request->title;
        self::$data->title_bangla = $request->title_bangla;
        self::$data->title_ab = $request->title_ab;
        self::$data->des_eng = $request->des_eng;
        self::$data->des_bangla = $request->des_bangla;
        self::$data->des_ab = $request->des_ab;
        if ($request->file('image1')) {
            if (self::$data->image1) {
                if (file_exists(self::$data->image1)) {
                    unlink(self::$data->image1);
                    self::$data->image1 = self::saveAboutImage1($request);
                }
            } else {
                self::$data->image1 = self::saveAboutImage1($request);
            }
        }
        if ($request->file('image2')) {
            if (self::$data->image2) {
                if (file_exists(self::$data->image2)) {
                    unlink(self::$data->image2);
                    self::$data->image2 = self::saveAboutImage2($request);
                }
            } else {
                self::$data->image2 = self::saveAboutImage2($request);
            }
        }


        if ($request->file('banner_image')) {
            if (self::$data->banner_image) {
                if (file_exists(self::$data->banner_image)) {
                    unlink(self::$data->banner_image);
                    self::$data->banner_image = self::saveBannerImage($request);
                }
            } else {
                self::$data->banner_image = self::saveBannerImage($request);
            }
        }

        // if ($request->file('foundation_image')) {
        //     if (self::$data->foundation_image) {
        //         if (file_exists(self::$data->foundation_image)) {
        //             unlink(self::$data->foundation_image);
        //             self::$data->foundation_image = self::saveFoundationImage($request);
        //         }
        //     } else {
        //         self::$data->foundation_image = self::saveFoundationImage($request);
        //     }
        // }

        self::$data->save();
    }

    private static function saveAboutImage1($request)
    {
        self::$image = $request->file('image1');
        self::$imageName = 'about_image-' . rand() . '.' . self::$image->Extension();
        self::$directory = 'About/';
        self::$imageUrl = self::$directory . self::$imageName;
        self::$image->move(self::$directory, self::$imageName);
        return self::$imageUrl;
    }

    private static function saveAboutImage2($request)
    {
        self::$image = $request->file('image2');
        self::$imageName = 'about_image-' . rand() . '.' . self::$image->Extension();
        self::$directory = 'About/';
        self::$imageUrl = self::$directory . self::$imageName;
        self::$image->move(self::$directory, self::$imageName);
        return self::$imageUrl;
    }

    private static function saveBannerImage($request)
    {
        self::$image = $request->file('banner_image');
        self::$imageName = 'about_banner_image-' . rand() . '.' . self::$image->Extension();
        self::$directory = 'About/';
        self::$imageUrl = self::$directory . self::$imageName;
        self::$image->move(self::$directory, self::$imageName);
        return self::$imageUrl;
    }

    // private static function saveFoundationImage($request)
    // {
    //     self::$image = $request->file('foundation_image');
    //     self::$imageName = 'foundation_image-' . rand() . '.' . self::$image->Extension();
    //     self::$directory = 'Foundation/';
    //     self::$imageUrl = self::$directory . self::$imageName;
    //     self::$image->move(self::$directory, self::$imageName);
    //     return self::$imageUrl;
    // }
}
