<div class="row">
    @if (Auth()->user()->role_id == 1)
        
    <div class="form-group col-md-6 ">
        <label for="restaurant_id">Select Restaurant  <span class="text-danger">*</span></label>
        <select name="restaurant_id" id="restaurant_id" class="form-control select2">
            <option value="" @if(($url == 'systemUser.edit') && $data->restaurant_id == "") selected @endif >All Restaurant</option>
            @foreach ($restaurants as $type)
            <option value="{{$type->id}}" @if(($url == 'systemUser.edit') && $data->restaurant_id == $type->id) selected @endif>{{$type->name}} ({{$type->area->title}})</option>
            @endforeach
        </select>
    </div>
    @else
    <input type="hidden" name="restaurant_id" value="{{Auth()->user()->restaurant_id}}">
    @endif
    <div class="form-group col-md-6 ">
        <label for="category_id">Select Menu Category</label>
        <select name="category_id" id="category_id" class="form-control select2">
            <option value="">Select</option>
            @foreach ($categories as $type)
                <option value="{{$type->id}}" @if(($url == 'menu.edit') && $data->subCategory->menu_category_id == $type->id) selected @endif>{{$type->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 ">
        <label for="sub_category_id">Select Menu Sub Category</label>
        <select name="sub_category_id" id="sub_category_id" class="form-control select2">
            @if($url == 'menu.edit')
                @foreach ($subCategories as $type)
                    <option value="{{$type->id}}" @if($data->menu_sub_category_id == $type->id) selected @endif>{{$type->name}}</option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="form-group col-md-6 ">
        <label for="name">Item Name <span class="text-danger">*</span></label>
        <input type="text" id="name" class="form-control" placeholder="Item Name" name="name"
        @if($url == 'menu.edit')  value="{{$data->name}}" @else value="{{old('name')}}" @endif required>
    </div>

    <div class="form-group col-md-6 ">
        <label for="price">Price</label>
        <input type="number" id="price" class="form-control" placeholder="price" name="price"
        @if($url == 'menu.edit')  value="{{$data->price}}" @else value="{{old('price')}}" @endif>
    </div>

    @if($url == 'menu.edit' && $data->image)
        <div class="form-group col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('uploads/image/'.$data->image)}}" alt="" width="120px"; height="80px";>
                </div>
                <div class="col-md-6">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
            </div>
        </div>
    @else
        <div class="form-group col-md-6 ">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
    @endif

    <div class="form-group col-md-6 ">
        <label for="description">Description</label>
        <textarea type="text" id="description" class="form-control" placeholder="Description"
        name="description">@if($url == 'menu.edit'){{$data->description}}@else{{old('description')}}@endif</textarea>
    </div>
</div>