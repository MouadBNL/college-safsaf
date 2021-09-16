<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyResourceRequest;
use App\Http\Requests\StoreResourceRequest;
use App\Http\Requests\UpdateResourceRequest;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\Resource;
use App\Models\Subject;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ResourceController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('resource_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resources = Resource::with(['media'])->get();

        return view('admin.resources.index', compact('resources'));
    }

    public function create()
    {
        abort_if(Gate::denies('resource_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lessons = Lesson::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $levels = Level::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subjects = Subject::pluck('label', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lessonsFilter = [];
        foreach (Lesson::all() as $les) {
            $lessonsFilter[$les->level->id][$les->subject->id][] = [
                'id' => $les->id,
                'title' => $les->title,
            ];
        }

        return view('admin.resources.create', compact(['lessons', 'lessonsFilter', 'levels', 'subjects']));
    }

    public function store(StoreResourceRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $resource = Resource::create($data);

        if ($request->input('file', false)) {
            $resource->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $resource->id]);
        }

        return redirect()->route('admin.resources.index');
    }

    public function edit(Resource $resource)
    {
        abort_if(Gate::denies('resource_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lessons = Lesson::pluck('title', 'id', 'level_id')->prepend(trans('global.pleaseSelect'), '');

        $levels = Level::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subjects = Subject::pluck('label', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lessonsFilter = [];
        foreach (Lesson::all() as $les) {
            $lessonsFilter[$les->level->id][$les->subject->id][] = [
                'id' => $les->id,
                'title' => $les->title,
            ];
        }

        return view('admin.resources.edit', compact('resource', 'lessons', 'lessonsFilter', 'levels', 'subjects'));
    }

    public function update(UpdateResourceRequest $request, Resource $resource)
    {
        $resource->update($request->all());

        if ($request->input('file', false)) {
            if (!$resource->file || $request->input('file') !== $resource->file->file_name) {
                if ($resource->file) {
                    $resource->file->delete();
                }
                $resource->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($resource->file) {
            $resource->file->delete();
        }

        return redirect()->route('admin.resources.index');
    }

    public function show(Resource $resource)
    {
        abort_if(Gate::denies('resource_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.resources.show', compact('resource'));
    }

    public function destroy(Resource $resource)
    {
        abort_if(Gate::denies('resource_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource->delete();

        return back();
    }

    public function massDestroy(MassDestroyResourceRequest $request)
    {
        Resource::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('resource_create') && Gate::denies('resource_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Resource();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
