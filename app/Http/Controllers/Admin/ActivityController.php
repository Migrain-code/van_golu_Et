<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityImages;
use App\Models\ActivitySlider;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.activity.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dateTimes = explode(" - ", $request->input('activity_date'));

        $startDate = Carbon::parse($dateTimes[0]);
        $endDate = Carbon::parse($dateTimes[1]);

        $activity = new Activity();
        $activity->title = $request->title;
        $activity->slug = Str::slug($request->title["tr"]);
        $activity->description = $request->description;
        $activity->embed = $request->input('embed_code');
        $activity->hotel_name = $request->input('hotel_name');
        $activity->city_id = $request->input('city_id');
        $activity->phone = $request->input('phone');
        $activity->image = "storage/default/activity/image.png";
        $activity->start_time = $startDate;
        $activity->end_time = $endDate;
        if ($activity->save()){
            if ($request->hasFile('activity_slider')){
                foreach ($request->activity_slider as $slider){
                    $activitySlider = new ActivitySlider();
                    $activitySlider->activity_id = $activity->id;
                    $response = UploadFile::uploadFile($slider, 'activities_slider');
                    $activitySlider->image = $response["image"]["way"];
                    $activitySlider->save();
                }
            }
            if($request->hasFile('activity_gallery')){
                foreach ($request->activity_gallery as $slider){
                    $activityGallery = new ActivityImages();
                    $activityGallery->activity_id = $activity->id;
                    $response = UploadFile::uploadFile($slider, 'activities_gallery');
                    $activityGallery->image = $response["image"]["way"];
                    $activityGallery->save();
                }
            }

        }

        return response()->json([
           'status' => "success",
           'message' => "Etkinlik Eklendi"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        \Session::put('activity_id', $activity->id);
        return view('admin.activity.detail.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $dateTimes = explode(" - ", $request->input('activity_date'));

        $startDate = Carbon::parse($dateTimes[0]);
        $endDate = Carbon::parse($dateTimes[1]);

        $activity->title = $request->title;
        $activity->slug = Str::slug($request->title["tr"]);
        $activity->description = $request->description;
        $activity->embed = $request->input('embed_code');
        $activity->hotel_name = $request->input('hotel_name');
        $activity->city_id = $request->input('city_id');
        $activity->phone = $request->input('phone');
        $activity->image = "storage/default/activity/image.png";
        $activity->start_time = $startDate;
        $activity->end_time = $endDate;
        if ($activity->save()){
            if ($request->hasFile('activity_slider')){
                $activity->sliders()->delete();
                foreach ($request->activity_slider as $slider){
                    $activitySlider = new ActivitySlider();
                    $activitySlider->activity_id = $activity->id;
                    $response = UploadFile::uploadFile($slider, 'activities_slider');
                    $activitySlider->image = $response["image"]["way"];
                    $activitySlider->save();
                }
            }
            if($request->hasFile('activity_gallery')){
                $activity->images()->delete();
                foreach ($request->activity_gallery as $slider){
                    $activityGallery = new ActivityImages();
                    $activityGallery->activity_id = $activity->id;
                    $response = UploadFile::uploadFile($slider, 'activities_gallery');
                    $activityGallery->image = $response["image"]["way"];
                    $activityGallery->save();
                }
            }

        }

        return to_route('admin.activity.index')->with('response',[
            'status' => "success",
            'message' => "Etkinlik Güncellendi"
        ]);
    }

    public function datatable()
    {
        $activities = Activity::latest();

        return DataTables::of($activities)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Activity', 'Etkinliği');
            })
            ->editColumn('status', function ($q) {
                return create_switch($q->id, $q->status == 1 ? true : false, 'Activity', 'status');
            })
            ->editColumn('title', function ($q) {
                return $q->getTitle();
            })
            ->editColumn('city_id', function ($q) {
                return $q->city->name;
            })
            ->editColumn('start_time', function ($q) {
                return Carbon::parse($q->start_time)->format('d.m.Y H:i');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $html .= create_edit_button(route('admin.activity.edit', $q->id));
                $html .= create_delete_button('Activity', $q->id, 'Etkinlik', 'Etkinlik Kaydını Silmek İstediğinize Eminmisiniz?');
                return $html;
            })
            ->rawColumns(['id', 'action'])
            ->make(true);
    }
}
