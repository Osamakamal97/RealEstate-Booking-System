@extends('layouts.dashboard')
@section('title', $title)
@section('content')
<h3 class="page-title">مشاكل الموظفين</h3>
@livewire('admin.problems')
@endsection