<?php

namespace truonghoc\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class NewsStoreRequest extends FormRequest
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
//        Lay danh sach cac category con (chi con moi co tin tuc)
        $type_child = DB::table('categories')->select('id')->where('parent_id', '!=', 0)->get()->toArray();
//        Bien thanh chuoi validate
        $type = '[';
        foreach ($type_child as $item) {
            $type .= $item->id . ',';
        }
        $type .= '0]';
        return [
            'category_id' => 'in:' . $type,
            'title' => 'required|max:255',
            'order' => 'required',
            'intro' => 'required',
            'content' => 'required',
            'keywords' => 'required',
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'category_id.in' => 'The selected type is invalid.',
        ];
    }
}
