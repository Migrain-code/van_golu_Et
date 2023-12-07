<?php

namespace App\Http\Controllers;

use App\Models\BusinessFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BusinessFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.customer-faq-category.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customerFaq = new BusinessFaq();
        $customerFaq->category_id = $request->category_id;
        $customerFaq->question = $request->question;
        $customerFaq->answer = $request->answer;

        if ($customerFaq->save()){
            return response()->json([
                'status' => "success",
                'message' => "SSS Kategorisi Eklendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessFaq $businessFaq)
    {
        return view('category.business-faq-category.detail.faq-edit', compact('businessFaq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,BusinessFaq $businessFaq)
    {
        $businessFaq->question = $request->question;
        $businessFaq->answer = $request->answer;

        if ($businessFaq->save()){
            return to_route('admin.businessFaqCategory.edit', $businessFaq->category_id)->with('response',[
                'status' => "success",
                'message' => "SSS Düzenlendi"
            ]);
        }
    }

    public function datatable()
    {
        $businessFaqCategories = BusinessFaq::where('category_id', Session::get('category_id'));

        return DataTables::of($businessFaqCategories)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'BusinessFaq', 'SSS');
            })
            ->editColumn('question', function ($q) {
                return Str::limit($q->getQuestion(), 70);
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })

            ->addColumn('action', function ($q) {
                $html = '<div class="d-flex justify-content-center align-items-center">';
                $html .= create_edit_button(route('admin.businessFaq.edit', $q->id));
                $html .= create_delete_button('BusinessFaq', $q->id, 'SSS', ' SSS Kaydını Silmek İstediğinize Eminmisiniz?');
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['id', 'action', 'created_at'])
            ->make(true);
    }
}
