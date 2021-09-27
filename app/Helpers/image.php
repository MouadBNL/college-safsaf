<?php

use App\Models\Image;

if(! function_exists('get_image')){

    function get_image($uuid, $default = '#'){
        try {
            $image = Image::where('uuid', $uuid)->firstOrFail();
            return $image->image->url;
        } catch (\Throwable $th) {
            return $default;
        }
    }

}
