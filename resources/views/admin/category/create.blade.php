<div class="card-body">
    <div class="form-group">
        <label for="exampleSelect1">Category</label>
        <select class="form-control" name="parent_id" id="exampleSelect1">
            <option value="">-- Select Category --</option>
            @foreach ($categories as $data)
                    <?php $dash = ''; ?>
                <option value="{{$data->id}}" @if( old('parent_id',$data->id)) selected @endif>
                    {{$data->name}}
                </option>
                @if(count($data->subcategories))
                    @include('admin.category.subCategoryList-option',['subcategories' => $data->subcategories,'edit_id'=>Null])
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}"/>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" class="form-control"  value="{{ old('image') }}" accept="image/*"/>
        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

</div>
