<?php

namespace App\Http\Requests;

use App\Models\Image;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreImageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('image_create');
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
            ],
            'image' => [
                'required',
            ],
        ];
    }
}
