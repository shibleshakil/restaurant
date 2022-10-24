@extends('master.admin.master')
@section('title')
Dashboard
@endsection

@section('body')
<div class="content-wrapper">
    <div class="content-body">
        <!-- Minimal statistics with bg color section start -->
        <section id="minimal-statistics-bg">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card bg-primary">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-pointer white font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body white text-right">
                                        <h3>{{$totalArea}}</h3>
                                        <span>Total Area</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card bg-danger">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="fa-solid fa-utensils white font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body white text-right">
                                        <h3>{{$totaRestaurants}}</h3>
                                        <span>Total Restaurants</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card bg-success">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="fa-solid fa-check-to-slot white font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body white text-right">
                                        <h3>{{$totalBookings}}</h3>
                                        <span>Total Booking</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card bg-warning">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="fa-solid fa-clipboard-check white font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body white text-right">
                                        <h3>{{$todayBookings}}</h3>
                                        <span>Today Booking</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card bg-warning">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="fa-solid fa-utensils white font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body white text-right">
                                        <h3>{{$mostVisited}}</h3>
                                        <span>Most Visited Restaurants</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Minimal statistics with bg color section end -->
    </div>
</div>
@endsection
