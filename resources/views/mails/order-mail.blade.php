<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>
    <p>HI {{$order->firstname}} {{$order->lastname}}</p>
    <p>YourOrderhasbeen successfully please.</p>
    <table style="width: 600px; text-align:right">
        <thead>
            <tr>
                <th>image</th>
                <th>name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $order->orderItems as $item )
                <tr>
                    <td>
                        <img src="{{ asset(optional($item->product)->image) }}" width="100"/>
                    </td>
                    <td>{{optional($item->product)->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{number_format( ($item->quantity * $item->price ) , 2 ) }}</td>
                </tr>   
            @endforeach
            <tr>
                <td colspan="3" style=""></td>
                <td style="font-size: 15px; font-weight:bold;">SubTotal : ${{$order->subtotal}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 15px; font-weight:bold;">Tax : ${{$order->tax}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 15px; font-weight:bold;">Shipping : Free Shipping</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 22px; font-weight:bold;">Total : ${{$order->total}}</td>
            </tr>
        </tbody>
    </table>
    
</body>
</html>