@extends('layouts.dashboard')
@section('title', $title)
@section('content')
<h3 class="page-title">العقارات</h3>
@livewire('admin.real-estates')
@endsection