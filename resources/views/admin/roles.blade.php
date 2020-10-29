@extends('layouts.dashboard')
@section('title', $title)
@section('content')
<h3 class="page-title">الأدوار</h3>
@livewire('admin.roles')
@endsection