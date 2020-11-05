@extends('layouts.dashboard')
@section('title', $title)
@section('content')
<h3 class="page-title">إشعار الزبائن</h3>
@livewire('admin.notify-users')
@endsection