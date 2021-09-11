<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyImageSliderRequest;
use App\Http\Requests\StoreImageSliderRequest;
use App\Http\Requests\UpdateImageSliderRequest;
use App\Models\ImageSlider;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ImageSliderController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('image_slider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $imageSliders = ImageSlider::with(['media'])->get();

        return view('admin.imageSliders.index', compact('imageSliders'));
    }

    public function create()
    {
        abort_if(Gate::denies('image_slider_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.imageSliders.create');
    }

    public function store(StoreImageSliderRequest $request)
    {
        $imageSlider = ImageSlider::create($request->all());

        foreach ($request->input('images', []) as $file) {
            $imageSlider->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $imageSlider->id]);
        }

        return redirect()->route('admin.image-sliders.index');
    }

    public function edit(ImageSlider $imageSlider)
    {
        abort_if(Gate::denies('image_slider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.imageSliders.edit', compact('imageSlider'));
    }

    public function update(UpdateImageSliderRequest $request, ImageSlider $imageSlider)
    {
        $imageSlider->update($request->all());

        if (count($imageSlider->images) > 0) {
            foreach ($imageSlider->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $imageSlider->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $imageSlider->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        return redirect()->route('admin.image-sliders.index');
    }

    public function show(ImageSlider $imageSlider)
    {
        abort_if(Gate::denies('image_slider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.imageSliders.show', compact('imageSlider'));
    }

    public function destroy(ImageSlider $imageSlider)
    {
        abort_if(Gate::denies('image_slider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $imageSlider->delete();

        return back();
    }

    public function massDestroy(MassDestroyImageSliderRequest $request)
    {
        ImageSlider::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('image_slider_create') && Gate::denies('image_slider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ImageSlider();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
