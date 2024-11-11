<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequestCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'card_no' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'city_id' => 'required|integer',
            'district_id' => 'required|integer',
            'address' => 'required|string',
            'kvkk_box' => 'required',
            'education_degree' => 'nullable|string|max:255',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Sadece PDF ve DOC/DOCX kabul et
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => trans('İsim alanı gereklidir.'),
            'surname.required' => trans('Soyisim alanı gereklidir.'),
            'card_no.required' => trans('Kimlik numarası alanı gereklidir.'),
            'birthday.required' => trans('Doğum tarihi alanı gereklidir.'),
            'birthday.date' => trans('Doğum tarihi geçerli bir tarih formatında olmalıdır.'),
            'gender.required' => trans('Cinsiyet alanı gereklidir.'),
            'phone.required' => trans('Telefon alanı gereklidir.'),
            'email.required' => trans('Email alanı gereklidir.'),
            'email.email' => trans('Geçerli bir email adresi giriniz.'),
            'city_id.required' => trans('Şehir alanı gereklidir.'),
            'city_id.integer' => trans('Şehir geçerli bir ID olmalıdır.'),
            'district_id.required' => trans('İlçe alanı gereklidir.'),
            'district_id.integer' => trans('İlçe geçerli bir ID olmalıdır.'),
            'address.required' => trans('Adres alanı gereklidir.'),
            'education_degree.string' => trans('Eğitim derecesi geçerli bir metin olmalıdır.'),
            'resume.file' => trans('Özgeçmiş bir dosya olmalıdır.'),
            'resume.mimes' => trans('Özgeçmiş PDF veya DOC formatında olmalıdır.'),
            'resume.max' => trans('Özgeçmiş dosyası en fazla 2 MB boyutunda olabilir.'),
            'kvkk_box.required' => trans('Kvkk Metni Kabul Edilmelidir')
        ];

    }
}
