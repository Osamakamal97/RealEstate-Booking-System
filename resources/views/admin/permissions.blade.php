@extends('layouts.dashboard')
@section('title', $title)
@section('content')
<h3 class="page-title">صلاحيات المدراء والموظفين</h3>
@livewire('admin.permissions')
@endsection