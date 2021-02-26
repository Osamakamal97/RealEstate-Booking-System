@if ($row->status == 1)
<button wire:click.prevent="changeStatus({{ $row->id }})" class="btn btn-sm grey">
    {{ __('admin.block') }} <li class="glyphicon glyphicon-ban-circle"></li>
</button>
@else
<button wire:click.prevent="changeStatus({{ $row->id }})" class="btn btn-sm grey">
    {{ __('admin.unblock') }} <li class="glyphicon glyphicon-ok-circle"></li>
</button>
@endif
