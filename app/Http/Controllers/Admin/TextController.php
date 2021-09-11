<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTextRequest;
use App\Http\Requests\StoreTextRequest;
use App\Http\Requests\UpdateTextRequest;
use App\Models\Text;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TextController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('text_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $texts = Text::all();

        return view('admin.texts.index', compact('texts'));
    }

    public function create()
    {
        abort_if(Gate::denies('text_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.texts.create');
    }

    public function store(StoreTextRequest $request)
    {
        $text = Text::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $text->id]);
        }

        return redirect()->route('admin.texts.index');
    }

    public function edit(Text $text)
    {
        abort_if(Gate::denies('text_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.texts.edit', compact('text'));
    }

    public function update(UpdateTextRequest $request, Text $text)
    {
        $text->update($request->all());

        return redirect()->route('admin.texts.index');
    }

    public function show(Text $text)
    {
        abort_if(Gate::denies('text_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.texts.show', compact('text'));
    }

    public function destroy(Text $text)
    {
        abort_if(Gate::denies('text_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $text->delete();

        return back();
    }

    public function massDestroy(MassDestroyTextRequest $request)
    {
        Text::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('text_create') && Gate::denies('text_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Text();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
