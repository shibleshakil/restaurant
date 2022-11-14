<div class="row">
    <div class="form-group col-md-6 ">
        <label for="restaurant_id">Select Restaurant  <span class="text-danger">*</span></label>
        <select name="restaurant_id" id="restaurant_id" class="form-control select2" required>
            <option value="">Select</option>
            @foreach ($restaurants as $type)
                <option value="{{$type->id}}" @if(($url == 'systemUser.edit') && $data->restaurant_id == $type->id) selected @endif>{{$type->name}} ({{$type->area->title}})</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 ">
        <label for="name">User Name <span class="text-danger">*</span></label>
        <input type="text" id="name" class="form-control" placeholder="User Name" name="name"
        @if($url == 'systemUser.edit')  value="{{$data->name}}" @else value="{{old('name')}}" @endif required>
    </div>

    <div class="form-group col-md-6 ">
        <label for="email">User Email <span class="text-danger">*</span></label>
        <input type="email" id="email" class="form-control" placeholder="User Email" name="email"
        @if($url == 'systemUser.edit')  value="{{$data->email}}" @else value="{{old('email')}}" @endif required>
    </div>
    @if($url == 'systemUser.create')
        <!-- <div class="col-md-6 form-group">
            <label for="image">Image</label>
            <input type="file" id="image" class="form-control" name="image" >
        </div> -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Password <span class="text-danger">*</span></label>
                <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password-confirm">Confirm Password <span class="text-danger">*</span></label>
                <input type="password" id="password-confirm" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
            </div>
        </div>
    @elseif ($url == 'systemUser.edit')
        <!-- <div class="col-md-3 form-group">
            <label for="">Previous Image</label>
            @if ($data->image)
            <a href="{{ asset ('/uploads/image/'.$data->image) }}" class="btn btn-info" target="_blank" rel="noopener noreferrer">View</a>
            @else
                <a href="#" class="btn btn-info" >No Image Available</a>
            @endif
        </div>
        <div class="col-md-3 form-group">
            <label for="image">Change Image</label>
            <input type="file" id="image" class="form-control" name="image" >
        </div> -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Change Password</label>
                <input type="password" id="password" class="form-control" placeholder="Password" name="password">
            </div>
        </div>
    @endif
</div>