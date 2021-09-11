@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.level.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.levels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.level.fields.id') }}
                        </th>
                        <td>
                            {{ $level->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.level.fields.label') }}
                        </th>
                        <td>
                            {{ $level->label }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.level.fields.code') }}
                        </th>
                        <td>
                            {{ $level->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.level.fields.subjects') }}
                        </th>
                        <td>
                            @foreach($level->subjects as $key => $subjects)
                                <span class="label label-info">{{ $subjects->label }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.levels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#level_lessons" role="tab" data-toggle="tab">
                {{ trans('cruds.lesson.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#levels_subjects" role="tab" data-toggle="tab">
                {{ trans('cruds.subject.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="level_lessons">
            @includeIf('admin.levels.relationships.levelLessons', ['lessons' => $level->levelLessons])
        </div>
        <div class="tab-pane" role="tabpanel" id="levels_subjects">
            @includeIf('admin.levels.relationships.levelsSubjects', ['subjects' => $level->levelsSubjects])
        </div>
    </div>
</div>

@endsection