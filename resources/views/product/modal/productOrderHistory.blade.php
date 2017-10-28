@foreach($prodOrderHistory as $poh)
<tr class="even pointer">
    <td class="col-md-2">{{$poh->order_id}}</td>
    <td class="col-md-2">{{date('m/d/Y', strtotime($poh->created_date))}}</td>
    <td class="col-md-2">{{$poh->company}}</td>
    <td class="col-md-2">Sale</td>
    <td class="col-md-2">{{$poh->quantity}}</td>
    <td class="col-md-2">{{$poh->status}}</td>
</tr>
@endforeach