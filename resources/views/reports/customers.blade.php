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
                    <h2 style="color: blue; margin: 0 auto;">Customer List</h2>
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
                <td><h4>Customer Name</h4></td>
                <td><h4>Company</h4></td>
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
            
            @foreach($customers as $customer)
            <tr>
                <td>{{$customer->customer_name}}
                </td>
                <td>{{$customer->company}}<br />
                    {{$customer->job_title}}
                </td>
                <td>Mobile: {{$customer->mobile_phone}}<br />
                    Business: {{$customer->business_phone}}<br />
                    Home: {{$customer->home_phone}}<br />
                    Fax: {{$customer->fax_number}}<br />
                </td>
                <td>{{$customer->address}}<br />
                    {{$customer->city}},
                    {{$customer->state}}
                    {{$customer->zip}}<br />
                    {{$customer->country}}
                </td>
            </tr>
            @endforeach
            
        </table>
        
    </body>
</html>


