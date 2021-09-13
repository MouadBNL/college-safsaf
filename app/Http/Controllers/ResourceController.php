<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Level;
use App\Models\Resource;
use App\Models\Subject;
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

    public function list(Level $level, Subject $subject)
    {
        $lessons = Lesson::query()
                    ->whereRelation('level', 'id', $level->id)
                    ->whereRelation('subject', 'id', $subject->id)
                    // ->whereHas('level', function($q) use($level) {
                    //     $q->where('id', $level->id);
                    // })
                    // ->whereHas('subject', function($q) use($subject) {
                    //     $q->where('id', $subject->id);
                    // })
                    ->with('resources')
                    ->get();
        // $resources = Resource::wherehas('')
        return view('pages.resources-list', compact('lessons'));
    }
}
