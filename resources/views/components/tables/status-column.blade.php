@if($row->status == 1)
<span class="label label-sm label-success">{{ $row->getStatus() }}</span>
@else
<span class="label label-sm label-danger">{{ $row->getStatus() }}</span>
@endif
