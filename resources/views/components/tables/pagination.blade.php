<div class="col-md-5 col-sm-5">
    <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite"> يظهر
        {{ $table->firstItem()}} الى {{ $table->lastItem() }} عناصر من أصل
        {{ $table->total() }}
    </div>
</div>
<div class="col-md-7 col-sm-7">
    <div class="dataTables_paginate paging_bootstrap_full_number">
        {{ $table->links('livewire.pagination') }}
    </div>
</div>
