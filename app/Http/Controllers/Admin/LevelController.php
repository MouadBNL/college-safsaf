<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLevelRequest;
use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdateLevelRequest;
use App\Models\Level;
use App\Models\Subject;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LevelController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $levels = Level::with(['subjects'])->get();

        $subjects = Subject::get();

        return view('admin.levels.index', compact('levels', 'subjects'));
    }

    public function create()
    {
        abort_if(Gate::denies('level_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subjects = Subject::pluck('label', 'id');

        return view('admin.levels.create', compact('subjects'));
    }

    public function store(StoreLevelRequest $request)
    {
        $level = Level::create($request->all());
        $level->subjects()->sync($request->input('subjects', []));

        return redirect()->route('admin.levels.index');
    }

    public function edit(Level $level)
    {
        abort_if(Gate::denies('level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subjects = Subject::pluck('label', 'id');

        $level->load('subjects');

        return view('admin.levels.edit', compact('subjects', 'level'));
    }

    public function update(UpdateLevelRequest $request, Level $level)
    {
        $level->update($request->all());
        $level->subjects()->sync($request->input('subjects', []));

        return redirect()->route('admin.levels.index');
    }

    public function show(Level $level)
    {
        abort_if(Gate::denies('level_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $level->load('subjects', 'levelLessons', 'levelsSubjects');

        return view('admin.levels.show', compact('level'));
    }

    public function destroy(Level $level)
    {
        abort_if(Gate::denies('level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $level->delete();

        return back();
    }

    public function massDestroy(MassDestroyLevelRequest $request)
    {
        Level::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
