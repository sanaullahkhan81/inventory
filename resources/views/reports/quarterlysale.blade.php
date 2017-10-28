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
                <td style="color: blue;"><h2>Quarterly Sales Report</h2></td>
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
                <td>Q{{$quarter.' '.$year}}</td>
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
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="width: 250px;"><h4>{{(($group==1)?'Category':(($group==2)?'Country':(($group==3)?'Customer':(($group==4)?'Employee':'Product'))))}}</h4></td>
                <td style="width: 100px;"><h4>Quantity</h4></td>
                <td style="width: 75px;"><h4>{{(($quarter==1)?'Jan':(($quarter==2)?'Apr':(($quarter==3)?'Jul':'Oct')))}}</h4></td>
                <td style="width: 75px;"><h4>{{(($quarter==1)?'Feb':(($quarter==2)?'May':(($quarter==3)?'Aug':'Nov')))}}</h4></td>
                <td style="width: 75px;"><h4>{{(($quarter==1)?'Mar':(($quarter==2)?'Jun':(($quarter==3)?'Sep':'Dec')))}}</h4></td>
                <td style="width: 100px;"><h4>Total</h4></td>
            </tr>
            <tr>
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
            </tr>
            
            <?php 
            $lastItemId = '0';
            
            $itemName = '';
            $m1 = 0;
            $m2 = 0;
            $m3 = 0;
            $rowTotal = 0;
            $rowQtyTotal = 0;
            
            $sumM1 = 0; 
            $sumM2 = 0; 
            $sumM3 = 0; 
            $sumTotal = 0; 
            $sumQtyTotal = 0;
            
            if(count($sales) > 0) {
                $lastItemId = ''.$sales[0]->id;
//                echo '<tr><td>-'.$sales[0]->id.'-</td><td>-'.$lastItemId.'-</td><td></td><td></td><td></td></tr>';
            }  
            
             for( $i = 0; $i<count($sales); $i++ ) 
             {
                 $sale = $sales[$i];
                 
                if($sale->id != $lastItemId )
                {
                    $rowTotal = $m1 + $m2 + $m3;
                    $sumTotal = $sumTotal + $rowTotal;
                    $sumQtyTotal = $sumQtyTotal + $rowQtyTotal;

                    echo '<tr><td>'.$itemName.'</td><td>'.$rowQtyTotal.'</td><td>SAR. '.@round($m1, 2).'</td><td>SAR. '.@round($m2, 2).'</td><td>SAR. '.@round($m3, 2).'</td><td>SAR. '.@round($rowTotal, 2).'</td></tr>';
                    $itemName = ''; $m1 = 0; $m2 = 0; $m3 = 0; $rowTotal = 0; $rowQtyTotal = 0;
                }
                $lastItemId = $sale->id;
                $itemName = $sale->group_name;

                if($sale->month == 1 || $sale->month == 4 || $sale->month == 7 || $sale->month == 10)
                {
                    $m1 = $sale->price;
                    $sumM1 = $sumM1 + $m1;
                    $rowQtyTotal = $rowQtyTotal + $sale->quantity;
                }
                else if($sale->month == 2 || $sale->month == 5 || $sale->month == 8 || $sale->month == 11)
                {
                    $m2 = $sale->price;
                    $sumM2 = $sumM2 + $m2;
                    $rowQtyTotal = $rowQtyTotal + $sale->quantity;
                }
                else if($sale->month == 3 || $sale->month == 6 || $sale->month==9 || $sale->month == 12)
                {
                    $m3 = $sale->price;
                    $sumM3 = $sumM3 + $m3;
                    $rowQtyTotal = $rowQtyTotal + $sale->quantity;
                }
                
                if($i == (count($sales)-1))
                {
                    $rowTotal = $m1 + $m2 + $m3;
                    $sumTotal = $sumTotal + $rowTotal;
                    $sumQtyTotal = $sumQtyTotal + $rowQtyTotal;

                    echo '<tr><td>'.$itemName.'</td><td>'.$rowQtyTotal.'</td><td>SAR. '.@round($m1, 2).'</td><td>SAR. '.@round($m2, 2).'</td><td>SAR. '.@round($m3, 2).'</td><td>SAR. '.@round($rowTotal, 2).'</td></tr>';
                    $itemName = ''; $m1 = 0; $m2 = 0; $m3 = 0; $rowTotal = 0; $rowQtyTotal = 0;
                }
//                echo '<tr><td>'.$sale->group_name.'</td><td>$'.@round(0, 2).'</td><td>M-'.@round($sale->month, 2).'</td><td>$'.@round(0, 2).'</td><td>$'.@round($sale->price, 2).'</td></tr>';
             }
            
            ?>
            
            <tr>
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
            </tr>
            <tr>
                <td></td>
                <td>{{$sumQtyTotal}}</td>
                <td>SAR. {{@round($sumM1, 2)}}</td>
                <td>SAR. {{@round($sumM2, 2)}}</td>
                <td>SAR. {{@round($sumM3, 2)}}</td>
                <td>SAR. {{@round($sumTotal, 2)}}</td>
            </tr>
            
        </table>
        
    </body>
</html>


