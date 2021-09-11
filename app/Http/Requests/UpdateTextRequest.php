<?php

namespace App\Http\Requests;

use App\Models\Text;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTextRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('text_edit');
    }

    public function rules()
    {
        return [
            'uuid' => [
                'string',
                'nullable',
            ],
            'label' => [
                'string',
                'required',
                'unique:texts,label,' . request()->route('text')->id,
            ],
        ];
    }
}
