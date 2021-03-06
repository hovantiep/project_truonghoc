<?php

namespace truonghoc\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideUpdateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'order' => 'required',
            'image' => 'image|max:255',
            'link' => 'required|max:255',
        ];
    }
}
