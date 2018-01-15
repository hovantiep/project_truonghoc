<?php

namespace truonghoc\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class NewsUpdateRequest extends FormRequest
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
//            Phan tu dau khong tinh nen them so 0
        $type = '[ 0, ';
        foreach ($type_child as $item) {
            $type .= $item->id . ', ';
        }
        $type .= '0 ]';
        return [
            'category_id' => 'in: ' . $type,
            'title' => 'required|max:255',
            'order' => 'required',
            'intro' => 'required|max:255',
            'content' => 'required',
            'keywords' => 'required|max:255',
            'image' => 'image|max:255',
        ];
    }
}
