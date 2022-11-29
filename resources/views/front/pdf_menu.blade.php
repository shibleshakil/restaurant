<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data->name}} - Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        * {
            box-sizing: border-box;
                font-size: 14px;
        }
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: auto;

            /** Extra personal styles **/
            /* background-color: #03a9f4; */
            color: #000;
            text-align: center;
            /* line-height: 1.5cm; */
        }
        /** Define the footer rules **/
        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height: 1cm;

            /** Extra personal styles **/
            /* background-color: #03a9f4; */
            color: #000;
            text-align: center;
            /* line-height: 1.5cm; */
        }
        /* Create three unequal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            /* height: 300px; Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        } 

        h5{
            margin:5px 0;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .b-none{
            border: none !important;
        }
        .m-t{
            margin-top: -10px !important;
        }
        .m-t50{
            margin-top: -5% !important;
        }

        .bg-light{
            background: #fff !important;
        }
        .menu{
            padding: 20px 0px !important;
        }
        
        .menu-table img{
            width:100px;
            height:60px;
        }

        .text-center{
            text-align: center !important;
        }
        p{
            margin: 0px;
        }
        .col-3{
            float: left;
            width: 20%;
        }
        .col-8{
            float: left;
            width: 80%;
        }
        .col-1{
            float: left;
            width: 10%;
        }
        .col-md-6 {
            -ms-flex: 0 0 50%; flex: 0 0 50%; max-width: 50%;
        }

        .info td{
            vertical-align:middle !important;
        }
        .menu-table td{
            vertical-align:middle !important;
        }
        .item {
            page-break-inside: avoid !important;
        }
        @media print{@page {size: landscape}}
    </style>
</head>
<body>
    <header>
        <table style="margin-bottom:20px; width:100%" class="b-none info text-center">
            <tbody>
                <tr>
                    <td width="30%" class="b-none">
                        <img src="{{$gsetting->logo ? asset ('uploads/image/'. $gsetting->logo) : asset('img/logo.jpg')}}" height="50px" alt="" class="img-fluid">
                    </td>
                    <td width="70%" class="b-none">
                        <p> <strong style="font-size:20px">{{$data->name}}</strong> <br>
                        <span class="font-12" style="margin:0px">{{$data->address}} 
                            @if($data->phone) <br> Contact: {{$data->phone}} @endif
                            @if($data->email) <br> Email: {{$data->email}} @endif
                        </span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </header>

    <footer>
    </footer>
    <main>
        <div class="row">
            @if (sizeof ($menusCategories) > 0)
                @foreach ($menusCategories as $mcat)
                    @if (sizeof($menus->where('menu_sub_category_id', $mcat->id))> 0)
                        <div class="col-md-12 item">
                            <p style="text-align:center; font-size:16px; font-weight: bold; margin:10px 0px;">{{$mcat->name}}</p>
                            <table style="width:100%" class="b-none menu-table">
                                <tbody>
                                    @foreach ($menus->where('menu_sub_category_id', $mcat->id) as $item)
                                        <tr>
                                            <td width="10%" class="b-none">
                                                <img src="{{$item->image ? asset('uploads/image/'.$item->image) : asset('uploads/image/1666163556image.jpg')}}" />
                                            </td>
                                            <td width="80%" style="text-align: left; padding: 0px 10px;" class="b-none">
                                                <p><strong>{{$item->name}}</strong> <br> {{$item->description}}</p>
                                            </td>
                                            <td width="10%" style="text-align: right; padding-right:10px; font-weight:bold;" class="b-none">BDT{{$item->price}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        <div class="row">
            @if (sizeof ($lunchItems) > 0)
                <div class="col-md-12 item">
                    <p style="text-align:center; font-size:16px; font-weight: bold; margin:10px 0px;">Lunch Special</p>
                    <table style="width:100%" class="b-none menu-table">
                        <tbody>
                            @foreach ($lunchItems as $lt)
                                <tr>
                                    <td width="10%" class="b-none">
                                        <img src="{{$lt->image ? asset('uploads/image/'.$lt->image) : asset('uploads/image/1666163556image.jpg')}}" />
                                    </td>
                                    <td width="80%" style="text-align: left; padding: 0px 10px;" class="b-none">
                                        <p><strong>{{$lt->item}}</strong> <br> {{$lt->description}}</p>
                                    </td>
                                    <td width="10%" style="text-align: right; padding-right:10px; font-weight:bold;" class="b-none">BDT{{$lt->price}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            @if (sizeof ($dinnerItems) > 0)
                <div class="col-md-12 item">
                    <p style="text-align:center; font-size:16px; font-weight: bold; margin:10px 0px;">Dinner Special</p>
                    <table style="width:100%" class="b-none menu-table">
                        <tbody>
                            @foreach ($dinnerItems as $dn)
                                <tr>
                                    <td width="10%" class="b-none">
                                        <img src="{{$dn->image ? asset('uploads/image/'.$dn->image) : asset('uploads/image/1666163556image.jpg')}}" />
                                    </td>
                                    <td width="80%" style="text-align: left; padding: 0px 10px;" class="b-none">
                                        <p><strong>{{$dn->item}}</strong> <br> {{$dn->description}}</p>
                                    </td>
                                    <td width="10%" style="text-align: right; padding-right:10px; font-weight:bold;" class="b-none">BDT{{$dn->price}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>
    <script src="{{asset('/js/jquery-3.6.1.min.js')}}"></script>
</body>
</html>