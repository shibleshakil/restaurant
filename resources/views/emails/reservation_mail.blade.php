<table width="100%" style="background-color: #f7f6f4; padding-bottom: 5vh">
    <tr>
        <td>
            <h3 style="font-weight: bold; text-align: center; padding: 10px 0">Reservation Confirmation</h3>
        </td>
    </tr>
    <tr>
        <td>
            <table align="center" style="background-color: #ffffff; border-radius:10px; text-align: center; width: fit-content">
                <tr>
                    <td style=" padding: 32px">
                        <h3 style="font-weight: bold">A Reservation Has Been Confirmed At Your Restaurant</h3>

                        <p style="margin-bottom:20px; text-align:center;"><strong>Order Details</strong></p>
                        <p><Strong>Name : {{$emailData['name']}}</Strong></p>
                        <p><Strong>Phone : {{$emailData['phone']}}</Strong></p>
                        <p><Strong>Email : {{$emailData['email']}}</Strong></p>
                        <p><Strong>No. of Guest : {{$emailData['no_of_guest']}}</Strong></p>
                        <p><Strong>Your prefered time : {{date('d M, Y', strtotime($emailData['date']))}} {{date('h:ia', strtotime($emailData['preferred_time']))}}</Strong></p>
                        <table align="center" width="100%">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Sub Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (sizeof($emailData['orderDetails']) > 0)
                                <?php $sl = 0; $total = 0;?>
                                @foreach ($emailData['orderDetails'] as $key => $data)
                                    <?php
                                    $subtotal = ((float)$data->price) * ((int)($emailData['quantity'][$key]));
                                    $total = $total + $subtotal;
                                    ?>
                                    <tr>
                                        <td>{{++$sl}}</td>
                                        <td>{{$data->name}}</td>
                                        <td style="text-align:right;">{{$emailData['quantity'][$key]}}</td>
                                        <td style="text-align:right;">{{$data->price}}</td>
                                        <td style="text-align:right;">{{$subtotal}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"></td>
                                    <td style="text-align:right; font-weight:bold;">Total</td>
                                    <td style="text-align:right; font-weight:bold;">{{$total}}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <p><span style="font-weight: bold">Customer Special Request:</span> {{$emailData['special_request']}}</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
