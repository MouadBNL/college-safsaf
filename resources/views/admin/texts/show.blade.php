@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.text.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.texts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.text.fields.id') }}
                        </th>
                        <td>
                            {{ $text->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.text.fields.uuid') }}
                        </th>
                        <td>
                            {{ $text->uuid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.text.fields.label') }}
                        </th>
                        <td>
                            {{ $text->label }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.text.fields.content') }}
                        </th>
                        <td>
                            {!! $text->content !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.texts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection