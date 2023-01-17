<div class="card-body">
    <div class="form-group">
        <label for="exampleSelect1">Country</label>
        <select class="form-control" name="country_id" id="exampleSelect1">
            <option value="">-- Select Country --</option>
            @foreach ($countries as $data)
                <option value="{{$data->id}}" @if( old('country_id',$data->id)) selected @endif>
                    {{$data->name}}
                </option>
            @endforeach
        </select>
        @error('country_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label>State</label>
        <input type="text" name="name" class="form-control" placeholder="Enter state" value="{{ old('name') }}"/>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

</div>
