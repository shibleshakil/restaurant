<div class="row" id="booking_div">
    <div class="col-md-12 align-items-baseline">
        <div class="text-center">
            <h1 class="fs-1">{{$bookingSetting->title}}</h1>
            <p class="fw-semibold py-md-2 sub">{{$bookingSetting->short_note}}</p>
        </div>
        <div id="booking_step_1">
            <div class="row w-100">
                <div class="col-md-3 ms-md-auto">
                    <label for="book_restaurant" class="form-label fw-semibold ">Select Restaurant</label>
                    <select class="form-select w-100" id="book_restaurant" name="restaurant">
                        @if (sizeof ($restaurants) > 0)
                        <option value="">Select</option>
                        @foreach ($restaurants as $type)
                        <option value="{{$type->id}}" @if($url=='restaurantDetail' && $data->id == $type->id) selected
                            @endif>{{$type->name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-md-3 me-md-auto">
                    <label for="booking_date" class="form-label fw-semibold ">Date</label>
                    <input type="date" class="form-control w-100" id="booking_date" name="booking_date"
                        value="{{date('Y-m-d')}}" @if($url=='restaurantDetail' ) required @else readonly @endif>
                </div>

            </div>

            <div class="row w-100">
                <div class="col-md-3 py-md-3 ms-md-auto">
                    <label for="no_of_guest" class="form-label fw-semibold ">No. of Guest</label>
                    <select class="form-select w-100" id="no_of_guest" name="no_of_guest" @if($url=='restaurantDetail' ) required @else disabled @endif>
                        @if ($url=='restaurantDetail' && $data->no_of_guest)
                            @for ($i = 0; $i < $data->no_of_guest; $i++) 
                                <option value="{{$i+1}}">{{$i+1}}</option>
                            @endfor
                        @endif
                        <option value="group">Large Group</option>
                    </select>
                </div>

                <div class="col-md-3 py-md-3 me-md-auto">
                    <label for="preferred_time" class="form-label fw-semibold ">Preferred time</label>
                    <select class="form-select w-100" id="preferred_time" name="preferred_time" @if($url=='restaurantDetail' ) required @else disabled @endif>
                        @if ($url=='restaurantDetail')
                            @php
                                $start = $data->open_at ? $data->open_at : '10:00';
                                $end = $data->close_at ? $data->close_at : '21:00';
                                $times = array();
                                $period = new DatePeriod(
                                    new DateTime($start),
                                    new DateInterval('PT30M'),
                                    new DateTime($end)
                                );
                                foreach ($period as $date) {
                                    array_push($times,$date->format("H:i\n"));
                                }
                            @endphp

                            
                            @for ($i = 0; $i < count($times); $i++) 
                                <option value="{{$times[$i]}}">{{$times[$i]}}</option>
                            @endfor
                        @endif
                    </select>
                </div>

            </div>

            <div class="row w-100 align-content-center d-flex">
                <div class="col-md-6 py-md-3 mx-auto">
                    <button type="button" class="btn-rounded w-100" id="reserveSelectedTime" @if($url !='restaurantDetail' ) disabled @endif onclick="reserveSelectedTime('{{ route('reserveSelectedTime') }}')">Reserve Selected Time</button>
                </div>
            </div>
        </div>
        <div id="booking_step_2" style="display:none">
            <div class="row w-100 align-content-center d-flex">
                <div class="col-md-6 py-md-3 mx-auto text-center">
                    <h6>Complete Your Reservation</h6>
                    <p class="booking-details">
                        <strong id="bookedRestaurant"></strong><br> 
                        on <strong id="bookedDate"></strong> 
                        for <strong id="bookedGuest"></strong> 
                        at <strong id="bookedTime"></strong>
                    </p>                
                    <p class="small">To book by phone, call {{$gcontact ? $gcontact->phone_number : ''}}</p>
                </div>
            </div>
            <form action="{{ route('confirmReservation') }}" method="post" enctype="multipart/form-data">@csrf
                
                <div class="row w-100">
                    <div class="col-md-3  ms-md-auto">
                        <label for="first_name" class="form-label fw-semibold ">First Name</label>
                        <input type="text" class="form-control w-100" id="first_name" name="first_name" required>
                    </div>
                    <div class="col-md-3 me-md-auto">
                        <label for="last_name" class="form-label fw-semibold ">Last Name</label>
                        <input type="text" class="form-control w-100" id="last_name" name="last_name" required>
                    </div>

                </div>

                <div class="row w-100">
                    <div class="col-md-3 ms-md-auto">
                        <label for="phone_number" class="form-label fw-semibold ">Phone Number</label>
                        <input type="text" class="form-control w-100" id="phone_number" name="phone_number">
                    </div>
                    <div class="col-md-3  me-md-auto">
                        <label for="email" class="form-label fw-semibold ">Email Address</label>
                        <input type="email" class="form-control w-100" id="email" name="email" required>
                    </div>

                </div>

                <div class="row w-100">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 ms-md-auto">
                        <label for="menu" class="form-label fw-semibold ">Select Menu</label>
                        <select class="form-select w-100" id="menu" name="menu">
                            @if($url=='restaurantDetail' )
                                <option value="">Select Menu</option>
                                @foreach ($menus as $type)
                                    <option value="{{$type->id}}">{{$type->name}}   Price :   {{$type->price}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-3"></div>
                    
                </div>

                <div class="row w-100">
                    <input type="hidden" id="ingredient_count" value="0">
                    <input type="hidden" id="ingredient_sl" value="0">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 ms-md-auto">
                        <h5>Selected Menu</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Menu</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="ingredient_items">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <div class="row w-100">
                    <div class="col-md-6 mx-auto">
                        <label for="special_request" class="form-label fw-semibold ">Special Request</label>
                        <textarea name="special_request" class="form-control w-100" id="special_request" cols="30" rows="4"></textarea>
                    </div>

                </div>

                <div class="row w-100 align-content-center d-flex">
                    <div class="col-md-6 py-md-3 mx-auto">
                        <button type="submit" class="btn-rounded w-100" >Confirm Booking</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>