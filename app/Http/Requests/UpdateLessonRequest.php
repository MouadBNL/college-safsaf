<?php

namespace App\Http\Requests;

use App\Models\Lesson;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLessonRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lesson_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'level_id' => [
                'required',
                'integer',
            ],
            'subject_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
