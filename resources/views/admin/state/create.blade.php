<div class="card-body">
    <div class="form-group">
        <label for="exampleSelect1">Country</label>
        <select class="form-control" name="country_id" id="exampleSelect1">
            <option value="">-- Select Country --</option>
            @foreach ($countries as $data)
                <option value="{{$data->id}}">
                    {{$data->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>State</label>
        <input type="text" name="name" class="form-control" placeholder="Enter state"/>
    </div>

</div>
