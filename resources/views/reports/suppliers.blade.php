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
            </tr>
            <tr>
                <td></td>
                <td colspan="2" align='middle'>
                    <h2 style="color: blue;">Supplier List</h2>
                </td>
                <td></td>
            </tr>
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
            <tr>
                <td><h4>Company</h4></td>
                <td><h4>Supplier Name</h4></td>
                <td><h4>Phone Number</h4></td>
                <td><h4>Address</h4></td>
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
            
            @foreach($suppliers as $supplier)
            <tr>
                <td>{{$supplier->company}}<br />
                    {{$supplier->job_title}}
                </td>
                <td>{{$supplier->supplier_name}}
                </td>
                <td>Mobile: {{$supplier->mobile_phone}}<br />
                    Business: {{$supplier->business_phone}}<br />
                    Home: {{$supplier->home_phone}}<br />
                    Fax: {{$supplier->fax_number}}<br />
                </td>
                <td>{{$supplier->address}}<br />
                    {{$supplier->city}},
                    {{$supplier->state}}
                    {{$supplier->zip}}<br />
                    {{$supplier->country}}
                </td>
            </tr>
            @endforeach
            
        </table>
        
    </body>
</html>


