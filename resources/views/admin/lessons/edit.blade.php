@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.lesson.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.lessons.update", [$lesson->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.lesson.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $lesson->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_id">{{ trans('cruds.lesson.fields.level') }}</label>
                <select class="form-control select2 {{ $errors->has('level') ? 'is-invalid' : '' }}" name="level_id" id="level_id" required>
                    @foreach($levels as $id => $entry)
                        <option value="{{ $id }}" {{ (old('level_id') ? old('level_id') : $lesson->level->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.level_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="subject_id">{{ trans('cruds.lesson.fields.subject') }}</label>
                <select class="form-control select2 {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject_id" id="subject_id" required>
                    @foreach($subjects as $id => $entry)
                        <option value="{{ $id }}" {{ (old('subject_id') ? old('subject_id') : $lesson->subject->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('subject'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subject') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.subject_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
    <div style="display: none">
        <pre id="lvlsbj">{!! json_encode(\App\Models\Level::query()
            ->with('subjects')
            ->get()->mapWithKeys(function($item){
                return  [$item->id => $item->subjects()->pluck('id', 'label')->toArray()];
            })->toArray()) !!}</pre>
    </div>
</div>

@section('scripts')
<script defer>
window.levelSubjects = JSON.parse(document.getElementById('lvlsbj').innerHTML);
$(document).ready(function () {
    $('#level_id').on('change', function(e) {
        var val = this.value;

        // Removing old items
        let values = document.querySelectorAll('#subject_id option')
        // console.log('removing ', values.length ,' items...')
        for (let i = 1; i < values.length; i++) {
            values[i].remove();
        }

        if(val) {
            //inseting new items
            // console.log('inseting new items')
            let sbj = levelSubjects[val];
            $('#subject_id').prop('disabled', false);
            for(k in sbj){
                // console.log(k, ' => ', sbj[k])
                var newOption = new Option(k, sbj[k], false, false);
                $('#subject_id').append(newOption);
            }
        } else {
            // console.log('disabling select')
            $('#subject_id').prop('disabled', true);
            $('#subject_id').val('');
        }
        $('#subject_id').trigger('change');

    });
})

</script>
@endsection



@endsection