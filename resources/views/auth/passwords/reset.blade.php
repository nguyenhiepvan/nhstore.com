@extends('layouts.admin.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="inputGroup inputGroup1">
            <label for="email" id="EmailLabel">Email</label>
            <input id="email" type="email" @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="inputGroup inputGroup2">
            <label for="password" id="passwordLabel">Mật khẩu</label>
            <input id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="inputGroup inputGroup2">
            <label for="password-confirm" id="password-confirmLabel">Nhập lại mật khẩu</label>
            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="inputGroup inputGroup3">
         <button type="submit" class="btn btn-primary">
            {{ __('Reset Password') }}
        </button>
    </div>
</form>
</div>
@endsection
