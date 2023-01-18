<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class ProductController extends Controller
{
    public function __construct(Product $s)
    {
        $this->view = 'admin.product';
        $this->route = 'products';
        $this->viewName = 'Product';
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = Product::with('category')->get();
            return Datatables::of($query)

                ->addColumn('category_id', function ($row) {
                    return $row->category->name;
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

                ->rawColumns(['category_id','action'])
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
        $data['categories'] = Category::where('level', 3)->get();
        $data['manufacturers'] = User::where('role', 'manufacturer')->get();
        $data['url'] = route($this->route . '.store');
        $data['title'] = 'Add Product';
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
        $this->validate($request,[
            'name' => 'required',
            'category_id' => 'required',
            'manufacturer_id' => 'required',
            'weight' => 'required',
            'size' => 'required',
            'thickness' => 'required',
            'coverage_area' => 'required',
            'tiles_per_box' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'images'=>'required|mimes:jpg,jpeg,png,bmp,tiff',
        ],[
            'name.required'=>'Name is required',
            'category_id.required'=>'Category is required',
            'manufacturer_id.required'=>'Manufacturer is required',
            'weight.required'=>'Weight is required',
            'size.required'=>'Size is required',
            'thickness.required'=>'Thickness is required',
            'coverage_area.required'=>'Coverage Area is required',
            'tiles_per_box.required'=>'Tiles Per Box is required',
            'stock.required'=>'Stock is required',
            'price.required'=>'Price is required',
        ]);
//        dd($request->all());
        $input = $request->all();
        unset($input['images']);
        $product = Product::create($input);
        if($request->images){
            foreach ($request->images as $img)
            {
                $product->productImages()->create(['image'=>setImage($img,'product') ]);
            }
        }
        return redirect()->route('products.index')->with('message', 'Product Created Successfully');
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
        $categories = Category::where('level', 3)->get();
        $manufacturers = User::where('role', 'manufacturer')->get();
        $data['title'] = 'Edit Product';
        $data['edit'] = Product::findOrFail($id);
        $data['url'] =route($this->route . '.update', ['product' => $id]);;
        $data['module'] = $this->viewName;
        $data['resourcePath'] = $this->view;
        $data['resourceRoute'] = $this->route;
        return view('adminLayout.general.edit_form',compact('data','categories','manufacturers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name' => 'required',
            'category_id' => 'required',
            'manufacturer_id' => 'required',
            'weight' => 'required',
            'size' => 'required',
            'thickness' => 'required',
            'coverage_area' => 'required',
            'tiles_per_box' => 'required',
            'stock' => 'required',
            'price' => 'required',
        ],[
            'name.required'=>'Name is required',
            'category_id.required'=>'Category is required',
            'manufacturer_id.required'=>'Manufacturer is required',
            'weight.required'=>'Weight is required',
            'size.required'=>'Size is required',
            'thickness.required'=>'Thickness is required',
            'coverage_area.required'=>'Coverage Area is required',
            'tiles_per_box.required'=>'Tiles Per Box is required',
            'stock.required'=>'Stock is required',
            'price.required'=>'Price is required',

        ]);

        if($request->images){
            foreach ($request->images as $img)
            {
                $product->productImages()->create(['image'=>setImage($img,'product') ]);
            }
        }
        $input = $request->all();
        unset($input['images']);
        $product->update($input);

        return redirect()->route('products.index')->with('message', 'Product Updated Successfully');

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

    public function deleteImage(Request $request)
    {
        $imagess = ProductImages::findOrFail($request->id)->delete();
        if ($imagess){
            return response()->json(['status'=>'success']);
        }else{
            return response()->json(['status'=>'error']);
        }
    }
}
