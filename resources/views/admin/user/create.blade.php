<div class="card-body">
    <div class="row">
        <div class="form-group col-sm-4">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ old('name') }}" />
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-sm-4">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}" />
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-sm-4">
            <label>Adddress</label>
            <textarea name="address" class="form-control">{{ old('address') }}</textarea>
            @error('address')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-sm-4">
            <label>Phone No</label>
            <input type="text" name="phone" class="form-control" placeholder="Enter Phone No" value="{{ old('phone') }}"/>
            @error('phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-sm-4">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="admin" @if(old('phone') == "admin") selected @endif> Admin</option>
                <option value="manufacturer"  @if(old('phone') == "manufacturer") selected @endif> Manufacturer</option>
                <option value="dealer"  @if(old('phone') == "dealer") selected @endif> Dealer</option>
                <option value="retailer"  @if(old('phone') == "retailer") selected @endif> Retailer</option>
                <option value="wholesaler"  @if(old('phone') == "wholesaler") selected @endif> Wholesaler</option>
                <option value="transporter"  @if(old('phone') == "transporter") selected @endif> Transporter</option>
                <option value="self-driver"  @if(old('phone') == "self-driver") selected @endif> Self Driver</option>
                <option value="worker"  @if(old('phone') == "worker") selected @endif> Worker</option>
                <option value="customer"  @if(old('phone') == "customer") selected @endif> Customer</option>
            </select>
            @error('role')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

    </div>

</div>
