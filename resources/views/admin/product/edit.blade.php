<div class="card-body">
    <div class="row">
        <div class="form-group col-sm-4">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name',$data->name) }}"/>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-sm-4">
            <label for="exampleSelect1">Category</label>
            <select class="form-control" name="category_id" id="exampleSelect1">
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if($data->category_id == $category->id) selected @endif>
                        {{$category->name}} [{{$category->parentCategory->name}}]
                    </option>

                @endforeach
            </select>
            @error('category_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-sm-4">
            <label for="exampleSelect1">Manufacturer</label>
            <select class="form-control" name="manufacturer_id" id="exampleSelect1">
                <option value="">-- Select Manufacturer --</option>
                @foreach ($manufacturers as $manufacturer)
                    <option value="{{$manufacturer->id}}" @if($data->manufacturer_id ==$manufacturer->id) selected @endif>
                        {{$manufacturer->name}}
                    </option>
                @endforeach
            </select>
            @error('manufacturer_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-sm-4">
            <label>Image</label>
            <input type="file" name="images[]" class="form-control" multiple accept="image/*"/>
            @error('images')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-sm-4">
            <label>Weight</label>
            <input type="text" name="weight" class="form-control" placeholder="Enter Weight" value="{{ old('weight',$data->weight) }}"/>
            @error('weight')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-sm-4">
            <label>Price</label>
            <input type="number" name="price" class="form-control" placeholder="Enter Price" value="{{ old('price',$data->price) }}"/>
            @error('price')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-sm-4">
            <label>Size</label>
            <input type="text" name="size" class="form-control" placeholder="Enter Size" value="{{ old('size',$data->size) }}"/>
            @error('weight')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-sm-4">
            <label>Thickness</label>
            <input type="text" name="thickness" class="form-control" placeholder="Enter Thickness" value="{{ old('thickness',$data->thickness) }}"/>
            @error('thickness')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-sm-4">
            <label>Coverage Area</label>
            <input type="text" name="coverage_area" class="form-control" placeholder="Enter Coverage Area" value="{{ old('coverage_area',$data->coverage_area) }}"/>
            @error('coverage_area')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-sm-4">
            <label>Tiles per Box</label>
            <input type="text" name="tiles_per_box" class="form-control" placeholder="Enter Tiles per Box" value="{{ old('tiles_per_box',$data->tiles_per_box) }}"/>
            @error('tiles_per_box')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-sm-4">
            <label>Stock</label>
            <input type="text" name="stock" class="form-control" placeholder="Enter stock" value="{{ old('stock',$data->stock) }}"/>
            @error('stock')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-sm-4"></div>
        @if($data->productImages)
            @foreach($data->productImages as $image)
                <div class="form-group col-sm-4" >
                    <div class="d-flex ">
                        <img src="{{url($image->image)}}" height="400" width="400"  >

                    </div>

                </div>
                <div class="form-group col-sm-1">
                    <a class="btn btn-danger btn-delete" data-id="{{$image->id}}" style="height: 50px; width: 50px"><i class="fa fa-trash mt-5"></i></a>
                </div>
            @endforeach
        @endif
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function () {
        $('.btn-delete').on("click", function (e) {
            e.preventDefault()
            var id = $(this).data('id');
            $.ajax({

                type: "POST",

                url: "{{route('products.image.delete')}}",

                data: {
                    '_token': $('input[name="_token"]').val(),
                    'id': id,
                },
                cache: false,

                success: function (data) {

                    if (data.status === 'success') {


                        location.reload();
                        toastr["success"]("Delete Successfully", "Success");


                    }  else {
                        location.reload();
                        toastr["error"]("Something went wrong", "Error");

                    }
                },


            });
        });
    })
</script>
@endpush
