<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequestCreateRequest;
use App\Models\JobRequestForm;
use Illuminate\Http\Request;

class FJobRequestFormController extends Controller
{

    public function index()
    {
        return view('frontend.job-request.index');
    }

    public function store(JobRequestCreateRequest $request)
    {
        $jobRequestForm = new JobRequestForm();
        $jobRequestForm->name = $request->input('name');
        $jobRequestForm->surname = $request->input('surname');
        $jobRequestForm->card_no = $request->input('card_no');
        $jobRequestForm->birthday = $request->input('birthday');
        $jobRequestForm->gender = $request->input('gender');
        $jobRequestForm->phone = $request->input('phone');
        $jobRequestForm->email = $request->input('email');
        $jobRequestForm->city_id = $request->input('city_id');
        $jobRequestForm->district_id = $request->input('district_id');
        $jobRequestForm->address = $request->input('address');
        $jobRequestForm->education_degree = $request->input('education_degree');
        $jobRequestForm->status = 0; // Varsayılan olarak inaktif

        // Resume dosyası yüklendi mi kontrol et
        if ($request->hasFile('resume')) {
            $jobRequestForm->resume = $request->file('resume')->store('resumes');
        }
        // Veriyi kaydet
        if ($jobRequestForm->save()){
            return to_route('jobRequest.index')->with('response', [
                'status' => "success",
                'message' => trans('Başvuru Formunuz Gönderildi')
            ]);
        }
    }
}
