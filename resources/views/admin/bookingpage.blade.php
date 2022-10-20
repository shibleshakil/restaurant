@extends('master.admin.master')
@section('title', 'Booking')
@section('body')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-1">
        </div>
        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route ('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Setup</a>
                    </li>
                    <li class="breadcrumb-item active"><a href="#">Booking</a>
                    </li>
                </ol>
            </div>
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
                                <form class="form" method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="form-section"> Manage Booking</h4>
                                    <div class="row align-items-center d-block">
                                        @if($data && $data->cover_img)
                                            <div class="col-6 mb-2 mx-auto">
                                                <img src="{{ asset('uploads/image/'.$data->cover_img)}}" class="img-box">
                                            </div>
                                        @endif
                
                                        <div class="form-group col-6 mb-2 mx-auto">
                                            <label for="cover_img">Select Cover Image (Image Size Should Be 1920 x 1080 <span class="danger">*</span>): </label>
                                            <input type="file" name="cover_img" id="cover_img" class="form-control">
                                        </div>
                
                
                                        <div class="form-group col-md-6 mb-2 mx-auto">
                                            <label for="title">Title</label>
                                            <input type="text" id="title" class="form-control" placeholder="" name="title" value="{{$data ? $data->title : ''}}">
                                        </div>
                
                                        <div class="form-group col-md-6 mb-2 mx-auto">
                                            <label for="short_note">Short Note</label>
                                            <input type="text" id="short_note" class="form-control" name="short_note" value="{{$data ? $data->short_note : ''}}">
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