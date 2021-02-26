@extends('layouts.dashboard')
@push('style')
<link href="{{ asset('assets/admin/pages/css/error-rtl.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<br><br><br><br><br><br>
<div class="row">
    <div class="col-md-12 page-404">
        <div class="number">
            404
        </div>
        <div class="details">
            <h3>أوبس! أنت ضائع</h3>
            <p>
                لا يمكن إيجاد الصفحة التي تبحث عنها.<br>
            </p>
        </div>
    </div>
</div>
@endsection
