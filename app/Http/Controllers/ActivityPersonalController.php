<?php

namespace App\Http\Controllers;

use App\Models\ActivityBusiness;
use App\Models\ActivitySponsor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ActivityPersonalController extends Controller
{
    public function edit(ActivityBusiness $activityPersonal)
    {
        //return view('activity.sponsor.edit', compact('activityPersonal'));
    }

    public function datatable()
    {
        $activity_id = \Session::get('activity_id');
        $activityPersonals = ActivityBusiness::where('activity_id', $activity_id)->latest()->get();

        return DataTables::of($activityPersonals)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'ActivityBusiness', 'Sponsorları');
            })
            ->addColumn('name', function ($q) {
                return $q->personel->name;
            })
            ->addColumn('image', function ($q) {
                return html()->img(image($q->personel->image))->class('w-50px h-50px rounded object-fit-cover');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'ActivityBusiness', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = '<div class="d-flex justify-content-center align-items-center">';
                //$html .= create_edit_button(route('admin.activityPersonal.edit', $q->id));
                $html .= create_delete_button('ActivityBusiness', $q->id, 'Katılımcı', 'Katılmcı Kaydını Silmek İstediğinize Eminmisiniz?');
                $html .= '</div>';

                return $html;
            })
            ->rawColumns(['id', 'action', 'created_at'])
            ->make(true);
    }

}
