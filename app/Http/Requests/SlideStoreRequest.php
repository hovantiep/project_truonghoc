<?php

namespace truonghoc\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:slides,name|max:255',
            'order' => 'required',
            'image' => 'required|image',
            'link' => 'required',
        ];
    }
}
