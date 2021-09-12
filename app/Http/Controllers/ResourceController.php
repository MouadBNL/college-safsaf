<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::latest()->paginate(24);
        return view('pages.resources.index',  compact([
            'resources'
        ]));
    }

    public function show(Resource $resource)
    {
        return view('pages.resources.show', compact('resource'));
    }
}
