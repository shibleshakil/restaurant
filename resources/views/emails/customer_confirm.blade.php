    
<p>Your Order Has Been Confirmed</p>
<h3 style="font-weight: bold">Thank You Sir For Choosing our Restaurant</h3>

<p style="margin-bottom:20px; text-align:center;"><strong>Your Order Details</strong></p>
<p><Strong>Name : {{$emailData['name']}}</Strong></p>
<p><Strong>Phone : {{$emailData['phone']}}</Strong></p>
<p><Strong>Email : {{$emailData['email']}}</Strong></p>
<p><Strong>No. of Guest : {{$emailData['no_of_guest']}}</Strong></p>
<p><Strong>Your prefered time : {{date('d M, Y', strtotime($emailData['date']))}} {{date('h:ia', strtotime($emailData['preferred_time']))}}</Strong></p>
<table>
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
<p><span style="font-weight: bold">Your Special Request:</span> {{$emailData['special_request']}}</p>
<p style="font-style: italic;">Note: If you have any feedback you can reach us via email: {{$emailData['restaurantInfo']['email']}}, 
@if ($emailData['restaurantInfo']['contact_number']) or phone: {{$emailData['restaurantInfo']['contact_number']}} @endif </p>
<p style="">Have A Good Day</p> 
<h3>Regards</h3>
<p> <strong>{{$emailData['restaurantInfo']['name']}}</strong> <br> {{$emailData['restaurantInfo']['address']}}</p>