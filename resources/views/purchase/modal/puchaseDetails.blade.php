<style>
    * {
        .border-radius(0) !important;
    }
    
    #field {
        margin-bottom:20px;
    }
    .border_top{
        border-top: 2pt solid black;
    }
    
</style>
        
<script>
        
    var arrSupplierProducts = <?php echo json_encode($supplierProductsTemp); ?>;
</script>
        
<div class="x_content">
    <div class="text-left">
        <label>Please Select Currency</label>
        <select id="selectPoCurrencyType" {{(($orderInfo != null && ($orderInfo[0]->submitted == 1 || $orderInfo[0]->completed == 1))? 'disabled':'' )}}>
            <option value="1" {{($orderInfo != null && $orderInfo[0]->currency_type == 1)?'selected':''}}>SAR</option>
            <option value="2" {{($orderInfo != null && $orderInfo[0]->currency_type == 2)?'selected':''}}>YER</option>
        </select>
        <input type="text" value=" {{($orderInfo != null)?$orderInfo[0]->currency_value:'1'}}" id="txtPoCurrencyValue" style="{{($orderInfo != null && $orderInfo[0]->currency_type == 2)?'':'display:none;'}}" {{(($orderInfo != null && ($orderInfo[0]->submitted == 1 || $orderInfo[0]->completed == 1))? 'disabled':'' )}}/>
    </div>      
    <div class="text-right">
        <a id="btn-add-supplier-product" class="btn btn-info" {{($orderInfo != null && $orderInfo[0]->submitted == 1)?'disabled':''}} ><i class="fa fa-plus" aria-hidden="true" > Add Product</i></a>
    </div>
                
    <div class="table-responsive" style="overflow-x: visible;">
        <table class="table table-striped jambo_table">
            <thead>
                    <tr class="headings">
                              
                    <th class="column-title"></th>
                    <th class="column-title">Product </th>
                    <th class="column-title">Quantity </th>
                    <th class="column-title">Unit Price </th>
                    <th class="column-title">Total Price </th>
                    <th class="column-title"> </th>
                                
                </tr>
            </thead>
                            
            <tbody id="supplierproductstable">
                @foreach($orderDetailInfo as $odi)
                <tr class="even pointer rowSupplierProducts">
                    <td class="col-md-1">
                        <img class="propic" src="uploads/{{(($odi->attachments != null)?$odi->attachments:'product.jpg')}}" style="with: 40px; height: 30px;" >
                    </td>
                    <td class="col-md-4">
                        <select name="quanity" class="form-control drpSupplierProductNames" {{($orderInfo != null && $orderInfo[0]->submitted == 1)?'disabled':''}} >
                                <option value="0">Please Select</option>
                            @foreach($supplierProducts as $pro) 
                            <option value="{{$pro->id}}" {{($pro->id==$odi->product_id)?'selected':''}}>{{$pro->product_name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="col-md-2">
                        <input  class="form-control quantitypurchase" type="number" name="quantity" min="1" max="" value="{{$odi->quantity}}" {{($orderInfo != null && $orderInfo[0]->submitted == 1)?'disabled':''}} />
                    </td>
                    <td class="col-md-2">
                        <input class="form-control unitpricepurchase" type="text" name="unitprice" data-unitp="{{$odi->unit_cost}}" disabled value="{{$odi->unit_cost*$orderInfo[0]->currency_value}}" onchange="setTwoNumberDecimal()" {{($orderInfo != null && $orderInfo[0]->submitted == 1)?'disabled':''}} />
                    </td>
                    <td class="col-md-2">
                        <input class="form-control totalpricepurchase" type="text" name="totalprice" disabled value="{{$odi->extended_price*$orderInfo[0]->currency_value}}" onchange="setTwoNumberDecimal()" {{($orderInfo != null && $orderInfo[0]->submitted == 1)?'disabled':''}} />
                    </td>
                    <td class="col-md-1">
                        <a href="javascript:void(0);" class="link deleteproductrowpurchase" {{($orderInfo != null && $orderInfo[0]->submitted == 1)?'disabled':''}}><u>Delete</u></a>
                    </td>
                </tr>
                @endforeach
                
                @if($productInfo != null)
                <tr class="even pointer rowSupplierProducts">
                    <td class="col-md-1">
                        <img class="propic" src="uploads/{{(($productInfo[0]->attachments != null)?$productInfo[0]->attachments:'product.jpg')}}" style="with: 40px; height: 30px;" >
                    </td>
                    <td class="col-md-4">
                        <select name="quanity" class="form-control drpSupplierProductNames" >
                                <option value="0">Please Select</option>
                            @foreach($supplierProducts as $pro) 
                            <option value="{{$pro->id}}" {{($pro->id==$productInfo[0]->id)?'selected':''}}>{{$pro->product_name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="col-md-2">
                        <input  class="form-control quantitypurchase" type="number" name="quantity" min="1" max="" value="{{$inventoryInfo[0]->below_target_level}}"  />
                    </td>
                    <td class="col-md-2">
                        <input class="form-control unitpricepurchase" type="text" name="unitprice" data-unitp="{{$productInfo[0]->standard_cost}}" disabled value="{{$productInfo[0]->standard_cost}}" onchange="setTwoNumberDecimal()"  />
                    </td>
                    <td class="col-md-2">
                        <input class="form-control totalpricepurchase" type="text" name="totalprice" disabled value="{{($inventoryInfo[0]->below_target_level*$productInfo[0]->standard_cost)}}" onchange="setTwoNumberDecimal()"  />
                    </td>
                    <td class="col-md-1">
                        <a href="javascript:void(0);" class="link deleteproductrowpurchase" ><u>Delete</u></a>
                    </td>
                </tr>
            <script>
                calculateSubTotalPurchase();
            </script>
                @endif
            </tbody>
        </table>
    </div>				
                        
</div>    