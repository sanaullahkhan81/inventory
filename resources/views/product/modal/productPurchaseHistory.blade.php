@foreach($prodPurchaseHistory as $pph)
<tr class="even pointer">
    <td class="col-md-2">{{$pph->id}}</td>
    <td class="col-md-2">{{date('m/d/Y', strtotime($pph->created_date))}}</td>
    <td class="col-md-2">{{$pph->company}}</td>
    <td class="col-md-2">{{$pph->quantity}}</td>
    <td class="col-md-2">{{$pph->unit_cost}}</td>
    <td class="col-md-2">{{$pph->date_received != null? date('m/d/Y', strtotime($pph->date_received)) : ""}}</td>
</tr>
@endforeach