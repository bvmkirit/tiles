<div class="card-body">
    <div class="form-group">
        <label for="exampleSelect1">State</label>
        <select class="form-control" name="state_id" id="exampleSelect1">
            <option value="">-- Select State --</option>
            @foreach ($states as $data)
                <option value="{{$data->id}}" @if( old('state_id',$data->id)) selected @endif>
                    {{$data->name}}
                </option>
            @endforeach
        </select>
        @error('state_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label>City</label>
        <input type="text" name="name" class="form-control" placeholder="Enter City" value="{{ old('name') }}"/>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

</div>
