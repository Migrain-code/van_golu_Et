<?php

namespace App\Http\Controllers;

use App\Models\NewsPaper;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NewsPaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.newspaper.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.newspaper.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newspaper = new NewsPaper();
        $newspaper->title = $request->title;
        $newspaper->link = $request->embed_code;
        if ($request->hasFile('image')) {
            $newspaper->image = $request->file('image')->store('newsPaperImages');
        }
        if ($newspaper->save()) {
            return to_route('admin.newspaper.index')->with('response', [
                'status' => "success",
                'message' => 'Haber Başarılı Bir Şekilde Eklendi'
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsPaper $newspaper)
    {
        return view('admin.newspaper.edit.index', compact('newspaper'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsPaper $newspaper)
    {
        $newspaper->title = $request->title;
        $newspaper->link = $request->embed_code;
        if ($request->hasFile('image')) {
            $newspaper->image = $request->file('image')->store('newsPaperImages');
        }
        if ($newspaper->save()) {
            return to_route('admin.newspaper.index')->with('response', [
                'status' => "success",
                'message' => 'Haber Başarılı Bir Şekilde Güncellendi'
            ]);
        }
    }


    public function datatable()
    {
        $data = NewsPaper::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'NewsPaper', 'Haberleri');
            })
            ->editColumn('title', function ($q) {
                return $q->title;
            })
            ->editColumn('link', function ($q) {
                return html()->a($q->getLink(), 'Linke Git')->target('_blank');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'NewsPaper', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.newspaper.edit', $q->id));
                $html .= create_delete_button('NewsPaper', $q->id, 'Haber', 'Haber Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
