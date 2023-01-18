<div class="card-body">
    <div class="row">
        <div class="form-group col-sm-4">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}"/>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-sm-4">
            <label for="exampleSelect1">Category</label>
            <select class="form-control" name="category_id" id="exampleSelect1">
                <option value="">-- Select Category --</option>
                @foreach ($categories as $data)
                    <option value="{{$data->id}}">
                        {{$data->name}} [{{$data->parentCategory->name}}]
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
                @foreach ($manufacturers as $data)
                    <option value="{{$data->id}}">
                        {{$data->name}}
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
            <input type="text" name="weight" class="form-control" placeholder="Enter Weight" value="{{ old('weight') }}"/>
            @error('weight')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-sm-4">
            <label>Price</label>
            <input type="number" name="price" class="form-control" placeholder="Enter Price" value="{{ old('price') }}"/>
            @error('price')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-sm-4">
            <label>Size</label>
            <input type="text" name="size" class="form-control" placeholder="Enter Size" value="{{ old('size') }}"/>
            @error('weight')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-sm-4">
            <label>Thickness</label>
            <input type="text" name="thickness" class="form-control" placeholder="Enter Thickness" value="{{ old('thickness') }}"/>
            @error('thickness')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-sm-4">
            <label>Coverage Area</label>
            <input type="text" name="coverage_area" class="form-control" placeholder="Enter Coverage Area" value="{{ old('coverage_area') }}"/>
            @error('coverage_area')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-sm-4">
            <label>Tiles per Box</label>
            <input type="text" name="tiles_per_box" class="form-control" placeholder="Enter Tiles per Box" value="{{ old('tiles_per_box') }}"/>
            @error('tiles_per_box')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-sm-4">
            <label>Stock</label>
            <input type="text" name="stock" class="form-control" placeholder="Enter stock" value="{{ old('stock') }}"/>
            @error('stock')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
