<?php

namespace App\Http\Controllers\Admin\Team;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.team.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team.create.index');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $team = new Team();
        $team->mission = $request->title;
        $team->name = $request->name;
        if ($request->hasFile('image')) {
            $team->image = $request->file('image')->store('manageImages');
        }
        if ($team->save()) {
            return to_route('admin.team.index')->with('response', [
                'status' => "success",
                'message' => 'Yönetim Kurulu Üyesi Eklendi'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.team.edit.index', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $team->mission = $request->title;
        $team->name = $request->name;
        if ($request->hasFile('image')) {
            $team->image = $request->file('image')->store('manageImages');
        }
        if ($team->save()) {
            return to_route('admin.team.index')->with('response', [
                'status' => "success",
                'message' => 'Yönetim Kurulu Üyesi Güncellendi'
            ]);
        }
    }

    public function datatable()
    {
        $data = Team::latest();

        return DataTables::of($data)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Team', 'Üyeleri');
            })
            ->editColumn('name', function ($q) {
                return $q->name;
            })
            ->editColumn('mission', function ($q) {
                return $q->getMission();
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Team', 'status');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i:s');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.team.edit', $q->id));
                $html .= create_delete_button('Team', $q->id, 'Üye', 'Üye Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }

}
