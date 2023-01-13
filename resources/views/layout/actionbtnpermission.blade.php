<?php
$edit = route($route.'.edit', ['id' => $id]);
?>
@if($route === 'arid')
@php $ar_id = App\Models\ARID::where('id',$id)->first(); @endphp
<a style="background: transparent;" onclick="editmodal('{{$id}}','{{route('arid.update',$id)}}','{{$ar_id->ar_id}}','{{$ar_id->number}}')"  title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
    <i style="color: green;" class="la la-edit"></i>
</a>
@else
@if($route === 'complain')
<?php $check = DB::table('complain')->where('id',$id)->value('status') ?>
@if(!($check == 3))
<a style="background: transparent;" href="{{$edit}}"  title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
    <i style="color: green;" class="la la-edit"></i>
</a>
@endif
@elseif($route === 'leave')
<?php $check = DB::table('leaves')->where('id',$id)->value('approval') ?>
@if(!($check == 2 || $check == 3 ))
<a style="background: transparent;" href="{{$edit}}"  title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
    <i style="color: green;" class="la la-edit"></i>
</a>
@endif
@elseif($route === 'expense')
<?php $check = DB::table('travel_expense_main')->where('id',$id)->value('approval') ?>
@if(!($check == 2 || $check == 3 ))
<a style="background: transparent;" href="{{$edit}}"  title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
    <i style="color: green;" class="la la-edit"></i>
</a>
@endif
@elseif($route === 'lead')
@if(!(Auth::user()->role == 3))
<a style="background: transparent;" href="{{$edit}}"  title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
    <i style="color: green;" class="la la-edit"></i>
</a>
@endif
@else
<a style="background: transparent;" href="{{$edit}}"  title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
    <i style="color: green;" class="la la-edit"></i>
</a>
@endif
@endif
@if(Auth::user()->role == 1)
<button style="background: transparent;" title="Delete" data-id="{{$id }}" class="btn btn-sm btn-clean btn-icon btn-icon-md delete-record">
    <i style="color: red;" class="la la-trash">
    </i>
</button>
@endif
@if($route === 'lead')
@if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 4 || Auth::user()->role == 7)
<a href="{{route('quot.index',$id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Quotation"><i class="fa fa-receipt" style="color:black;font-weight:bold"></i></a>
<a href="{{route('chalans.index',$id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Chalan"><i class="fa fa-check-circle" style="color:blue;font-weight:bold"></i></a>
@endif
@endif
@if($route === 'quot')
@if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 4 || Auth::user()->role == 7)
<a href="{{route('isocs.create',$id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="ISOC"><i class="fa fa-info-circle" style="color:black;font-weight:bold"></i></a>
@endif
@endif

@if($route === 'lead')
<?php
$show = route($route.'.show', ['id' => $id]);
?>

<a style="background: transparent;" href="{{$show}}"  title="Show details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
    <i style="color: green;" class="la la-eye"></i>
</a>
@endif

@if($route === 'complain')
<?php
$show = route($route.'.show', ['id' => $id]);
?>
<a style="background: transparent;" href="{{$show}}"  title="Show details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
    <i style="color: green;" class="la la-eye"></i>
</a>
@endif
@if($route === 'leave')
<?php
$show = route($route.'.show', ['id' => $id]);
?>
<a style="background: transparent;" href="{{$show}}"  title="Show details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
    <i style="color: green;" class="la la-eye"></i>
</a>
@endif
@if($route === 'expense')
<?php
$show = route($route.'.show', ['id' => $id]);
?>
<a style="background: transparent;" href="{{$show}}"  title="Show details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
    <i style="color: green;" class="la la-eye"></i>
</a>
@endif
@if($route === 'leave' || $route === 'expense' || $route === 'complain' || $route === 'quot' || $route === 'chalans' || $route === 'isocs')
@php $pdf = route($route.'.pdf'); 
if($route === 'quot')
{ 
    $name = App\Models\QuatationParent::where('id',$id)->value('to');
    $invoiceno = App\Models\QuatationParent::where('id',$id)->value('invoiceno');
    
}
else
{
    $name = '';
    $invoiceno = '';
}
@endphp
<button style="background: transparent;" title="PDF" onclick="getpdf('{{$id}}','{{$name}}','{{$invoiceno}}')" id="pdf_{{$id}}" class="btn btn-sm btn-clean btn-icon btn-icon-md pdf">
    <i style="color: #0932A2;" class="fas fa-print"></i>
</button>
@endif

<script type="text/javascript">
    function editmodal(id,url,ar_id,number)
    {
        $('#edit_modal').modal('show');
        $('#ar_id').val('');
        $('#ar_id').val(ar_id);
        $('#number').val('');
        $('#number').val(number);
        $('#edit_form').attr('action','');
        $('#edit_form').attr('action',url);
    }

    @if($route === 'leave' || $route === 'expense' || $route === 'complain' || $route === 'quot' || $route === 'chalans' || $route === 'isocs')
    function getpdf(id,name,invoiceno)
    {
        var parent = $('#pdf_'+id);           

        parent.attr('disabled',true);

        parent.html('<i class="fa fa-spinner fa-spin"></i>');

        $.ajax({
            type: "POST",
            url: "{{ $pdf }}",
            data: {
                '_token': $('input[name="_token"]').val(),
                'id': id
            },
            xhrFields: {
                responseType: 'blob'
            },
            success: function(blob) {
                parent.attr('disabled',false);

                parent.html('<i style="color: #0932A2;" class="fas fa-print"></i >');

                var link=document.createElement('a');
                link.href=window.URL.createObjectURL(blob);
                @if($route === 'quot')
                link.download= name+'_'+invoiceno+'_{{ $route }}.pdf';
                @else
                link.download= name+'{{ $route }}.pdf';
                @endif
                link.click();
            }
        });
    }
    @endif
</script>