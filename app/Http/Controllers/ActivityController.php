<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $latest = Activity::latest()->first();

        $posts = Activity::latest()->paginate(24);

        return view('pages.activities.index', compact([
            'latest', 'posts'
        ]));
    }

    public function show(Activity $activity)
    {
        return view('pages.activities.show', compact([
            'activity'
        ]));
    }
}
