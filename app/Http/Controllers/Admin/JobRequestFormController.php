<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobRequestForm;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class JobRequestFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.job-request-form.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JobRequestForm $jobRequestForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobRequestForm $jobRequestForm)
    {
        return view('admin.job-request-form.edit.index', compact('jobRequestForm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobRequestForm $jobRequestForm)
    {
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
            return to_route('admin.jobRequestForm.index')->with('response', [
                'status' => "success",
                'message' => trans('Başvuru Formunuz Güncellendi')
            ]);
        }
    }

    public function datatable()
    {
        $data = JobRequestForm::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'JobRequestForm', 'Başvuruları');
            })
            ->editColumn('name', function ($q) {
                return $q->name. " ". $q->surname;
            })
            ->editColumn('city_id', function ($q) {
                return $q->city->name. ",". $q->district->name;
            })
            ->editColumn('email', function ($q) {
                return $q->email;
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'JobRequestForm', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.jobRequestForm.edit', $q->id));
                $html .= create_delete_button('JobRequestForm', $q->id, 'Başvuru Formu', 'Başvuru Formu Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
