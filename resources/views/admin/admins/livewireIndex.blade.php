@extends('layouts.dashboard')
@section('content')
<h3 class="page-title"> المدراء والموظفين</h3>
<div class="row">
    @livewire('admin.admins')
</div>
@endsection