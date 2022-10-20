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
