@extends('layouts.dashboard')
@section('title', $title)
@section('content')
<h3 class="page-title"> المدراء والموظفين</h3>
@livewire('admin.admins')
@endsection