<!-- Modal -->

<div class="modal-dialog" style='width: 70%'>
    <input id="tokenaddcategory" type="hidden" name="token" value="{{ csrf_token() }}" />
    <input id="hiddencategoryid" type="hidden" name="token" value="{{(($categorydetail != null)?$categorydetail[0]->id:'')}}" />
    
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h2>Product Category</h2>
        </div>
        
        <div class="modal-body">
            
            <div class="">
                <form class="form-horizontal" role="form">
                    <fieldset>
                        <div id="category_detail_form" class="col-sm-12">
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Category Name</label>
                                    <div class="col-sm-12">
                                        <input id="txtCategoryName" class="form-control" type="text" value="{{(($categorydetail != null)?$categorydetail[0]->category:'')}}" >
                                    </div>
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Category Code</label>
                                    <div class="col-sm-12">
                                        <input id="txtCatCode" class="form-control" type="text" value="{{(($categorydetail != null)?$categorydetail[0]->cat_code:'')}}" >
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                    </fieldset>
                </form>
            </div>
            
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-default" onclick="saveAddEditCategory({{(($categorydetail != null)?$categorydetail[0]->id:0)}})" >Save & Close</button>
        </div>
    </div>
    
</div>


