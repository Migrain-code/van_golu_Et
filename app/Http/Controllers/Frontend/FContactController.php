<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use Illuminate\Http\Request;

class FContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact.index');
    }

    public function store(Request $request)
    {

        $contactRequest = new ContactRequest();
        $contactRequest->name = $request->get('name');
        $contactRequest->email = $request->get('email');
        $contactRequest->subject = $request->get('subject');
        $contactRequest->message = $request->get('message');
        $contactRequest->ip_address = $request->ip();
        if ($contactRequest->save()) {
            return back()->with('response', [
                'status' => "success",
                'message' => trans('Mesajınız başarıyla gönderildi')
            ]);
        }

    }
}
