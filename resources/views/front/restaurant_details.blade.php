@extends('master.front.master')
@section('title')
{{$data->name}}
@endsection

@section('body')

<div class="banner">
    @if ($data->cover_img)
    <img src="{{ asset('uploads/image/'.$data->cover_img)}}" class="d-block w-100 img-fluid" alt="...">
    @else
    <img src="{{ asset('img/contact-hero.jpg')}}" class="d-block w-100 img-fluid" alt="...">
    @endif
</div>


<section class="booking col-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-items-baseline">
                <div class="py-md-4 text-center">
                    <h1 class="fs-1">{{$data->name}}</h1>
                    <p class="fw-semibold py-md-2 sub">{{$data->address}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 align-items-baseline">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            </div>
        </div>
        @include('front.partials.booking_section')
    </div>
</section>


<section class="container">
    <div class="row py-md-5">
        <div class="col-md-5 my-3 mx-auto menu-con rounded">
            <div class="py-md-3">
                {!! $data->map !!}
            </div>
            <div>
                <h1 class="fw-semibold">Find us</h1>
                <p>
                    {{$data->address}} <br>
                    {{$data->contact_number}} <br>
                    Email <a href="mailto:{{$data->email}}">here</a>
                </p>
            </div>
        </div>

        <div class="col-md-5 my-3 mx-auto menu-con">
            <div class="py-md-3">
                <img src="{{asset ('img/lunch_menu.jpg')}}" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="text-center">
                <h1 class="fw-semibold">Lunch Menu</h1>
                <p>
                    @if (sizeof ($lunchItems) > 0 )
                    @foreach ($lunchItems as $litem)
                    {{$litem->item}} for ৳{{$litem->price}} <br>
                    @endforeach
                    @endif
                    Monday to Sunday {{date('h:ia', strtotime($data->open_at))}} -
                    {{date('h:ia', strtotime($data->close_at))}}
                </p>
                <div class="col-md-3 py-md-3 mx-auto">
                    <a href="{{ route ('restaurantMenu', [$data->slug]) }}" target="_blank" rel="noopener noreferrer" class="btn-rounded w-100">View Menu</a>
                    <!-- <a href="{{asset ('uploads/image/'.$data->menu_card) }}" target="_blank" rel="noopener noreferrer"
                        class="btn-rounded w-100">View Menu</a> -->
                </div>
            </div>
        </div>

        <div class="col-md-5 my-3 mx-auto menu-con">
            <div class="py-md-4">
                <h1 class="fw-semibold">Parking</h1>
            </div>
            <div>
                <h5>See below the parking details</h5>
                @if (sizeof ($parkings) > 0)
                    <ul>
                        @foreach ($parkings as $parking)
                        <li> <i class="fa fa-chevron-right"></i> {{$parking->title}}</li>
                        @endforeach
                    </ul>
                @else
                <ul>
                    <li> <i class="fa fa-chevron-right"></i> National Car Park ltd</li>
                    <li> <i class="fa fa-chevron-right"></i> Motherby Lane Car Park</li>
                    <li> <i class="fa fa-chevron-right"></i> Multi-story Car Park</li>
                    <li> <i class="fa fa-chevron-right"></i> Flaxengate Car Park</li>
                </ul>
                @endif
            </div>
        </div>

        <div class="col-md-5 my-3 mx-auto menu-con">
            <div class="py-md-4">
                <h1 class="fw-semibold">Facilities</h1>
            </div>
            <div>
                @if (sizeof ($facilities) > 0)
                <ul>
                    @foreach ($facilities as $facility)
                        <li> <i class="fa fa-chevron-right"></i> {{$facility->title}}</li>
                    @endforeach
                </ul>
                    @foreach ($facilities as $facility)
                        
                    @endforeach
                @else
                <ul>
                    <li> <i class="fa fa-chevron-right"></i> Disabled Access</li>
                    <li> <i class="fa fa-chevron-right"></i> Kids Play Area</li>
                    <li> <i class="fa fa-chevron-right"></i> Baby Changing</li>
                    <li> <i class="fa fa-chevron-right"></i> Outside Seating</li>
                    <li> <i class="fa fa-chevron-right"></i> Free WiFi</li>
                    <li> <i class="fa fa-chevron-right"></i> Party Space</li>
                    <li> <i class="fa fa-chevron-right"></i> Cinema Screen</li>
                </ul>
                @endif
            </div>
        </div>
    </div>
</section>


<section class="booking col-text">
    <div class="container py-md-5">
        <h1 class="text-center text-uppercase">Take a Look Around</h1>
        @php
        $restImages = explode(',', $data->gallery_img);
        @endphp
        <div class="row justify-content-center">
            @foreach ($restImages as $img)
            <div class="col-md-4 py-md-3">
                <img src="{{asset ('uploads/image/'.$img) }}" class="d-block w-100 img-fluid" alt="...">
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {
    
    $("#book_restaurant").on("change", function(){
        var url = "{{ route ('checkResttaurantInfo') }}";
        var id = $(this).val();

        if (id != '') {
            checkResttaurantInfo(url, id, "#no_of_guest", "#preferred_time");
        }
        
    });
});
</script>
@endsection