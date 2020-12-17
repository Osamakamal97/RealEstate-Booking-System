<div class="col-md-12">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-green">
                <i class="fa fa-home" style="color: #26a69a"></i>
                <span class="caption-subject bold uppercase"> إنشاء عقار جديد</span>
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title="">
                </a>
                <a href="" class="remove" data-original-title="" title="">
                </a>
            </div>
        </div>
        <div class="portlet-body form">
            <form role="form" wire:submit.prevent="{{ $form_method }}" enctype="multipart/form-data">
                @if ($show_page_one)
                @includeIf('livewire.realEstate.formPages.page1')
                @elseif($show_wedding_hall_page)
                @includeIf('livewire.realEstate.formPages.weddingPage')
                @elseif($show_page_two)
                @includeIf('livewire.realEstate.formPages.page2')
                @elseif($show_page_three)
                @includeIf('livewire.realEstate.formPages.page3')
                @elseif($show_page_four)
                @includeIf('livewire.realEstate.formPages.page4')
                @elseif($show_check_form_page)
                @includeIf('livewire.realEstate.formPages.checkPage')
                @endif
                <div class="form-actions noborder">
                    @if(!$show_page_one)
                    <button type="button" class="btn blue" wire:click.prevent="previousPage">السابق</button>
                    @endif
                    @if (!$show_check_form_page && $show_page_one)
                    <button type="button" class="btn blue" wire:click.prevent="nextPage"
                        style="margin-right: 77px">التالي</button>
                    @elseif(!$show_check_form_page)
                    <button type="button" class="btn blue" wire:click.prevent="nextPage">التالي</button>
                    @endif
                    @if ($show_check_form_page)
                    <button type="submit" class="btn blue">Submit</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>