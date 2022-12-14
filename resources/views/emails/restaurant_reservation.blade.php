<p style="margin-bottom:20px; text-align:center;"><strong>Order Details</strong></p>
<p><Strong>Name : {{$emailData['name']}}</Strong></p>
<p><Strong>Phone : {{$emailData['phone']}}</Strong></p>
<p><Strong>Email : {{$emailData['email']}}</Strong></p>
<p><Strong>No. of Guest : {{$emailData['no_of_guest']}}</Strong></p>
<p><Strong>Reserved For : {{date('d M, Y', strtotime($emailData['date']))}} {{date('h:ia', strtotime($emailData['preferred_time']))}}</Strong></p>
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
<p>Customer comments: {{$emailData['special_request']}}</p>