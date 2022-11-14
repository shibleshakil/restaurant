<p style="margin-bottom:20px; text-align:center;"><strong>Order Details</strong></p>
<p><Strong>Name : {{$emailData['name']}}</Strong></p>
<p><Strong>Phone : {{$emailData['phone']}}</Strong></p>
<p><Strong>Email : {{$emailData['email']}}</Strong></p>
<p><Strong>No. of Guest : {{$emailData['no_of_guest']}}</Strong></p>
<table>
    <thead>
        <tr>
            <th>Sl</th>
            <th>Item</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        @if (sizeof($emailData['orderDetails']) > 0)
            <?php $sl = 0; ?>
            @foreach ($emailData['orderDetails'] as $key => $data)
                <tr>
                    <td>{{++$sl}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$emailData['quantity'][$key]}}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>