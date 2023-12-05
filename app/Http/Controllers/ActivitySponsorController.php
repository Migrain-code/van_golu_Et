<?php

namespace App\Http\Controllers;

use App\Models\ActivitySponsor;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ActivitySponsorController extends Controller
{
    public function store(Request $request)
    {
        $activitySponsor = new ActivitySponsor();
        $activitySponsor->name = $request->input('name');
        $activitySponsor->link = $request->input('link');
        if ($request->hasFile('sponsor_image')){
            $response = UploadFile::uploadFile($request->file('sponsor_image'), 'activities_sponsors');
            $activitySponsor->image = $response["image"]["way"];
        }
        $activitySponsor->status = $request->input('is_main_sponsor');
        $activitySponsor->activity_id = $request->input('activity_id');
        $activitySponsor->text = $request->input('sponsor_text');
        if ($activitySponsor->save()){
            return response()->json([
               'status' => "success",
               'message' => "Sponsor Eklendi"
            ]);
        }
        return response()->json([
            'status' => "error",
            'message' => "Sponsor Bir Hata Sebebi İle Eklenemedi"
        ]);
    }

    public function edit(ActivitySponsor $activitySponsor)
    {
        return view('activity.sponsor.edit', compact('activitySponsor'));
    }

    public function update(ActivitySponsor $activitySponsor,Request $request)
    {
        $activitySponsor->name = $request->input('name');
        $activitySponsor->link = $request->input('link');
        if ($request->hasFile('sponsor_image')){
            $response = UploadFile::uploadFile($request->file('sponsor_image'), 'activities_sponsors');
            $activitySponsor->image = $response["image"]["way"];
        }
        $activitySponsor->status = $request->input('is_main_sponsor');
        $activitySponsor->text = $request->input('sponsor_text');
        if ($activitySponsor->save()){
            return to_route('admin.activity.edit', $activitySponsor->activity_id)->with('response',[
                'status' => "success",
                'message' => "Sponsor Güncellendi"
            ]);
        }
        return to_route('admin.activity.edit', $activitySponsor->activity_id)->with('response',[
            'status' => "error",
            'message' => "Sponsor Bir Hata Sebebi İle Güncellenemedi"
        ]);
    }

    public function datatable()
    {
        $activity_id = \Session::get('activity_id');
        $sponsors = ActivitySponsor::where('activity_id', $activity_id)->latest()->get();

        return DataTables::of($sponsors)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'ActivitySponsor', 'Sponsorları');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'ActivitySponsor', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = '<div class="d-flex justify-content-center align-items-center">';
                $html .= create_edit_button(route('admin.activitySponsor.edit', $q->id));
                $html .= create_delete_button('ActivitySponsor', $q->id, 'Sponsor', 'Sponsor Kaydını Silmek İstediğinize Eminmisiniz?');
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['id', 'action', 'created_at'])
            ->make(true);
    }
}
