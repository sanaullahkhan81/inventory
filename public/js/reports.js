$(document).ready(function(){
    $('#btnCustomersList').click(function(){
        viewReportCustomersList();
    });
    
    $('#btnSuppliersList').click(function(){
        viewReportSuppliersList();
    });
    
    $('#btnActiveOrders').click(function(){
        viewReportActiveOrders();
    });
    
    
    $(document).on('change', '#drpGroupByYearly', function(){
        onSelectGroup( this, 'Yearly' );
    });
    $('#btnYearlySales').click(function(){
        viewReportYearlySalest();
    });
    
    $(document).on('change', '#drpGroupByQuarterly', function(){
        onSelectGroup( this, 'Quarterly' );
    });
    $('#btnQuarterlySales').click(function(){
        viewReportQuarterlySales();
    });
    
    $(document).on('change', '#drpGroupByMonthly', function(){
        onSelectGroup( this, 'Monthly' );
    });
    $('#btnMonthlySales').click(function(){
        viewReportMonthlySales();
    });
    
});

function openLinkInNewTab(url)
{
    var win = window.open(url, '_blank');
    if (win) {
        //Browser has allowed it to be opened
        win.focus();
    } else {
        //Browser has blocked it
        alert('Please allow popups for this website');
    }
}

function viewReportCustomersList()
{
    var url = 'reportcustomers';
    url += '?customerid=' + $('#drpCustomer').val();
    
    openLinkInNewTab(url);
}

function viewReportSuppliersList()
{
    var url = 'reportsuppliers';
    url += '?supplierid=' + $('#drpSupplier').val();
    
    openLinkInNewTab(url);
}

function viewReportActiveOrders()
{
    var url = 'reportactiveorders';
    url += '?sdate=' + $('#txtStartDate').val();
    url += '&edate=' + $('#txtEndDate').val();
    
    openLinkInNewTab(url);
}


function onSelectGroup(drp, elm)
{
    var groupId = $(drp).val();
    
    if(groupId != 0)
    {
        $.ajax({    
            
            url: "salegroupsdata",       
            data: {
                groupId : groupId ,
                
                _token : $("#tokenreportcenter").val()
            },      
            complete: function(response){
                var res = response['responseText'];
                var gData = $.parseJSON(res);
                populateGroupData(elm, groupId, gData);
            }  
        });
    }
    else 
    {
        populateGroupData(elm, groupId, '');
    }
}

function populateGroupData(elm, groupId, gData)
{
    var html = '<option value="0">Please Select</option>';
    if(groupId != 0)
    {
        for(i=0; i<gData.length; i++)
        {
            if(groupId == 1)
            {
                html += '<option value="' + gData[i]['id'] + '">' + gData[i]['category'] + '</option>';
            }
            else if(groupId == 2)
            {
                html += '<option value="' + gData[i]['ship_country'] + '">' + gData[i]['ship_country'] + '</option>';
            }
            else if(groupId == 3)
            {
                html += '<option value="' + gData[i]['id'] + '">' + gData[i]['customer_name'] + '</option>';
            }
            else if(groupId == 4)
            {
                html += '<option value="' + gData[i]['id'] + '">' + gData[i]['name'] + '</option>';
            }
            else if(groupId == 5)
            {
                html += '<option value="' + gData[i]['id'] + '">' + gData[i]['product_name'] + '</option>';
            }
        }
    }
    
    $('#drpFilter' + elm).html('');
    $('#drpFilter' + elm).html(html);
}

function viewReportYearlySalest()
{
    var year = $('#drpYearYearly').val();
    var group = $('#drpGroupByYearly').val();
    var filter = $('#drpFilterYearly').val();
    
    if(year == 0)
    {
        alert('Please select year first.');
        return;
    }
    else if(group == 0)
    {
        alert('Please select group first.');
        return;
    }
    
    var url = 'reportyearlysales';
    url += '?year=' + year;
    url += '&group=' + group;
    url += '&filter=' + filter;
    
    openLinkInNewTab(url);
}

function viewReportQuarterlySales()
{
    var year = $('#drpYearQuarterly').val();
    var quarter = $('#drpQuarter').val();
    var group = $('#drpGroupByQuarterly').val();
    var filter = $('#drpFilterQuarterly').val();
    
    if(year == 0)
    {
        alert('Please select year first.');
        return;
    }
    else if(quarter == 0)
    {
        alert('Please select quarter first.');
        return;
    }
    else if(group == 0)
    {
        alert('Please select group first.');
        return;
    }
    
    var url = 'reportquarterlysales';
    url += '?year=' + year;
    url += '&quarter=' + quarter;
    url += '&group=' + group;
    url += '&filter=' + filter;
    
    openLinkInNewTab(url);
}

function viewReportMonthlySales()
{
    var year = $('#drpYearMonthly').val();
    var month = $('#drpMonth').val();
    var group = $('#drpGroupByMonthly').val();
    var filter = $('#drpFilterMonthly').val();
    
    if(year == 0)
    {
        alert('Please select year first.');
        return;
    }
    else if(month == 0)
    {
        alert('Please select month first.');
        return;
    }
    else if(group == 0)
    {
        alert('Please select group first.');
        return;
    }
    
    
    var url = 'reportmonthlysales';
    url += '?year=' + year;
    url += '&month=' + month;
    url += '&group=' + group;
    url += '&filter=' + filter;
    
    openLinkInNewTab(url);
}
