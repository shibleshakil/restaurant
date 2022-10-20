<div class="row">
    <div class="col-md-12 py-md-3 align-items-baseline">
        <div class="py-md-4 text-center">
            <h1 class="fs-1">{{$bookingSetting->title}}</h1>
            <p class="fw-semibold py-md-2 sub">{{$bookingSetting->short_note}}</p>
        </div>

        <div class="row w-100">
            <div class="col-md-3 py-md-3 ms-md-auto">
                <label for="book_restaurant" class="form-label fw-semibold px-md-3">Select Restaurant</label>
                <select class="form-select btn-rounded w-100" id="book_restaurant" name="restaurant">
                    @if (sizeof ($restaurants) > 0)
                    <option value="">Select</option>
                    @foreach ($restaurants as $type)
                    <option value="{{$type->id}}" @if($url=='restaurantDetail' && $data->id == $type->id) selected
                        @endif>{{$type->name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>

            <div class="col-md-3 py-md-3 me-md-auto">
                <label for="date" class="form-label fw-semibold px-md-3">Date</label>
                <input type="date" class="btn-rounded w-100" id="birthday" name="date" @if($url=='restaurantDetail' )
                    required @else readonly @endif>
            </div>

        </div>

        <div class="row w-100 py-3">
            <div class="col-md-3 py-md-3 ms-md-auto">
                <label for="no_of_guest" class="form-label fw-semibold px-md-3">No. of Guest</label>
                <select class="form-select btn-rounded w-100" id="no_of_guest" name="no_of_guest" disabled>
                    <option selected>Choose</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="4">5</option>
                    <option value="5">6</option>
                    <option value="6">Large Group</option>
                </select>
            </div>

            <div class="col-md-3 py-md-3 me-md-auto">
                <label for="preferred_time" class="form-label fw-semibold px-md-3">Preferred time</label>
                <select class="form-select btn-rounded w-100" id="preferred_time" name="preferred_time" disabled>
                    <option selected>Choose</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="4">5</option>
                    <option value="5">6</option>
                    <option value="6">Large Group</option>
                </select>
            </div>

        </div>

        <div class="row w-100 align-content-center d-flex">
            <div class="col-md-3 py-md-3 mx-auto">
                <button class="btn-rounded w-100" disabled>Check</button>
            </div>

        </div>

    </div>
</div>