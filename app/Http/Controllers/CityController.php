<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use DataTables;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(City $s)
    {
        $this->view = 'admin.city';
        $this->route = 'cities';
        $this->viewName = 'City';
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = City::with('state','state.country')->get();
            return Datatables::of($query)

                ->addColumn('state_id', function ($row) {
                    return  $row->state->name. '-'.$row->state->country->name;

                })

                ->setRowClass(function () {
                    return 'row-move';
                })
                ->setRowId(function ($row) {
                    return 'row-' . $row->id;
                })

                ->rawColumns(['state_id'])
                ->make(true);

        }

        return view($this->view.'.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['states'] = State::get();
        $data['url'] = route($this->route . '.store');
        $data['title'] = 'Add City';
        $data['module'] = $this->viewName;
        $data['resourcePath'] = $this->view;
        $data['resourceRoute'] = $this->route;

        return view('adminLayout.general.create_form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'state_id' => 'required',
        ],[
            'name.required'=>'Name is required',
            'state_id.required'=>'State is required',
        ]);
        $input = $request->all();
        $city = City::create($input);
        return redirect()->route('cities.index')->with('message', 'City Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['states'] = State::get();

        $data['title'] = 'Edit State';
        $data['edit'] = City::findOrFail($id);
        $data['url'] ="";
        $data['module'] = $this->viewName;
        $data['resourcePath'] = $this->view;
        $data['resourceRoute'] = $this->route;
        return view('adminLayout.general.edit_form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
