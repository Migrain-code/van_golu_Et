<?php

namespace App\Http\Controllers\Admin\Language;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.language.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.language.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $firstLanguage = Language::first();
        $language = new Language();
        $language->code = $request->code;
        $language->name = $request->name;
        $language->flag = $request->file('flag')->store('languageFlags');
        $language->translations = $firstLanguage->translations;
        $language->save();
        $language->writeLanguageFile();
        return redirect()->route('admin.language.index')->with('response', [
            'status' => "success",
            'message' => 'Language created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        return view('admin.language.edit.index', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        $language->code = $request->code;
        $language->name = $request->name;
        if ($request->hasFile('flag')) {
            $language->flag = $request->file('flag')->store('languageFlags');
        }

        $keys = $request->input('keys');
        $values = $request->input('values');
        $translations = array_combine($keys, $values);

        $repeaterData = $request->input('kt_docs_repeater_basic');

        foreach ($repeaterData as $item) {
            if (isset($item['keys']) && isset($item['values'])) {
                $translations[$item['keys']] = $item['values'];
            }
        }

        $language->translations = $translations;
        if ($language->save()){
            $language->writeLanguageFile();
            return /*redirect()->route('admin.language.index')*/back()->with('response', [
                'status' => "success",
                'message' => 'Dil Bilgileri Güncellendi'
            ]);
        }
        return redirect()->route('admin.language.index')->with('response', [
            'status' => "error",
            'message' => 'Dil Bilgileri Bir Hata Sebebi İle Güncellenemedi'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        //
    }

    public function datatable()
    {
        $ads = Language::all();

        return DataTables::of($ads)
            ->editColumn('id', function ($q) {
                return $q->id;
            })
            ->editColumn('name', function ($q) {
                return $q->name;
            })
            ->editColumn('code', function ($q) {
                return $q->code;
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.language.edit', $q->id));
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
