<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(User $s)
    {
        $this->view = 'admin.user';
        $this->route = 'users';
        $this->viewName = 'user';
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = User::get();
            return Datatables::of($query)
                ->addColumn('action', function ($row) {
                    $btn = view('adminLayout.general.actionbtn')->with(['id' => $row->id, 'route' => $this->route])->render();
                    return $btn;

                })
                ->setRowClass(function () {
                    return 'row-move';
                })
                ->setRowId(function ($row) {
                    return 'row-' . $row->id;
                })
                ->rawColumns(['action'])
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

        $data['url'] = route($this->route . '.store');
        $data['title'] = 'Add User';
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
            'email' => 'required|email',
            'address' => 'required',
            'role' => 'required',
            'phone' => 'required',
        ],[
            'name.required'=>'Name is required',
            'email.required'=>'Email is required',
            'email.email'=>'Email must be in valid format',
            'address.required'=>'Address is required',
            'role.required'=>'Role is required',
            'phone.required'=>'Phone is required',
        ]);
        $input = $request->all();
        $input['password']= \Hash::make('Password');
        $user = User::create($input);
        return redirect()->route('users.index')->with('message', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['title'] = 'Edit User';
        $data['edit'] = User::findOrFail($id);
        $data['url'] = route($this->route . '.update', ['user' => $id]);
        $data['module'] = $this->viewName;
        $data['resourcePath'] = $this->view;
        $data['resourceRoute'] = $this->route;

        return view('adminLayout.general.edit_form',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'address' => 'required',
            'role' => 'required',
            'phone' => 'required',
        ],[
            'name.required'=>'Name is required',
            'email.required'=>'Email is required',
            'email.email'=>'Email must be in valid format',
            'address.required'=>'Address is required',
            'role.required'=>'Role is required',
            'phone.required'=>'Phone is required',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->route('users.index')->with('message', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,User $user)
    {
        $user = User::where('id',$request->id)->delete();
        if ($user){
            return response()->json(['status'=>'success']);
        }else{
            return response()->json(['status'=>'error']);
        }
    }
}
