<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use App\Models\MainPage;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContactRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.contact-request.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact-request.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contactRequest = new ContactRequest();
        $contactRequest->name = $request->get('name');
        $contactRequest->email = $request->get('email');
        $contactRequest->subject = $request->get('subject');
        $contactRequest->message = $request->get('message');
        $contactRequest->ip_address = $request->ip();
        if ($contactRequest->save()) {
            return redirect()->route('admin.contact-request.index')->with('response', [
                'status' => "success",
                'message' => "İletişim Talebi Başarılı Bir Şekilde Eklendi"
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactRequest $contactRequest)
    {
        return view('admin.contact-request.edit.index', compact('contactRequest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactRequest $contactRequest)
    {
        $contactRequest->name = $request->get('name');
        $contactRequest->email = $request->get('email');
        $contactRequest->subject = $request->get('subject');
        $contactRequest->message = $request->get('message');
        if ($contactRequest->save()) {
            return redirect()->route('admin.contact-request.index')->with('response', [
                'status' => "success",
                'message' => "İletişim Talebi Başarılı Bir Şekilde Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $parts = ContactRequest::latest();

        return DataTables::of($parts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'ContactRequest', 'İletişim Taleplerini');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'ContactRequest', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.contact-request.edit', $q->id));
                $html .= create_delete_button('ContactRequest', $q->id, 'İletişim Talebiniz', 'İletişim Talep Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
