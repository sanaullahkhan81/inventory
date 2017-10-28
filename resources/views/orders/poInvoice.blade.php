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
                    <h3>PO INVOICE #{{$invoice[0]->id}}</h3>
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
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="color:#888888;" >Ship To:</td>
                <td>{{$billShipInfo->ship_address}}</td>
                <td></td>
                <td style="color:#888888;" >Bill To:</td>
                <td>{{$billShipInfo->bill_address}}</td>
            </tr>
            <tr>
                <td></td>
                <td>{{$billShipInfo->ship_city." ".$billShipInfo->ship_state}}</td>
                <td></td>
                <td></td>
                <td>{{$billShipInfo->bill_city." ".$billShipInfo->bill_state}}</td>
            </tr>
            <tr>
                <td></td>
                <td>{{$billShipInfo->ship_zip." ".$billShipInfo->ship_country}}</td>
                <td></td>
                <td></td>
                <td>{{$billShipInfo->bill_zip." ".$billShipInfo->bill_country}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="color:#888888;" >PO Invoice No:</td>
                <td>{{$invoice[0]->id}}</td>
                <td></td>
                <td style="color:#888888;" ></td>
                <td></td>
            </tr>
            <tr>
                <td style="color:#888888;" >Invoice Date:</td>
                <td>{{date('m/d/Y',strtotime($invoice[0]->created_date))}}</td>
                <td></td>
                <td style="color:#888888;" ></td>
                <td></td>
            </tr>
            <tr>
                <td style="color:#888888;" >Order No:</td>
                <td>{{$orderInfo[0]->id}}</td>
                <td></td>
                <td style="color:#888888;" ></td>
                <td></td>
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
                <td style="width: 300px;" >Product</td>
                <td style="width: 125px;" >Quantity</td>
                <td style="width: 125px;" >Unit Price</td>
                <td style="width: 125px;" >Price</td>
            </tr>
            @foreach($orderDetailInfo as $product)
            <tr>
                <td>{{$product->product_name}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$orderInfo[0]->currency_sign}}{{@round($product->unit_cost*$orderInfo[0]->currency_value, 2)}}</td>
                <td>{{$orderInfo[0]->currency_sign}}{{@round($product->extended_price*$orderInfo[0]->currency_value, 2)}}</td>
            </tr>
            @endforeach
            <tr>
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
            </tr>
        </table>
        <table style="width: 675px; margin: 0 auto; ">
            <tr>
                <td style="width: 300px;"></td>
                <td style="width: 125px;"></td>
                <td style="width: 125px;"><hr></td>
                <td style="width: 125px;"><hr></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Invoice Total</td>
                <td>{{$orderInfo[0]->currency_sign}}{{@round($orderInfo[0]->order_sub_total*$orderInfo[0]->currency_value, 2)}}</td>
            </tr>
        </table>
    </body>
</html>


