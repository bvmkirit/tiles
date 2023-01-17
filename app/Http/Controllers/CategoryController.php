<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\State;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Category $s)
    {
        $this->view = 'admin.category';
        $this->route = 'categories';
        $this->viewName = 'Category';
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = Category::with('parentCategory')->get();
            return Datatables::of($query)

                ->addColumn('parent_id', function ($row) {
                   return $row->parent_id ? $row->parentCategory->name : '-';


                })
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

                ->rawColumns(['parent_id','action'])
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
        $data['categories'] = Category::where('parent_id', null)->get();
        $data['url'] = route($this->route . '.store');
        $data['title'] = 'Add Category';
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
        ],[
            'name.required'=>'Name is required',
        ]);
        $input = $request->all();
        $input['level']=Category::where('id',$request->parent_id)->value('level') ? (int)Category::where('id',$request->parent_id)->value('level') + 1  : 1;
        $category = Category::create($input);
        return redirect()->route('categories.index')->with('message', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('parent_id', null)->get();
        $data['title'] = 'Edit Category';
        $data['edit'] = Category::findOrFail($id);
        $data['url'] =route($this->route . '.update', ['category' => $id]);;
        $data['module'] = $this->viewName;
        $data['resourcePath'] = $this->view;
        $data['resourceRoute'] = $this->route;
        return view('adminLayout.general.edit_form',compact('data','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category  $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ],[
            'name.required'=>'Name is required',
        ]);
        $input = $request->all();
        $input['level']=Category::where('id',$request->parent_id)->value('level') ? (int)Category::where('id',$request->parent_id)->value('level') + 1  : 1;
        $category->update($input);
        return redirect()->route('categories.index')->with('message', 'Category Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
