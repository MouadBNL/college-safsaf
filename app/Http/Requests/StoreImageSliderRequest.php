<?php

namespace App\Http\Requests;

use App\Models\ImageSlider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreImageSliderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('image_slider_create');
    }

    public function rules()
    {
        return [
            'uuid' => [
                'string',
                'required',
                'unique:image_sliders',
            ],
            'label' => [
                'string',
                'required',
                'unique:image_sliders',
            ],
            'images.*' => [
                'required',
            ],
        ];
    }
}
