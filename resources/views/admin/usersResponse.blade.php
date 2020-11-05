@extends('layouts.dashboard')
@section('title', $title)
@section('content')
<h3 class="page-title">إشعارات الزبائن</h3>
@livewire('admin.users-response')
@endsection