<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BusinessServiceAddRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => 'required|min:1',
            'sub_category_id' => 'required|min:1',
            'type_id' => 'required|min:1',
            'time' => 'required|min:1',
            'price' => 'required|min:1',
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'Hizmet Kategorisi',
            'sub_category_id' => 'Hizmet Seçimi',
            'type_id' => 'Hizmet Cinsiyeti',
            'time' => 'Hizmet Süresi',
            'price' => 'Hizmet Fiyatı',
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'Hizmet kategorisi alanı boş bırakılamaz.',
            'sub_category_id.required' => 'Hizmet seçimi alanı boş bırakılamaz.',
            'type_id.required' => 'Hizmet cinsiyeti alanı boş bırakılamaz.',
            'time.required' => 'Hizmet süresi alanı boş bırakılamaz.',
            'price.required' => 'Hizmet fiyatı alanı boş bırakılamaz.',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'Doğrulama hatası',
            'errors' => $validator->errors()->all(),
        ], 422));
    }
}
