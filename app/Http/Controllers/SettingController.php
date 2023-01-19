<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use DataTables;

class SettingController extends Controller
{
    public function __construct(Setting $s)
    {
        $this->view = 'admin.setting';
        $this->route = 'setting';
        $this->viewName = 'Setting';
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = Setting::get();
            return Datatables::of($query)

                ->addColumn('action', function ($row) {
                    $btn = view('layout.actionbtnpermission')->with(['id' => $row->id, 'route' => 'setting'])->render();
                    return $btn;

                })
                ->addColumn('logo', function ($row) {
                  return   '<img src="'. url($row->logo) .'" width="50px" class="img-thumbnail" />';

                })
//                ->addColumn('singlecheckbox', function ($row) {
//                        $schk = view('layout.singlecheckbox')->with(['id' => $row->id , 'status'=>$row->status])->render();
//
//                    return $schk;
//
//                })
                ->setRowClass(function () {
                    return 'row-move';
                })
                ->setRowId(function ($row) {
                    return 'row-' . $row->id;
                })

                ->rawColumns(['action','logo'])
                ->make(true);

        }

        return view('backend.setting.index');
    }

    public function create()
    {

        $data['url'] = route($this->route . '.store');
        $data['title'] = 'Add Setting';
        $data['module'] = $this->viewName;
        $data['resourcePath'] = $this->view;
        $data['resourceRoute'] = $this->route;

        return view('general.add_form')->with($data);

    }

    public function store(Request $request)
    {
        $setting = new Setting();
        $setting->website_name = $request->website_name;
        $setting->logo = $request->logo ? setImage($request->logo,'logo') : Null;

        $setting->website_email = $request->website_email;
        $setting->privacy_policy = $request->privacy_policy;
        $setting->facebook_url = $request->facebook_url;
        $setting->twitter_url = $request->twitter_url;
        $setting->phone_no = $request->phone_no;
        $setting->instagram_url = $request->instagram_url;
        $setting->telegram_url = $request->telegram_url;
        $setting->youtube_url = $request->youtube_url;

//        dd($setting);
        $setting->save();
        if ($setting){
            return response()->json(['status'=>'success']);
        }else{
            return response()->json(['status'=>'error']);
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Settings';
        $data['edit'] = Setting::findOrFail($id);
        $data['url'] = route($this->route . '.update', [$this->view => $id]);
        $data['module'] = $this->viewName;
        $data['resourcePath'] = $this->view;
        $data['resourceRoute'] = $this->route;
        return view('general.edit_form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Setting::where('id',$id)->first();
        $data->website_name = $request->website_name;
        if($request->logo)
        {
            $data->logo =setImage($request->logo,'setting');
        }
//        $data->logo = $request->logo ? setImage($request->logo,'setting') : null;
        $data->website_email = $request->website_email;
        $data->privacy_policy = $request->privacy_policy;
        $data->facebook_url = $request->facebook_url;
        $data->twitter_url = $request->twitter_url;
        $data->phone_no = $request->phone_no;
        $data->instagram_url = $request->instagram_url;
        $data->telegram_url = $request->telegram_url;
        $data->youtube_url = $request->youtube_url;

//        dd($data);
        $data->save();

        return redirect()->route('setting.index')->with('message', 'Setting Updated Successfully');


    }

    public function setting(){
        $data['title'] = 'Settings';
        $data['edit'] = Setting::first();
        $data['url'] = route($this->route . '.update',$data['edit']->id);
//        dd($data);
        $data['module'] = $this->viewName;
        $data['resourcePath'] = $this->view;
        $data['resourceRoute'] = $this->route;
        return view('adminLayout.general.edit_form', compact('data'));
    }
}
