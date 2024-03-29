@extends('master.front.master')
@section('title')
Contact
@endsection

@section('body')


<div class="banner">
    @if ($contact->cover_img)
    <img src="{{ asset('uploads/image/'.$contact->cover_img) }}" class="d-block w-100 img-fluid" alt="...">
    @else
    <img src="img/contact-hero.jpg" class="d-block w-100 img-fluid" alt="...">
    @endif
</div>


<section class="booking col-text">
    <div class="container py-md-5">
        <div class="col-md-12 py-md-3 align-items-baseline">
            <div class="py-md-4 text-center">
                <h1 class="fs-1">{{$contact->title}}</h1>
                <p class="fw-semibold py-md-2 sub">{{$contact->short_note}}</p>
            </div>

            <div class="row text-grey justify-content-center py-3">
                <div class="col-md-5 bg-container m-md-3 my-3">
                    <div class="card">
                        <div>
                            @if ($contact->location_img)
                            <img src="{{ asset('uploads/image/'.$contact->location_img)}}" class="card-img-top py-3"
                                alt="..." width="512px" height="212px">
                            @else
                            <img src="img/card1.jpg" class="card-img-top py-3" alt="..." width="512px" height="212px">
                            @endif
                        </div>
                        <div class="card-body text-center">
                            <h4>Our locations</h4>
                            <p class="card-text py-md-2 fw-semibold">We Have Over {{count($areas)}} Locations. <br> Find
                                Your
                                Nearest Resturant</p>
                            <a href="{{ route ('restaurantList') }}">
                                <button class="btn-rounded w-50 fw-semibold mb-md-5">Our Resturants</button>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="col-md-5 bg-container m-md-3 my-3">
                    <div class="card ">
                        <div>
                            @if ($contact->cancel_booking_img)
                            <img src="{{ asset('uploads/image/'.$contact->cancel_booking_img)}}"
                                class="card-img-top py-3" alt="..." width="512px" height="212px">
                            @else
                            <img src="img/card1.jpg" class="card-img-top py-3" alt="..." width="512px" height="212px">
                            @endif
                        </div>
                        <div class="card-body text-center">
                            <h4>Cancel My Booking</h4>
                            <p class="card-text py-md-2 fw-semibold">We’re sorry you can’t make your reservation. <br>
                                To
                                cancel, please visit the page linked below.</p>
                            <a href="#">
                                <button class="btn-rounded w-50 fw-semibold mb-md-5">Cancel Booking</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pb-md-5 text-grey justify-content-center py-3">
                <div class="col-md-5 bg-container m-md-3 my-3">
                    <div class="card">
                        <div>
                            @if ($contact->feedback_img)
                            <img src="{{ asset('uploads/image/'.$contact->feedback_img)}}" class="card-img-top py-3"
                                alt="..." width="512px" height="212px">
                            @else
                            <img src="img/card1.jpg" class="card-img-top py-3" alt="..." width="512px" height="212px">
                            @endif
                        </div>
                        <div class="card-body text-center">
                            <h4>Feedback</h4>
                            <p class="card-text py-md-2 fw-semibold">Do you have feedback for us?</p>
                            <a href="#">
                                <button class="btn-rounded w-50 fw-semibold mb-md-5">Give Feedback</button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 bg-container m-md-3 my-3">
                    <div class="card ">
                        <div>
                            @if ($contact->career_img)
                            <img src="{{ asset('uploads/image/'.$contact->career_img)}}" class="card-img-top py-3"
                                alt="..." width="512px" height="212px">
                            @else
                            <img src="img/card1.jpg" class="card-img-top py-3" alt="..." width="512px" height="212px">
                            @endif
                        </div>
                        <div class="card-body text-center">
                            <h4>Careers</h4>
                            <p class="card-text py-md-2 fw-semibold">Visit our dedicated careers page.</p>
                            <a href="#">
                                <button class="btn-rounded w-50 fw-semibold mb-md-5">Careers</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row py-md-5 text-grey justify-content-center">

                <div class="col-md-5">
                    <h1 class="">HEAD OFFICE</h1>
                    <div class="py-md-4">
                        <h5 class="fw-semibold">ADDRESS</h5>
                        <p class="py-md-1">{{$contact->address}}</p>
                    </div>
                    <div class="py-md-4">
                        <h5 class="fw-semibold">CUSTOMER CARE & ENQUIRIES</h5>
                        <p class="py-md-1">{{$contact->phone_number}}</p>
                        <a href="">
                            <p>{{$contact->customer_care_email}}</p>
                        </a>
                    </div>
                    <div class="py-md-4">
                        <h5 class="fw-semibold">RECRUITMENT</h5>
                        <p class="py-md-1">{{$contact->recruitment}}</p>
                    </div>
                    <div class="py-md-4">
                        <h5 class="fw-semibold">ACCOUNTS</h5>
                        <p class="py-md-1">{{$contact->accounts}}</p>
                    </div>
                    <div class="py-md-4">
                        <h5 class="fw-semibold">Payroll</h5>
                        <p class="py-md-1">{{$contact->payroll}}</p>
                    </div>

                </div>

                <div class="col-md-5">
                    <h1>SEND A MESSAGE</h1>
                    <div class="py-md-3">
                        <form action="">

                            <div class="mb-md-4">
                                <label for="first_name" class="form-label fw-semibold">FIRST NAME<span
                                        class="text-danger">*</span></label>
                                <input type="name" class="form-control w-100" id="" name="first_name"
                                    placeholder="Enter your first name">
                            </div>

                            <div class="my-md-4">
                                <label for="last_name" class="form-label fw-semibold">LAST NAME<span
                                        class="text-danger">*</span></label>
                                <input type="name" class="form-control w-100" id="" name="last_name"
                                    placeholder="Enter your last name">
                            </div>

                            <div class="my-md-4">
                                <label for="email" class="form-label fw-semibold">EMAIL ADDRESS<span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control w-100" id="" name="email"
                                    placeholder="Enter your email address">
                            </div>

                            <div class="my-md-4">
                                <label for="number" class="form-label fw-semibold">TELEPHONE</label>
                                <input type="number" class="form-control w-100" id="" name="number"
                                    placeholder="Enter your telephone">
                            </div>

                            <div class="my-md-4">
                                <label for="time" class="form-label fw-semibold">CHOOSE LOCATION</label>
                                <select class="form-select form-control w-100" id="">
                                    @if (sizeof($restaurants) > 0)
                                    <option value="">Select Restaurant</option>
                                    @foreach ($restaurants as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="my-md-4">
                                <label for="time" class="form-label fw-semibold">WHAT'S YOUR ENQUIRY REGARDING?
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-control w-100" id="">
                                    <option value="">Select an Option</option>
                                    <option value="Christmas party enquiries">Christmas party enquiries</option>
                                    <option value="Booking enquiry">Booking enquiry</option>
                                    <option value="Recruitment">Recruitment</option>
                                    <option value="Feedback">Feedback</option>
                                    <option value="Customer care">Customer care</option>
                                </select>
                            </div>

                            <div class="my-md-4">
                                <label for="message" class="form-label fw-semibold">MESSAGE
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control" name="message" id="message" cols="30" rows="5"
                                    placeholder="Enter your message here..."></textarea>
                            </div>

                            <div class="my-md-4">
                                <label for="usage">
                                    <input type="checkbox" id="usage" name="usage" value="usage">
                                    <strong>Usage of my personal data.</strong>
                                    The information you provide may be
                                    stored by us to aid communication. Please ensure you’ve read and understood our
                                    privacy policy before you continue.
                                </label>
                            </div>

                            <div class="my-md-4">
                                <label for="signup">
                                    <input type="checkbox" id="signup" name="signup" value="signup">
                                    <strong> Sign-up for news from Wildwood.</strong> By checking the
                                    box above you are agreeing to receive email marketing communications from Wildwood
                                    from time to time. We will not share your details with any 3rd parties. Please
                                    review our Privacy Policy for more information.
                                </label>
                            </div>

                            <div class="my-md-4">
                                <label for="terms">
                                    <strong>
                                        <input type="checkbox" id="terms" name="terms" value="terms">
                                        I have read and accepted the restaurant's terms & conditions.
                                    </strong>
                                </label>
                            </div>

                            <div class="my-md-4">
                                <button class="btn-rounded w-100 fw-semibold mb-md-5">Send Message</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>




        </div>
    </div>
</section>





@endsection