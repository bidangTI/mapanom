@extends('backend.layouts.app')
@section('content')
    @if (Auth::user()->roles == 1)
        @livewire('dashboard.dashboard-admin')
    @elseif (Auth::user()->roles == 2)
        @livewire('dashboard.dashboard-verifikator')
    @elseif (Auth::user()->roles == 3)
        @livewire('dashboard.dashboard-user')
    @elseif (Auth::user()->roles == 4)
        @livewire('dashboard.dashboard-penandatangan')
    @elseif (Auth::user()->roles == 5)
        @livewire('dashboard.dashboard-report')
    @endif
@endsection
