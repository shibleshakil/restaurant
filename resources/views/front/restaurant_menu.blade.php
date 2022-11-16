<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data->name}} Menu</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/all.css')}}">
    <style>
        .vertical {
            border-left: 6px solid black;
            height: 200px;
            position:absolute;
            left: 50%;
        }

        .bg-light{
            background: #fff !important;
        }
        .menu{
            padding: 20px 0px !important;
        }
        body{
            background: #eee;
            font-family:sans-serif;
        }
        
        .menu img{
            width:140px;
            height:80px;
        }
    </style>
</head>
<body>
    <div class="container py-md-3 bg-light">
        <div class="row py-md-3">
            <div class="col-md-3 text-center">
                <img src="{{$gsetting->logo ? asset ('uploads/image/'. $gsetting->logo) : asset('img/logo.jpg')}}" height="50px" alt="" class="img-fluid">
            </div>
            <div class="col-md-9 text-center">
                <h3 class="bold" style="margin-top:0px">{{$data->name}}</h3>
                <p class="font-12" style="margin:0px">{{$data->address}} 
                    @if($data->phone) <br> Contact: {{$data->phone}} @endif
                    @if($data->email) <br> Email: {{$data->email}} @endif
                </p>
            </div>
        </div>
        <div class="menu" >
            @if (sizeof ($menusCategories) > 0)
                @foreach ($menusCategories as $mcat)
                    @if (sizeof($menus->where('menu_sub_category_id', $mcat->id))> 0)
                        <div class="row">
                            <div class="col-12 text-capitalize text-center">
                                <h4 class="fw-semibold">{{$mcat->name}}</h4>
                            </div>
                        </div>
                        <div class="row py-md-3">
                            @foreach ($menus->where('menu_sub_category_id', $mcat->id) as $item)
                            <div class="col-md-6 ">
                                <div class="row py-1">
                                    <div class="col-3">
                                        <img src="{{$item->image ? asset('uploads/image/'.$item->image) : asset('uploads/image/1666163556image.jpg')}}" />
                                    </div>
                                    <div class="col-7 text-start ps-1">
                                        <p><strong>{{$item->name}}</strong> <br> {{$item->description}}</p>
                                    </div>
                                    <div class="col-2" style="text-align:right">
                                        <h5 class="fw-semibold">{{$item->price}}&#2547;</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        <div class="menu">
            @if (sizeof ($lunchItems) > 0)
                <div class="row">
                    <div class="col-12 text-capitalize text-center">
                        <h4 class="fw-semibold">Lunch Special</h4>
                    </div>
                </div>
                
                <div class="row py-md-3">
                    @foreach ($lunchItems as $lt)
                    <div class="col-md-6">
                        <div class="row py-1">
                            <div class="col-3">
                                <img src="{{ asset('uploads/image/'.$lt->image)}}">
                            </div>
                            <div class="col-7 text-start ps-1">
                                <p><strong>{{$lt->item}}</strong> <br> {{$lt->description}}</p>
                            </div>
                            <div class="col-2" style="text-align:right">
                                <h5 class="fw-semibold">{{$lt->price}}&#2547;</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="menu">
            @if (sizeof ($dinnerItems) > 0)
                <div class="row">
                    <div class="col-12 text-capitalize text-center">
                        <h4 class="fw-semibold">Dinner Special</h4>
                    </div>
                </div>
                
                <div class="row py-md-3">
                    @foreach ($dinnerItems as $dn)
                    <div class="col-md-6">
                        <div class="row py-1">
                            <div class="col-3">
                                <img src="{{ asset('uploads/image/'.$dn->image)}}">
                            </div>
                            <div class="col-7 text-start ps-1">
                                <p><strong>{{$dn->item}}</strong> <br> {{$dn->description}}</p>
                            </div>
                            <div class="col-2" style="text-align:right">
                                <h5 class="fw-semibold">{{$dn->price}}&#2547;</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <script src="{{asset('/js/jquery-3.6.1.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.js')}}"></script>
</body>
</html>
