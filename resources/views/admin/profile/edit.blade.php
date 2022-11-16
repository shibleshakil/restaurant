@extends('master.admin.master')
@section('title', 'Edit Profile')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Column selectors table -->
            <section id="basic-form-layouts">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    <form class="form" method="post" action="{{ route ('profileUpdate', [Auth()->user()->name]) }}" enctype="multipart/form-data">
                                        @csrf
                                        <h4 class="form-section">Edit User Profile</h4>
                                        <div class="row align-items-center d-block">
                                            @if($data && Auth()->user()->user_img)
                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <img src="{{ asset('uploads/image/'.Auth()->user()->user_img)}}" alt="users avatar" width="120px" height="100px"
                                                class="users-avatar-shadow rounded-circle">
                                            </div>
                                            @endif
                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="user_img">Select User Image (Image Size Should Be 64 x 64 <span class="danger">*</span>): </label>
                                                <input type="file" name="user_img" id="user_img" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="name">User Name</label>
                                                <input type="text" id="name" class="form-control" placeholder="Jane Doe" name="name" value="{{$data ? Auth()->user()->name : ''}}">
                                            </div>
                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" class="form-control" placeholder="janedoe@example.com" name="email" value="{{$data ? Auth()->user()->email : ''}}" readonly>
                                            </div>
                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="phone">Phone No.</label>
                                                <input type="text" id="phone" class="form-control" placeholder="0185655696" name="phone" value="{{$data ? Auth()->user()->phone : ''}}">
                                            </div>

                                            <div class="form-group col-md-6 mb-2 mx-auto text-right">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="feather icon-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Column selectors table -->
        </div>
    </div>
@endsection
@section('script')
@endsection
