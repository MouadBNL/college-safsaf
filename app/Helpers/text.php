<?php

use App\Models\Page;
use App\Models\Text;

if(! function_exists('get_page_title')){

    function get_page_title($uuid){
        $page = Page::where('uuid', $uuid)->firstOrFail();
        return $page->title;
    }

}

if(! function_exists('get_text')){

    function get_text($uuid){
        $text = Text::where('uuid', $uuid)->firstOrFail();
        return $text->content;
    }

}
