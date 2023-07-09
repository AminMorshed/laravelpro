@extends('profile.layout')

@section('main')
    <h5>Two Factor Auth :</h5>
    <hr>

    @if($errors->any())
        <div class="alert-alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="#" method="post">
        @csrf

        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control">
                <option value="off">Off</option>
                <option value="sms">sms</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="Phone">phone</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Please add your phone number">
        </div>

        <div class="form-group mt-3">
            <button class="btn btn-primary">Update</button>
        </div>

    </form>
@endsection

@section('linkIndex')
    <a class="nav-link " href="{{route('profile')}}">Index</a>
@endsection

@section('linkTwoFactor')

    <a class="nav-link active" href="{{route('profile.2fa.manage')}}">TwoFactorAuth</a>

@endsection
