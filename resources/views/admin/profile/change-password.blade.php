@extends('master.admin.master')
@section('title', 'Change Password')
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
                                <form class="form" method="post" action="{{ route ('changePassword', [Auth()->user()->name]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="form-section">Change Password</h4>
                                    <div class="row align-items-center d-block">
                                        <div class="form-group col-md-6 mb-2 mx-auto">
                                            <label for="new_password">New Password<span class="text-danger">*</span></label>
                                            <input type="password" id="new_password" class="form-control" placeholder="" name="password" value="">
                                        </div>
                                        <div class="form-group col-md-6 mb-2 mx-auto">
                                            <label for="confirm_password">Confirm New Password<span class="text-danger">*</span></label>
                                            <input type="password" id="confirm_password" class="form-control" placeholder="" name="confirm_password" value="">
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
