<div class="card-body">
    <div class="row">
        <div class="form-group col-sm-4">
            <label>Website Name<span class="requied_field" style="color : #e3001b;">*</span></label>
            <input type="text" name="website_name" value="{{$data->website_name}}"  placeholder="Enter WebsiteName" class="form-control" required>
        </div>
        <div class="form-group col-sm-4">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control">
        </div>

        <div class="form-group col-sm-4">
            <label>Website Email</label>
            <input type="text" name="website_email" value="{{$data->website_email}}"  placeholder="Enter Website Email" class="form-control">
        </div>
        <div class="form-group col-sm-4">
            <label>Website Privacy Policy</label>
            <input type="text" name="privacy_policy" value="{{$data->privacy_policy}}" placeholder="Enter Privacy Policy" class="form-control">
        </div>
        <div class="form-group col-sm-4">
            <label>Facebook Url</label>
            <input type="url" name="facebook_url" value="{{$data->facebook_url}}" placeholder="Enter Facebook Url" class="form-control">
        </div>
        <div class="form-group col-sm-4">
            <label>Twitter Url</label>
            <input type="url" name="twitter_url" value="{{$data->twitter_url}}" placeholder="Enter Twitter Url" class="form-control">
        </div>
        <div class="form-group col-sm-4">
            <label>Reddit Url</label>
            <input type="url" name="phone_no" value="{{$data->phone_no}}" placeholder="Enter Reddit Url" class="form-control">
        </div>
        <div class="form-group col-sm-4">
            <label>Instagram Url</label>
            <input type="url" name="instagram_url" value="{{$data->instagram_url}}" placeholder="Enter Instagram Url" class="form-control">
        </div>
        <div class="form-group col-sm-4">
            <label>Telegram Url</label>
            <input type="url" name="telegram_url" value="{{$data->telegram_url}}" placeholder="Enter Telegram Url" class="form-control">
        </div>
        <div class="form-group col-sm-4">
            <label>YouTube Url</label>
            <input type="url" name="youtube_url" value="{{$data->youtube_url}}" placeholder="Enter YouTube Url" class="form-control">
        </div>
    </div>
</div>
