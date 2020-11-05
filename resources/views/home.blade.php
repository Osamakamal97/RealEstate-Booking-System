@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h3>unread: {{ auth()->user()->unreadNotifications->count() }}</h3>
                    @foreach ($notifications as $notification)
                    <ul>
                        <li>{{ $notification->data['title'] }}</li>
                        <li>{{ $notification->data['content'] }}</li>
                        @if ($notification->read_at == null)
                        <form method="POST" action="{{ route('response') }}">
                            @csrf
                            @if ( $notification->data['can_response'] == 1 && $notification->read_at == null)
                            <input type="text" name="response">
                            @endif
                            <input type="hidden" name="notification_id" value="{{ $notification->id }}">
                            <input type="submit" value="رد">
                        </form>
                        @endif
                        <hr>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection