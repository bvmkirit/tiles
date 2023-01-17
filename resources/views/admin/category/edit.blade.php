<div class="card-body">
    <div class="form-group">
        <label for="exampleSelect1">Category</label>
        <select class="form-control" name="parent_id" id="exampleSelect1">
            <option value="">-- Select Category --</option>
            @foreach ($categories as $category)
                    <?php $dash=''; ?>
                <option value="{{$category->id}}" @if($category->id == $data->parent_id ) selected @endif>
                    {{$category->name}}
                </option>
                @if(count($category->subcategories))
                    @include('admin.category.subCategoryList-option',['subcategories' => $category->subcategories,'edit_id'=>$data->parent_id])
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$data->name}}"/>
    </div>

</div>
