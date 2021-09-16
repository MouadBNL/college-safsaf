@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.resource.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.resources.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.resource.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                        id="title" value="{{ old('title', '') }}" required>
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.resource.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="description">{{ trans('cruds.activity.fields.description') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}"
                        name="description" id="description">{!! old('description') !!}</textarea>
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.activity.fields.description_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.resource.fields.type') }}</label>
                    <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type"
                        required>
                        <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Resource::TYPE_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('type', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.resource.fields.type_helper') }}</span>
                </div>


                {{-- Filters --}}
                {{-- Level filter --}}
                <div class="form-group">
                    <label class="required" for="level_id">{{ trans('cruds.lesson.fields.level') }}</label>
                    <select class="form-control select2" name="level_id" id="level_id" required>
                        @foreach ($levels as $id => $entry)
                            <option value="{{ $id }}" {{ old('level_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('level'))
                        <div class="invalid-feedback">
                            {{ $errors->first('level') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.lesson.fields.level_helper') }}</span>
                </div>


                {{-- Subject filter --}}
                <div class="form-group">
                    <label class="required" for="subject_id">{{ trans('cruds.lesson.fields.subject') }}</label>
                    <select disabled="true"
                        class="form-control select2 {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject_id"
                        id="subject_id" required>
                        @foreach ($subjects as $id => $entry)
                            <option value="{{ $id }}" {{ old('subject_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('subject'))
                        <div class="invalid-feedback">
                            {{ $errors->first('subject') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.lesson.fields.subject_helper') }}</span>
                </div>




                <div class="form-group">
                    <label class="required" for="lesson_id">Leçon</label>
                    <select disabled="true" class="form-control select2 {{ $errors->has('lesson') ? 'is-invalid' : '' }}"
                        name="lesson_id" id="lesson_id" required>
                        @foreach ($lessons as $id => $entry)
                            <option value="{{ $id }}" {{ old('lesson_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('lesson'))
                        <div class="invalid-feedback">
                            {{ $errors->first('lesson') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.lesson.fields.subject_helper') }}</span>
                </div>



                <div class="form-group">
                    <label for="file">{{ trans('cruds.resource.fields.file') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file-dropzone">
                    </div>
                    @if ($errors->has('file'))
                        <div class="invalid-feedback">
                            {{ $errors->first('file') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.resource.fields.file_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="link">{{ trans('cruds.resource.fields.link') }}</label>
                    <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link"
                        id="link" value="{{ old('link', '') }}">
                    @if ($errors->has('link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.resource.fields.link_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
        <div style="display: none">
            <pre id="lvlsbj">{!! json_encode(
    \App\Models\Level::query()->with('subjects')->get()->mapWithKeys(function ($item) {
            return [
                $item->id => $item->subjects()->pluck('id', 'label')->toArray(),
            ];
        })->toArray(),
) !!}</pre>
            <pre id="less">{!! json_encode($lessonsFilter) !!}</pre>
        </div>
    </div>
    </div>



@endsection

@section('scripts')
    <script defer>
        window.levelSubjects = JSON.parse(document.getElementById('lvlsbj').innerHTML);
        window.lessons = JSON.parse(document.getElementById('less').innerHTML);
        window.selectedLevel = 0;
        window.selectedSubject = 0;

        $(document).ready(function() {
			// 1st filter for subjects
            $('#level_id').on('change', function(e) {
                var val = this.value;
                selectedLevel = val;

                // Removing old items
                let values = document.querySelectorAll('#subject_id option')
                // console.log('removing ', values.length ,' items...')
                for (let i = 1; i < values.length; i++) {
                    values[i].remove();
                }

                if (val) {
                    //inseting new items
                    // console.log('inseting new items')
                    let sbj = levelSubjects[val];
                    $('#subject_id').prop('disabled', false);
                    for (k in sbj) {
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

			// 2nd filter for lessons
            $('#subject_id').on('change', function(e) {
                var val = this.value;
                selectedSubject = val;
                // console.log(val);

                let values = document.querySelectorAll('#lesson_id option')
                // console.log('removing ', values.length ,' items...')
                for (let i = 1; i < values.length; i++) {
                    values[i].remove();
                }

                if (val) {
                    //inseting new items
                    // console.log('inseting new items')
                    let l = lessons[selectedLevel][selectedSubject];
					// console.log(l);
                    $('#lesson_id').prop('disabled', false);
					if(l){
						for (k in l) {
							// console.log(l[k]['title'], ' => ', l[k]['id'])
							var newOption = new Option(l[k]['title'], l[k]['id'], false, false);
							$('#lesson_id').append(newOption);
						}
					}
                } else {
                    // console.log('disabling select')
                    $('#lesson_id').prop('disabled', true);
                    $('#lesson_id').val('');
                }
                $('#lesson_id').trigger('change');
            });
        })
    </script>
    <script>
        Dropzone.options.fileDropzone = {
            url: '{{ route('admin.resources.storeMedia') }}',
            maxFilesize: 5, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5
            },
            success: function(file, response) {
                $('form').find('input[name="file"]').remove()
                $('form').append('<input type="hidden" name="file" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="file"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($resource) && $resource->file)
                    var file = {!! json_encode($resource->file) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="file" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function(file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST',
                                            '{{ route('admin.activities.storeCKEditorImages') }}',
                                            true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText =
                                            `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function() {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response
                                                    .message ?
                                                    `${genericErrorText}\n${xhr.status} ${response.message}` :
                                                    `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`
                                                    );
                                            }

                                            $('form').append(
                                                '<input type="hidden" name="ck-media[]" value="' +
                                                response.id + '">');

                                            resolve({
                                                default: response.url
                                            });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(
                                            e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '{{ $resource->id ?? 0 }}');
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>
@endsection
