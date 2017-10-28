<html>
    <head>
        <style>  
            
        </style>
    </head>
    <body>
        
        <table style="width: 675px; margin: 0 auto; ">
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td align="right">
                    <span>{{@date('l, F j, Y')}}</span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="color: blue;"><h2>Active Orders</h2></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Start Date: <u><span>{{@date('m/d/Y', strtotime($startDate))}}</span></u></td>
                <td>End Date: <u><span>{{@date('m/d/Y', strtotime($endDate))}}</span></u></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        
        <table style="width: 675px; margin: 0 auto; ">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="width: 50px;"><h4>ID</h4></td>
                <td style="width: 100px;"><h4>Order Date</h4></td>
                <td style="width: 75px;"><h4>Status</h4></td>
                <td style="width: 125px;"><h4>Sale Person</h4></td>
                <td style="width: 125px;"><h4>Company</h4></td>
                <td style="width: 100px;"><h4>Order Quantity</h4></td>
                <td style="width: 100px;"><h4>Order SubTotal</h4></td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid;" ></td>
                <td style="border-bottom: 1px solid;" ></td>
                <td style="border-bottom: 1px solid;" ></td>
                <td style="border-bottom: 1px solid;" ></td>
                <td style="border-bottom: 1px solid;" ></td>
                <td style="border-bottom: 1px solid;" ></td>
                <td style="border-bottom: 1px solid;" ></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            
            <?php $sum = 0; ?>
            @foreach($orders as $order)
            <?php $sum = $sum + $order->order_sub_total; ?> 
            <tr>
                <td>{{$order->id}}</td>
                <td>{{@date('m/d/Y', strtotime($order->order_date))}}</td>
                <td>{{$order->status}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->company}}</td>
                <td>{{$order->orderQuantity}}</td>
                <td>SAR. {{@round($order->order_sub_total, 2)}}</td>
            </tr>
            @endforeach
            
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="border-bottom: 1px solid;" ></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>SAR. {{@round($sum, 2)}}</td>
            </tr>
            
        </table>
        
    </body>
</html>


