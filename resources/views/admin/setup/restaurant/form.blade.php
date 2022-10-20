<div class="row">
    <div class="form-group col-md-6 ">
        <label for="area_id">Select Area</label>
        <select name="area_id" id="area_id" class="form-control select2">
            <option value="">Select</option>
            @foreach ($areas as $type)
            <option value="{{$type->id}}" @if(($url=='restaurant.edit' ) && $data->area_id == $type->id) selected
                @endif>{{$type->title}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-6 ">
        <label for="name">Restaurant Name <span class="text-danger">*</span></label>
        <input type="text" id="name" class="form-control item-name" placeholder="Restaurant Name" name="name"
            @if($url=='restaurant.edit' ) value="{{$data->name}}" @else value="{{old('name')}}" @endif required>
    </div>

    <div class="form-group col-md-6 ">
        <label for="slug">Slug<span class="text-danger">*</span></label>
        <input type="text" id="slug" class="form-control item-name" placeholder="slug" name="slug"
            @if($url=='restaurant.edit' ) value="{{$data->slug}}" @else value="{{old('slug')}}" @endif required>
    </div>

    @if($url == 'restaurant.edit' && $data->cover_img)
    <div class="form-group col-md-12">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('uploads/image/'.$data->cover_img)}}" class="img-box"><br>
            </div>
            <div class="col-md-6">
                <label for="cover_img">Change Cover Image (Image Size Should Be 1920 x 1080) <span
                        class="danger">*</span> </label>
                <input type="file" name="cover_img" id="cover_img" class="form-control">
            </div>
        </div>
    </div>
    @else
    <div class="form-group col-md-6 ">
        <label for="cover_img">Cover Image (Image Size Should Be 1920 x 1080 <span class="danger">*</span>) </label>
        <input type="file" name="cover_img" id="cover_img" class="form-control">
    </div>

    @endif

    @if($url == 'restaurant.edit' && $data->gallery_img)
    @php
    $allCarsel = explode(',', $data->gallery_img);
    @endphp
    <div class="form-group col-md-12">
        <div class="row">
            <div class="col-md-6">
                @foreach($allCarsel as $carsel)
                <img src="{{ asset('uploads/image/'.$carsel)}}" class="img-box">
                @endforeach
            </div>
            <div class="col-md-6">
                <label for="cover_img">Change Gallary Image (Image Size Should Be 1080 x 720) </label>
                <input type="file" name="gallery_img[]" id="gallery_img" class="form-control" multiple>
            </div>
        </div>
    </div>
    @else
    <div class="form-group col-md-6 ">
        <label for="gallery_img">Gallary Image (Image Size Should Be 1080 x 720) </label>
        <input type="file" name="gallery_img[]" id="gallery_img" class="form-control" multiple>
    </div>
    @endif

    <div class="form-group col-md-6 ">
        <label for="short_note">Short Note</label>
        <input type="text" id="short_note" class="form-control" placeholder="" name="short_note"
            @if($url=='restaurant.edit' ) value="{{$data->short_note}}" @else value="{{old('short_note')}}" @endif>
    </div>


    @if($url == 'restaurant.edit' && $data->menu_card)
    <div class="form-group col-md-6">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ asset('uploads/image/'.$data->menu_card)}}" target="_blank" rel="noopener noreferrer"
                    class="btn btn-info">View Menu card</a>
            </div>
            <div class="col-md-6">
                <label for="menu_card">Menu Card (pdf)</label>
                <input type="file" name="menu_card" id="menu_card" class="form-control">
            </div>
        </div>
    </div>
    @else
    <div class="form-group col-md-6 ">
        <label for="menu_card">Menu Card (pdf)</label>
        <input type="file" name="menu_card" id="menu_card" class="form-control">
    </div>
    @endif

    <div class="form-group col-md-6 ">
        <label for="address">Address</label>
        <input type="text" id="address" class="form-control" placeholder="address" name="address"
            @if($url=='restaurant.edit' ) value="{{$data->address}}" @else value="{{old('address')}}" @endif>
    </div>

    <div class="form-group col-md-6 ">
        <label for="map">Google Map Location <small class="text-danger">(Map Size Must should be 520px x
                220px)</small></label>
        <textarea type="text" id="map" class="form-control" placeholder="google map location"
            name="map">@if($url == 'restaurant.edit'){{$data->map}}@else{{old('map')}}@endif</textarea>
    </div>

    <div class="form-group col-md-6 ">
        <label for="email">Email</label>
        <input type="email" id="email" class="form-control" placeholder="" name="email" @if($url=='restaurant.edit' )
            value="{{$data->email}}" @else value="{{old('email')}}" @endif>
    </div>

    <div class="form-group col-md-6 ">
        <label for="contact_number">Contact Number</label>
        <input type="text" id="contact_number" class="form-control" placeholder="" name="contact_number"
            @if($url=='restaurant.edit' ) value="{{$data->contact_number}}" @else value="{{old('contact_number')}}"
            @endif>
    </div>

    <div class="form-group col-md-6 ">
        <label for="open_at">Open At</label>
        <input type="time" id="open_at" class="form-control" placeholder="" name="open_at" @if($url=='restaurant.edit' )
            value="{{$data->open_at}}" @else value="{{old('open_at')}}" @endif required>
    </div>

    <div class="form-group col-md-6 ">
        <label for="close_at">Close At</label>
        <input type="time" id="close_at" class="form-control" placeholder="Close At" name="close_at"
            @if($url=='restaurant.edit' ) value="{{$data->close_at}}" @else value="{{old('close_at')}}" @endif required>
    </div>
    <div class="form-group col-md-6 ">
        <label for="no_of_guest">No. of Guest Allowed</label>
        <input type="number" id="no_of_guest" class="form-control" placeholder="No. of Guest Allowed" name="no_of_guest"
            @if($url=='restaurant.edit' ) value="{{$data->no_of_guest}}" @else value="{{old('no_of_guest')}}" @endif
            required>
    </div>
</div>