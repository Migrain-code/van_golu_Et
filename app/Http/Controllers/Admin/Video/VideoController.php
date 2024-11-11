<?php

namespace App\Http\Controllers\Admin\Video;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.video.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $video = new Video();
        $video->title = $request->title;
        $video->embed_code = $request->embed_code;
        if ($request->hasFile('image')) {
            $video->image = $request->file('image')->store('videoImages');
        }
        if ($video->save()) {
            return to_route('admin.video.index')->with('response', [
                'status' => "success",
                'message' => 'Video Başarılı Bir Şekilde Kayıt Edildi'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('admin.video.edit.index', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $video->title = $request->title;
        $video->embed_code = $request->embed_code;
        if ($request->hasFile('image')) {
            $video->image = $request->file('image')->store('videoImages');
        }
        if ($video->save()) {
            return to_route('admin.video.index')->with('response', [
                'status' => "success",
                'message' => 'Video Başarılı Bir Şekilde Güncellendi'
            ]);
        }
    }

    public function datatable()
    {
        $data = Video::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Video', 'Videoları');
            })
            ->editColumn('title', function ($q) {
                return $q->title;
            })
            ->editColumn('embed_code', function ($q) {
                return html()->a($q->getEmbedCode(), 'Linke Git')->target('_blank');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Video', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.video.edit', $q->id));
                $html .= create_delete_button('Video', $q->id, 'Video', 'Video Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
