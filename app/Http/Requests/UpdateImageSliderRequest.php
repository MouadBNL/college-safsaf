<?php

namespace App\Http\Requests;

use App\Models\ImageSlider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateImageSliderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('image_slider_edit');
    }

    public function rules()
    {
        return [
            'label' => [
                'string',
                'required',
                'unique:image_sliders,label,' . request()->route('image_slider')->id,
            ],
        ];
    }
}
