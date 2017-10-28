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
                <td align="right">
                    <span>{{@date('l, F j, Y')}}<br />{{@date('g:i:s A')}}</span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="color: blue;"><h2>Monthly Sales Report</h2></td>
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
                <td>{{(($month==1)?'January':(($month==2)?'Febuary':(($month==3)?'March':(($month==4)?'April':(($month==5)?'May':(($month==6)?'June':(($month==7)?'July':(($month==8)?'August':(($month==9)?'September':(($month==10)?'October':(($month==11)?'November':'December'))))))))))).', '.$year}}</td>
                <td></td>
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
            </tr>
            <tr>
                <td style="width: 275px;"><h4>{{(($group==1)?'Category':(($group==2)?'Country':(($group==3)?'Customer':(($group==4)?'Employee':'Product'))))}}</h4></td>
                <td style="width: 200px;"></td>
                <td style="width: 100px;">Quantity</td>
                <td style="width: 100px;"><h4>Sales</h4></td>
            </tr>
            <tr>
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
            </tr>
            
            <?php
                $sumTotal = 0; 
                $sumQtyTotal = 0;
            ?>
            
            @foreach($sales as $sale)
            <?php $sumTotal = $sumTotal + $sale->price; 
                  $sumQtyTotal = $sumQtyTotal + $sale->quantity?> 
            <tr>
                <td>{{$sale->group_name}}</td>
                <td></td>
                <td>{{$sale->quantity}}</td>
                <td>SAR. {{@round($sale->price, 2)}}</td>
            </tr>
            @endforeach
            
            <tr>
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
            </tr>
            <tr>
                <td></td>
                <td>{{(($month==1)?'January':(($month==2)?'Febuary':(($month==3)?'March':(($month==4)?'April':(($month==5)?'May':(($month==6)?'June':(($month==7)?'July':(($month==8)?'August':(($month==9)?'September':(($month==10)?'October':(($month==11)?'November':'December')))))))))))}} Sales Total</td>
                <td>{{$sumQtyTotal}}</td>
                <td>SAR. {{@round($sumTotal, 2)}}</td>
            </tr>
            
        </table>
        
    </body>
</html>


