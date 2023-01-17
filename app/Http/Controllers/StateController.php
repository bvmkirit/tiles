<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\StoreState;
use DataTables;
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(State $s)
    {
        $this->view = 'admin.state';
        $this->route = 'states';
        $this->viewName = 'State';
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = State::with('country')->get();
            return Datatables::of($query)

                ->addColumn('country_id', function ($row) {
                    return  $row->country->name;

                })

                ->setRowClass(function () {
                    return 'row-move';
                })
                ->setRowId(function ($row) {
                    return 'row-' . $row->id;
                })

                ->rawColumns(['country_id'])
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
        $data['countries'] = Country::get();
        $data['url'] = route($this->route . '.store');
        $data['title'] = 'Add State';
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
    public function store(StoreState $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'country_id' => 'required',
        ],[
            'name.required'=>'Name is required',
            'country_id.required'=>'Country is required',
        ]);
        $input = $request->all();
        $user = State::create($input);
        return redirect()->route('states.index')->with('message', 'State Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['countries'] = Country::get();

        $data['title'] = 'Edit State';
        $data['edit'] = State::findOrFail($id);
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
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //
    }


}
