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
                <td></td>
                <td align="right">
                    <span>{{@date('l, F j, Y')}}</span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="color: blue;">
                    <h3>INVOICE #{{$invoice[0]->id}}</h3>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr >
                <td style="color:#888888;" >Ship To:</td>
                <td>{{$customer[0]->customer_name}}</td>
                <td></td>
                <td style="color:#888888;" >Bill To:</td>
                <td>{{$customer[0]->company}}</td>
            </tr>
            <tr>
                <td></td>
                <td>{{$orderInfo[0]->ship_address}}</td>
                <td></td>
                <td></td>
                <td>{{$customer[0]->address}}</td>
            </tr>
            <tr>
                <td></td>
                <td>{{$orderInfo[0]->ship_city." ".$orderInfo[0]->ship_state." ".$orderInfo[0]->ship_zip}}</td>
                <td></td>
                <td></td>
                <td>{{$customer[0]->city." ".$customer[0]->state." ".$customer[0]->zip}}</td>
            </tr>
            <tr>
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
            </tr>
            <tr>
                <td style="color:#888888;" >Invoice No:</td>
                <td>{{$invoice[0]->id}}</td>
                <td></td>
                <td style="color:#888888;" >Sale Person:</td>
                <td>{{$orderInfo[0]->name}}</td>
            </tr>
            <tr>
                <td style="color:#888888;" >Invoice Date:</td>
                <td>{{date('m/d/Y',strtotime($invoice[0]->created_date))}}</td>
                <td></td>
                <td style="color:#888888;" >Ship Via:</td>
                <td>{{$shipper[0]->company}}</td>
            </tr>
            <tr>
                <td style="color:#888888;" >Order No:</td>
                <td>{{$orderInfo[0]->id}}</td>
                <td></td>
                <td style="color:#888888;" >Ship Date:</td>
                <td>{{date('m/d/Y',strtotime($orderInfo[0]->shipped_date))}}</td>
            </tr>
            <tr>
                <td style="color:#888888;" >Order date:</td>
                <td>{{date('m/d/Y',strtotime($orderInfo[0]->order_date))}}</td>
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
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        
        <table style="width: 675px; margin: 0 auto; ">
            <tr style="background-color: #999999; color: #ffffff;">
                <td style="width: 275px;" >Product</td>
                <td style="width: 100px;" >Quantity</td>
                <td style="width: 100px;" >Unit Price</td>
                <td style="width: 100px;" >Discount</td>
                <td style="width: 100px;" >Price</td>
            </tr>
            @foreach($orderDetailInfo as $product)
            <tr>
                <td>{{$product->product_name}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$orderInfo[0]->currency_sign}}{{@round($product->unit_price*$orderInfo[0]->currency_value, 2)}}</td>
                <td>{{$product->discount}}%</td>
                <td>{{$orderInfo[0]->currency_sign}}{{@round($product->extended_price*$orderInfo[0]->currency_value, 2)}}</td>
            </tr>
            @endforeach
            <tr>
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
            </tr>
        </table>
        <table style="width: 675px; margin: 0 auto; ">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><hr></td>
                <td><hr></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Sub Total</td>
                <td>{{$orderInfo[0]->currency_sign}}{{@round($orderInfo[0]->order_sub_total*$orderInfo[0]->currency_value, 2)}}</td>
            </tr>
<!--            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Taxes</td>
                <td>{{$orderInfo[0]->currency_sign}}{{@round($orderInfo[0]->tax*$orderInfo[0]->currency_value, 2)}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Freight</td>
                <td>{{$orderInfo[0]->currency_sign}}{{@round($orderInfo[0]->shipping_fee, 2)}}</td>
            </tr>-->
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Invoice Total</td>
                <td>{{$orderInfo[0]->currency_sign}}{{@round($orderInfo[0]->order_total*$orderInfo[0]->currency_value, 2)}}</td>
            </tr>
        </table>
    </body>
</html>


