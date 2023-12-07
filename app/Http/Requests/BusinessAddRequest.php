<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BusinessAddRequest extends FormRequest
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
            'category_id' => 'required',
            'official_name' => 'required',
            'phone' => 'required|unique:business_officials',
            'email' => 'required|unique:business_officials',
            'password' => 'required|min:6',
            'send_sms' => 'required',
            'name' => 'required|min:4|unique:businesses',
            'city_id' => 'required',
            'district_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'off_day' => 'required',
            'appointment_range' => 'required',
            'approve_type' => 'required',
            'year' => 'required',
            'campaign_gender' => 'required',
            'personal_count' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'embed' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'İşletme Kategori',
            'official_name' => 'İşletme Sahibi Adı',
            'phone' => 'İşletme Sahibi Telefon Numarası',
            'email' => 'İşletme Sahibi E-posta Adresi',
            'password' => 'Şifre',
            'send_sms' => 'Sms Gönderimi',
            'name' => 'İşletme Adı',
            'city_id' => 'Şehir',
            'district_id' => 'İlçe',
            'start_time' => 'İşe Başlangıç Satti',
            'end_time' => 'İşe Bitiş Satti',
            'off_day' => 'Tatil Günü',
            'appointment_range' => 'Randevu Aralığı',
            'approve_type' => 'Randevu Onay Türü',
            'year' => 'Kuruluş Yılı',
            'campaign_gender' => 'Hizmet Verilecek Cinsiyet',
            'personal_count' => 'Personel Sayısı',
            'latitude' => 'Konum',
            'longitude' => 'Konum',
            'embed' => 'Konum',
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
