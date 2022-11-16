<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data->name}} Menu</title>
    <style>
        html,
        body,
        .wrapper {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            /* overflow: hidden; */
        }

        .wrapper {
            display: flex;
        }

        @media (orientation:portrait) {
            html {}

            .wrapper {
                flex-direction: column;
            }
        }

        @media (orientation:landscape) {
            html {}

        }

        html {
            font-size: 14px;
        }

        body {
            text-align: center;
            line-height: 1.2em;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
        }

        .brand {
            width: 100px;
            position: relative;
            text-align: center;
            background: #ebe3e3;
            color: #000;
            display: inline-grid;
            align-content: center;
        }

        .brand .logo {
            position: absolute;
            transform: rotate(270deg);
            text-transform: uppercase;
            font-size: 20px;
            line-height: normal;
            width: 100%;
            padding: 2rem 0;
        }

        .brand .mtitle {
            transform: rotate(270deg);
            font-size: 20px;
        }
        .brand .logo::first-letter {
            font-weight: bold;
        }

        .list {
            display: flex;
            flex: 1;
        }

        .list img {
            max-width: 100%;
            max-height: 100%;
        }

        .title {
            font-size: 3rem;
            line-height: 1em;
            margin-bottom: 0.5em;
        }

        .subtitle {
            font-size: 1.5rem;
            opacity: 0.8;
            line-height: 1.2em;
        }

        .items {
            flex: 1;
            transition: transform 1s;
            padding: 1rem;
        }

        .item {
            display: flex;
            align-items: center;
            padding: 1rem;
        }

        .items.columns-2 .item-container {
            width: 50%;
            float: left;
        }

        .items.columns-2 .item-container:nth-child(odd) {
            clear: both;
        }

        .items.columns-2 .item-container:nth-child(odd) .item {
            margin-right: 1rem;
        }

        .item .image {
            width: 140px;
            text-align: left;
            padding: 1rem;
            display: flex;
            align-items: center;
        }

        .item .details {
            flex: 1;
            text-align: left;
            padding: 0 1rem;
        }

        .item .name {
            font-weight: bold;
            margin-bottom: 0.5em;
            font-size: 100%;
        }

        .item .labels {}

        .item .label {
            width: 2em;
            height: 2em;
            object-fit: contain;
            position: relative;
        }

        .item .description {}

        .item .price {
            text-align: right;
            font-size: 100%;
            font-weight: bold;
        }
        .top-head{
            background: #dfdfdf;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="row top-head">
        <div class="col-md-12 text-cenetr">
            <h2>{{$data->name}}</h2>
            <h6>Address: {{$data->address}}</h6>
            <h6>Contact No.: {{$data->phone}}</h6>
            <h6>Email: {{$data->email}}</h6>
        </div>
    </div>
    <div class="category">
        @if (sizeof ($menusCategories) > 0)
            @foreach ($menusCategories as $mcat)
                @if (sizeof($menus->where('menu_sub_category_id', $mcat->id))> 0)
                    <div class="wrapper">
                        <div class="brand">
                            <span class="mtitle">{{$mcat->name}}</span>
                            <!-- <div class="logo">{{$mcat->name}}</div> -->
                        </div>
                        <div class="list">
                            <div class="items columns-2">
                                @foreach ($menus->where('menu_sub_category_id', $mcat->id) as $item)
                                    <div class="item-container">
                                        <div class="item">
                                            <div class="image">
                                                <img src="{{$item->image ? asset('uploads/image/'.$item->image) : 'http://tonsite.ca/wp-content/uploads/2015/07/sriracha_burger.png'}}" />
                                            </div>
                                            <div class="details">
                                                <div class="name">{{$item->name}}</div>
                                                <div class="description">{{$item->description}}</div>
                                            </div>

                                            <div class="price">৳{{$item->price}}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
        <!-- <hr> -->
        @if (sizeof ($lunchItems) > 0)
        <div class="wrapper">
            <div class="brand">
                <span class="mtitle">Lunch Special</span>
                <!-- <div class="logo">Lunch Special</div> -->
            </div>
            <div class="list">
                <div class="items columns-2">
                    @foreach ($lunchItems as $lt)
                        <div class="item-container">
                            <div class="item">
                                <div class="image">
                                    <img src="{{ asset('uploads/image/'.$lt->image)}}" />
                                </div>
                                <div class="details">
                                    <div class="name">{{$lt->item}}</div>
                                    <div class="description">{{$lt->description}}
                                    </div>
                                </div>

                                <div class="price">৳{{$lt->price}}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- </div> -->
            </div>
        </div>
        @endif
        @if (sizeof ($dinnerItems) > 0)
        <div class="wrapper">
            <div class="brand">
                <span class="mtitle">Dinner Special</span>
                <!-- <div class="logo">Dinner Special</div> -->
            </div>
            <div class="list">
                <div class="items columns-2">
                    @foreach ($dinnerItems as $dn)
                        <div class="item-container">
                            <div class="item">
                                <div class="image">
                                    <img src="{{ asset('uploads/image/'.$dn->image)}}" width="120px"/>
                                </div>
                                <div class="details">
                                    <div class="name">{{$dn->item}}</div>
                                    <div class="description">{{$dn->description}}</div>
                                </div>

                                <div class="price">৳{{$dn->price}}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- </div> -->
            </div>
        </div>
        @endif
    </div>
    
    <!-- <div class="row top-head">
        <div class="col-md-12 text-cenetr">
            <h2>Have a good day</h2>
        </div>
    </div> -->
    <script src="{{asset('/js/jquery-3.6.1.min.js')}}"></script>
</body>

</html>