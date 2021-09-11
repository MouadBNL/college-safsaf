<?php

namespace App\Http\Requests;

use App\Models\Level;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLevelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('level_edit');
    }

    public function rules()
    {
        return [
            'label' => [
                'string',
                'required',
                'unique:levels,label,' . request()->route('level')->id,
            ],
            'code' => [
                'string',
                'required',
                'unique:levels,code,' . request()->route('level')->id,
            ],
            'subjects.*' => [
                'integer',
            ],
            'subjects' => [
                'array',
            ],
        ];
    }
}
