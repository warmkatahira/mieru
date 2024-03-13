<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'item_code' => 'required|max:50|unique:items,item_code',
            'item_name' => 'required|max:20',
            'item_unit' => 'required|max:10',
            'item_sort_order' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributeは必須です。',
            'max' => ":attributeは:max文字以内で入力して下さい。",
            'min' => ":attributeは:min以上で入力して下さい。",
            'unique' => ':attributeは既に使用されています。',
            'integer' => ':attributeは数値(整数)で入力して下さい。',
        ];
    }

    public function attributes()
    {
        return [
            'item_code' => '項目コード',
            'item_name' => '項目名',
            'item_unit' => '項目単位',
            'item_sort_order' => '項目並び順',
        ];
    }
}
