@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.subject.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subjects.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="label">{{ trans('cruds.subject.fields.label') }}</label>
                <input class="form-control {{ $errors->has('label') ? 'is-invalid' : '' }}" type="text" name="label" id="label" value="{{ old('label', '') }}" required>
                @if($errors->has('label'))
                    <div class="invalid-feedback">
                        {{ $errors->first('label') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.label_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="levels">{{ trans('cruds.subject.fields.levels') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('levels') ? 'is-invalid' : '' }}" name="levels[]" id="levels" multiple>
                    @foreach($levels as $id => $level)
                        <option value="{{ $id }}" {{ in_array($id, old('levels', [])) ? 'selected' : '' }}>{{ $level }}</option>
                    @endforeach
                </select>
                @if($errors->has('levels'))
                    <div class="invalid-feedback">
                        {{ $errors->first('levels') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.levels_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection