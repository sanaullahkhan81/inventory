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
    var arrProducts = <?php echo json_encode($products); ?>;
</script>

<div class="x_content">

    <div class="text-left">
        <label>Please Select Currency</label>
        <select id="selectCoCurrencyType" {{($orderInfo != null && ($orderInfo[0]->invoiced == 1))?'disabled':''}}>
            <option value="1" {{($orderInfo != null && $orderInfo[0]->currency_type == 1)?'selected':''}}>SAR</option>
            <option value="2" {{($orderInfo != null && $orderInfo[0]->currency_type == 2)?'selected':''}}>YER</option>
        </select>
        <input type="text" value=" {{($orderInfo != null)?$orderInfo[0]->currency_value:'1'}}" id="txtCoCurrencyValue" style="{{($orderInfo != null && $orderInfo[0]->currency_type == 2)?'':'display:none;'}}" {{($orderInfo != null && ($orderInfo[0]->invoiced == 1))?'disabled':''}}/>
    </div>  
    <div class=text-right>
        <a id="btn-add-product" class="btn btn-info" {{($orderInfo != null && ($orderInfo[0]->invoiced == 1))?'disabled':''}} >
           <i class="fa fa-plus" aria-hidden="true" > Add Product</i></a>
    </div>
    
    <div class="table-responsive" style="overflow-x: visible;">
                      <table class="table table-striped jambo_table">
                        <thead>
                          <tr class="headings">
                          
                            <th class="column-title"></th>
                            <th class="column-title">Product </th>
                            <th class="column-title">Quantity </th>
                            <th class="column-title">Unit Price </th>
                            <th class="column-title">Discount (%)</th>
                            <th class="column-title">Total Price </th>
                            <th class="column-title">Status </th>
                            <th class="column-title"></th>
                            </th>
                            
                          </tr>
                        </thead>

                        <tbody id="productstable">
                            @foreach($orderDetailInfo as $odi)
                                <tr class="even pointer">
                                    <td class="col-md-1">
                                        <img class="propic" src="uploads/{{(($odi->attachments != null)?$odi->attachments:'product.jpg')}}" style="with: 40px; height: 30px;" >
                                    </td>
                                    <td class="col-md-3">
                                        <select name="quanity" class="form-control drpProductNames" {{($orderInfo != null && ($orderInfo[0]->invoiced == 1))?'disabled':''}} >
                                            <option value="0">Please Select</option>
                                            @foreach($products as $pro)
                                                <option value="{{$pro->id}}" {{($pro->id==$odi->product_id)?'selected':''}}>{{$pro->product_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="col-md-2">
                                        <input  class="form-control quantity" type="number" name="quantity" min="1" max="{{$odi->quantity+$odi->available}}" value="{{$odi->quantity}}" {{($orderInfo != null && ($orderInfo[0]->invoiced == 1))?'disabled':''}} />
                                    </td>
                                    <td class="col-md-1">
                                        <input class="form-control unitprice" type="text" name="unitprice" data-unitp="{{$odi->unit_price}}" disabled value="{{$odi->unit_price*$orderInfo[0]->currency_value}}" onchange="setTwoNumberDecimal()" {{($orderInfo != null && ($orderInfo[0]->invoiced == 1))?'disabled':''}} />
                                    </td>
                                    <td class="col-md-1">
                                        <input class="form-control discount" type="text" name="discount" value="{{$odi->discount}}%" onchange="handlepersign()" {{($orderInfo != null && ($orderInfo[0]->invoiced == 1))?'disabled':''}} />
                                    </td>
                                    <td class="col-md-2">
                                        <input class="form-control totalprice" type="text" name="totalprice" disabled value="{{$odi->extended_price*$orderInfo[0]->currency_value}}" onchange="setTwoNumberDecimal()" {{($orderInfo != null && ($orderInfo[0]->invoiced == 1))?'disabled':''}} />
                                    </td>
                                    <td class="col-md-1">
                                        <a href="javascript:void(0);" class="link status" statusid="{{$odi->status_id}}" {{($orderInfo != null && ($orderInfo[0]->invoiced == 1))?'disabled':''}} >{{$odi->status}}</a>
                                    </td>
                                    <td class="col-md-1">
                                        <a href="javascript:void(0);" class="link deleteproductrow" {{($orderInfo != null && ($orderInfo[0]->invoiced == 1))?'disabled':''}} >Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                          
                        </tbody>
                      </table>
                    </div>
                    
                    
                    
                    
                    
							
						
                  </div>    

    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
    <script>
        function handlepersign() {
var myValue = document.getElementById("discount").value;

    if (myValue.indexOf("%") !== 0)
    {
        myValue = myValue +"%"  ;
    }
    
    document.getElementById("discount").value = myValue;
}


    function setTwoNumberDecimal(event) {
    this.value = parseFloat(this.value).toFixed(2);
}  

        
        $(document).ready(function(){
            
    

            
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
    

    
});


        
        </script>
        

        
<!--<script>
    $().ready(function(){
        $(".chosen-select").chosen();
        
        $(".chosen-select").width("100%");
    });
</script>-->