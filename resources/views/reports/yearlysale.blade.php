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
                <td style="color: blue;">
                    <h2>Yearly Sales Report</h2>
                </td>
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
                <td>{{$year}}</td>
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
                <td></td>
            </tr>
            <tr>
                <td style="width: 200px;"><h4>{{(($group==1)?'Category':(($group==2)?'Country':(($group==3)?'Customer':(($group==4)?'Employee':'Product'))))}}</h4></td>
                <td style="width: 100px;"><h4>Quantity</h4></td>
                <td style="width: 75px;"><h4>Q1</h4></td>
                <td style="width: 75px;"><h4>Q2</h4></td>
                <td style="width: 75px;"><h4>Q3</h4></td>
                <td style="width: 75px;"><h4>Q4</h4></td>
                <td style="width: 75px;"><h4>Total</h4></td>
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
            
            <?php 
            $lastItemId = '0';
            
            $itemName = '';
            $q1 = 0;
            $q2 = 0;
            $q3 = 0;
            $q4 = 0;
            $rowTotal = 0;
            $rowQtyTotal = 0;
            
            $sumQ1 = 0; 
            $sumQ2 = 0; 
            $sumQ3 = 0; 
            $sumQ4 = 0; 
            $sumTotal = 0;
            $sumQtyTotal = 0;
            
            for( $i = 0; $i<count($sales); $i++ ) 
             {
                 $sale = $sales[$i];
                if($sale->id != $lastItemId && $lastItemId != '0')
                {
                    $rowTotal = $q1 + $q2 + $q3 + $q4;
                    $sumTotal = $sumTotal + $rowTotal;
                    $sumQtyTotal = $sumQtyTotal + $rowQtyTotal;
                    
                    echo '<tr><td>'.$itemName.'</td><td>'.$rowQtyTotal.'</td><td>SAR. '.@round($q1, 2).'</td><td>SAR. '.@round($q2, 2).'</td><td>SAR. '.@round($q3, 2).'</td><td>SAR. '.@round($q4, 2).'</td><td>SAR. '.@round($rowTotal, 2).'</td></tr>';
                    
                    $sumQ1 = $sumQ1 + $q1;
                    $sumQ2 = $sumQ2 + $q2;
                    $sumQ3 = $sumQ3 + $q3;
                    $sumQ4 = $sumQ4 + $q4;
                    
                    $itemName = ''; $q1 = 0; $q2 = 0; $q3 = 0; $q4 = 0; $rowTotal = 0; $rowQtyTotal = 0;
                }
                $lastItemId = $sale->id;
                $itemName = $sale->group_name;

                if($sale->month == 1 || $sale->month == 2 || $sale->month == 3)
                {
                    $qf = $sale->price;
                    $q1 = $q1 + $qf;
                    $rowQtyTotal = $rowQtyTotal + $sale->quantity;
                }
                else if($sale->month == 4 || $sale->month == 5 || $sale->month == 6)
                {
                    $qs = $sale->price;
                    $q2 = $q2 + $qs;
                    $rowQtyTotal = $rowQtyTotal + $sale->quantity;
                }
                else if($sale->month == 7 || $sale->month == 8 || $sale->month == 9 )
                {
                    $qt = $sale->price;
                    $q3 = $q3 + $qt;
                    $rowQtyTotal = $rowQtyTotal + $sale->quantity;
                }
                else if($sale->month == 10 || $sale->month == 11 || $sale->month == 12 )
                {
                    $ql = $sale->price;
                    $q4 = $q4 + $ql;
                    $rowQtyTotal = $rowQtyTotal + $sale->quantity;
                }
                
                if($i == (count($sales)-1))
                {
                    $rowTotal = $q1 + $q2 + $q3 + $q4;
                    $sumTotal = $sumTotal + $rowTotal;
                    $sumQtyTotal = $sumQtyTotal + $rowQtyTotal;
                    
                    echo '<tr><td>'.$itemName.'</td><td>'.$rowQtyTotal.'</td><td>SAR. '.@round($q1, 2).'</td><td>SAR. '.@round($q2, 2).'</td><td>SAR. '.@round($q3, 2).'</td><td>SAR. '.@round($q4, 2).'</td><td>SAR. '.@round($rowTotal, 2).'</td></tr>';
                    
                    $sumQ1 = $sumQ1 + $q1;
                    $sumQ2 = $sumQ2 + $q2;
                    $sumQ3 = $sumQ3 + $q3;
                    $sumQ4 = $sumQ4 + $q4;
                    
                    $itemName = ''; $q1 = 0; $q2 = 0; $q3 = 0; $q4 = 0; $rowTotal = 0; $rowQtyTotal = 0;
                }
             }
             
            ?>
            
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
            <tr>
                <td></td>
                <td>{{$sumQtyTotal}}</td>
                <td>SAR. {{@round($sumQ1, 2)}}</td>
                <td>SAR. {{@round($sumQ2, 2)}}</td>
                <td>SAR. {{@round($sumQ3, 2)}}</td>
                <td>SAR. {{@round($sumQ4, 2)}}</td>
                <td>SAR. {{@round($sumTotal, 2)}}</td>
            </tr>
            
        </table>
        
    </body>
</html>


