@extends('profile.layout')

@section('main')
    <h4>Your Profile</h4>
@endsection

@section('linkIndex')
    <a class="nav-link active" href="{{route('profile')}}">Index</a>
@endsection

@section('linkTwoFactor')

    <a class="nav-link " href="{{route('profile.2fa.manage')}}">TwoFactorAuth</a>

@endsection
