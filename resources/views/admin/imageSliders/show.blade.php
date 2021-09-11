@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.imageSlider.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.image-sliders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.imageSlider.fields.id') }}
                        </th>
                        <td>
                            {{ $imageSlider->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageSlider.fields.uuid') }}
                        </th>
                        <td>
                            {{ $imageSlider->uuid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageSlider.fields.label') }}
                        </th>
                        <td>
                            {{ $imageSlider->label }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageSlider.fields.images') }}
                        </th>
                        <td>
                            @foreach($imageSlider->images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.image-sliders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection