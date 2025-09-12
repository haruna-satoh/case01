<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'icon' => 'image|mimes:jpeg,png',
            'name' => 'required|max:20',
            'post_code' => 'required|regex:/^\d{3}-\d{4}$/',
            'building' => 'required'
        ];
    }

    public function messages() {
        return [
            'icon.image' => '画像を選択してください',
            'icon.mimes' => '拡張子が.jpegもしくは.pngのものを選択してください',
            'name.required' => 'ユーザー名を入力してください',
            'name.max' => 'ユーザー名を20文字以内で入力してください',
            'post_code.required' => '郵便番号を入力してください',
            'post_code.regex' => '郵便番号をハイフンありの8文字で入力してください',
            'building.required' => '住所を入力してください'
        ];
    }
}
