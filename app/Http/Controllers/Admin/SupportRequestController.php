<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportRequest;
use App\Models\SupportResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SupportRequestController extends Controller
{
    public function index()
    {
        return view('admin.support-center.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        if (/*$customerFaqCategory->save()*/ true) {
            return response()->json([
                'status' => "success",
                'message' => "SSS Kategorisi Eklendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupportRequest $supportRequest)
    {
        return view('admin.support-center.detail.edit', compact('supportRequest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupportRequest $supportRequest)
    {

    }

    public function reply(Request $request)
    {
        $request->dd();
        $response = SupportResponse::find($request->response_id);
        if ($response) {
            $response->status = 1;
            $response->anwer = $request->answer;
            if ($response->save()) {
                return back()->with('response', [
                    'status' => "success",
                    'message' => "Talep Cevaplandı"
                ]);
            }
        } else {
            return back()->with('response', [
                'status' => "error",
                'message' => "Talep Bulunamadı"
            ]);
        }
    }

    public function datatable()
    {
        $supportRequests = SupportRequest::orderBy('order_number', 'asc');

        return DataTables::of($supportRequests)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'SupportRequest', 'Talepleri');
            })
            ->editColumn('user_id', function ($q) {
                return $q->user->name;
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->editColumn('is_closed', function ($q) {
                return create_switch($q->id, $q->is_closed == 1 ? true : false, 'SupportRequest', 'is_closed');
            })
            ->addColumn('action', function ($q) {
                $html = '<div class="d-flex justify-content-center align-items-center">';
                $html .= create_edit_button(route('admin.supportRequest.edit', $q->id));
                $html .= create_delete_button('SupportRequest', $q->id, 'Talebi', 'Talep Kaydını Silmek İstediğinize Eminmisiniz?');
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['id', 'action', 'status', 'created_at'])
            ->make(true);
    }
}
