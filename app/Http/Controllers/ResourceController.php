<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::paginate(24);
        return view('pages.resources.index',  compact([
            'resources'
        ]));
    }
}
