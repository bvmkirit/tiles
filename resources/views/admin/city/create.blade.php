<div class="card-body">
    <div class="form-group">
        <label for="exampleSelect1">State</label>
        <select class="form-control" name="state_id" id="exampleSelect1">
            <option value="">-- Select State --</option>
            @foreach ($states as $data)
                <option value="{{$data->id}}">
                    {{$data->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>City</label>
        <input type="text" name="name" class="form-control" placeholder="Enter City"/>
    </div>

</div>
