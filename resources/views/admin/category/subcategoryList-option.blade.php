@if($edit_id != Null)
        <?php $dash.='-- '; ?>
    @foreach($subcategories as $subcategory)
        <option value="{{$subcategory->id}}" @if($subcategory->id == $data->parent_id ) selected @endif>{{$dash}}{{$subcategory->name}}</option>
        @if(count($subcategory->subcategories))
            @include('admin.category.subCategoryList-option',['subcategories' => $subcategory->subcategories,'edit_id'=>$edit_id])
        @endif
    @endforeach

@else
<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}" @if(old('parent_id')==$subcategory->id) selected @endif>{{$dash}}{{$subcategory->name}}</option>

@endforeach

@endif
