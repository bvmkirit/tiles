<div class="card-body">
    <div class="row">
        <div class="form-group col-sm-4">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{$data->name}}"/>
        </div>

        <div class="form-group col-sm-4">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{$data->email}}"/>
        </div>

        <div class="form-group col-sm-4">
            <label>Adddress</label>
            <textarea name="address" class="form-control">{{ $data->address}}</textarea>
        </div>

        <div class="form-group col-sm-4">
            <label>Phone No</label>
            <input type="text" name="phone" class="form-control" placeholder="Enter Phone No" value="{{$data->phone}}"/>
        </div>

        <div class="form-group col-sm-4">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="manufacturer" @if($data->role =="admin") selected @endif> Admin</option>
                <option value="manufacturer" @if($data->role =="manufacturer") selected @endif> Manufacturer</option>
                <option value="dealer" @if($data->role =="dealer") selected @endif> Dealer</option>
                <option value="retailer" @if($data->role =="retailer") selected @endif> Retailer</option>
                <option value="wholesaler" @if($data->role =="wholesaler") selected @endif> Wholesaler</option>
                <option value="transporter" @if($data->role =="transporter") selected @endif> Transporter</option>
                <option value="self-driver" @if($data->role =="self-driver") selected @endif> Self Driver</option>
                <option value="worker" @if($data->role =="worker") selected @endif> Worker</option>
                <option value="customer" @if($data->role =="customer") selected @endif> Customer</option>
            </select>
        </div>

    </div>

</div>
