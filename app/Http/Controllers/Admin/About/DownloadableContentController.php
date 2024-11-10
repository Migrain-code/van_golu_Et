<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DownloadableContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class DownloadableContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.downloadable-content.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.downloadable-content.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $downloadableContent = new DownloadableContent();
        $downloadableContent->name = $request->title;
        $imagePaths = [];
        $filePaths = [];

        foreach (['tr', 'en'] as $lang) {
            // Store images and get the path
            if ($request->hasFile("image.$lang")) {
                $imagePaths[$lang] = $request->file("image.$lang")->store('images', 'public');
            }

            // Store files and get the path
            if ($request->hasFile("file.$lang")) {
                $filePaths[$lang] = $request->file("file.$lang")->store('files', 'public');
            }
        }
        // Set translatable file paths
        $downloadableContent->setTranslations('image', $imagePaths);
        $downloadableContent->setTranslations('file', $filePaths);
        if ($downloadableContent->save()) {
            return redirect()->route('admin.downloadable-content.index')->with('response', [
                'status' => 'success',
                'message' => 'İçerik Başarılı Bir Şekilde Oluşturuldu'
            ]);
        }
    }


    public function datatable()
    {
        $data = DownloadableContent::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'DownloadableContent', 'İçerikleri');
            })
            ->editColumn('name', function ($q) {
                return $q->getName();
            })
            ->editColumn('image', function ($q) {
                return html()->img(image($q->getImage()))->style('width: 55px');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'DownloadableContent', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_delete_button('DownloadableContent', $q->id, 'İçerik', 'İçerik Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }
}
