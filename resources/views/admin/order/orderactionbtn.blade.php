<?php
$view = route($route.'.show',  $id);
?>

<a style="background: transparent;" href="{{$view}}"  title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
    <i style="color: green;" class="las la-eye"></i>
</a>
