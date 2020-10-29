<div class="inbox-header inbox-view-header">
    <h1 class="pull-left">{{ $title }}</h1>
</div>
<div class="inbox-view-info">
    <div class="row">
        <div class="col-md-7">
            {{-- <img src="../../assets/admin/layout/img/avatar1_small.jpg"> --}}
            <span class="bold"> {{ $admin_name }} </span>
            <span> أرسل الشكوى في {{ $full_send_time }}</span>
        </div>
        <div class="col-md-5 inbox-info-btn">
            <div class="btn-group">
                <button data-messageid="23" class="btn blue reply-btn">
                    <i class="fa fa-reply"></i> Reply </button>
                <button class="btn blue dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="javascript:;" data-messageid="23" class="reply-btn">
                            <i class="fa fa-reply"></i> Reply </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-arrow-right reply-btn"></i> Forward </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-print"></i> Print </a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-ban"></i> Spam </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-trash-o"></i> Delete </a>
                    </li>
                    <li>
            </div>
        </div>
    </div>
</div>
<div class="inbox-view">
    <p> {{ $content }} </p>
</div>
<hr>
<div class="inbox-attached">
    <div class="margin-bottom-15">
        <span>
            3 attachments — </span>
        <a href="javascript:;">
            Download all attachments </a>
        <a href="javascript:;">
            View all images </a>
    </div>

    <div class="margin-bottom-25">
        <img src="../../assets/admin/pages/media/gallery/image5.jpg">
        <div>
            <strong>test.jpg</strong>
            <span>
                132K </span>
            <a href="javascript:;">
                View </a>
            <a href="javascript:;">
                Download </a>
        </div>
    </div>
</div>