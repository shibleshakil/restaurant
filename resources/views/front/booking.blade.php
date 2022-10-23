@extends('master.front.master')
@section('title')
Booking
@endsection

@section('body')

<div class="banner">
    @if ($bookingSetting->cover_img)
    <img src="{{ asset('uploads/image/'. $bookingSetting->cover_img)}}" class="d-block w-100 img-fluid" alt="...">
    @else
    <img src="{{ asset('img/booking-hero.jpg')}}" class="d-block w-100 img-fluid" alt="...">
    @endif
</div>

<section class="booking col-text">
    <div class="container py-md-5">
        @include('front.partials.booking_section')
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

    $("#no_of_guest").on("change", function(){
        var no_of_guest = $(this).val();
        var preferred_time = $("#preferred_time").val();
        if (no_of_guest == '' || preferred_time == '') {
            $("#reserveSelectedTime").prop("disabled", true);
        }else{
            $("#reserveSelectedTime").removeAttr("disabled");
        }
    });

    $("#preferred_time").on("change", function(){
        var no_of_guest = $("#no_of_guest").val();
        var preferred_time = $(this).val();
        if (no_of_guest == '' || preferred_time == '') {
            $("#reserveSelectedTime").prop("disabled", true);
        }else{
            $("#reserveSelectedTime").removeAttr("disabled");
        }
    });
});
</script>
@endsection