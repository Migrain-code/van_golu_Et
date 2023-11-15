<?php

namespace App\Http\Controllers;

use App\Models\BusinessComment;
use Illuminate\Http\Request;

class BusinessCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(BusinessComment $businessComment)
    {
        if ($businessComment){
            return response()->json([
                'status' => "success",
                'comment' => $businessComment
            ]);
        } else{
            return response()->json([
                'status' => "warning",
                'comment' => "Yorum Kaydı Bulunamadı"
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessComment $businessComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessComment $businessComment)
    {
        if ($businessComment){
            $businessComment->content = $request->input('comment_text');
            $businessComment->save();
            return response()->json([
                'status' => "success",
                'message' => "Yorum Başarılı Bir Şekilde Güncellendi",
                'comment' => $businessComment
            ]);
        } else{
            return response()->json([
                'status' => "warning",
                'message' => "Yorum Kaydı Bulunamadı"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
