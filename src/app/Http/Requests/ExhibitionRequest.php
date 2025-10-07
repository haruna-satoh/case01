<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
            'name' => 'required',
            'explain' => 'required|max:255',
            'image' => 'required|mimes:jpeg,png',
            'options' => 'required|array',
            'options.*' => 'exists:categories,id',
            'condition' => 'required',
            'price' => 'required|integer|min:0',
        ];
    }

    public function messages ()
    {
        return [
            'name.required' => '商品名を入力してください',
            'explain.required' => '商品の説明を入力してください',
            'explain.max' => '商品の説明を255文字以内で入力してください',
            'image.required' => '商品の画像をアップロードしてください',
            'image.mimes' => '拡張子が.jpegもしくは.pngのものを選択してください',
            'options.required' => 'カテゴリーを選択してください',
            'condition.required' => 'コンディションを選択してください',
            'price.required' => '価格を入力してください',
            'price.integer' => '価格を数値で入力してください',
            'price.min' => '価格を0円以上で入力してください',
        ];
    }
}
