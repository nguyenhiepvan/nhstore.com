@extends('layouts.app')
@section('content')
<div class="container">
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="inputGroup inputGroup1">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="loginEmail" id="loginEmailLabel">Email</label>
        <input id="loginEmail" maxlength="254" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email@example.com">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="inputGroup inputGroup3">
        <button type="submit" class="btn btn-primary">
            {{ __('Send Password Reset Link') }}
        </button>
    </div>
</form>
</div>
@endsection
@section('script')
<script type="text/javascript">
    @if (session('status'))
    Swal.fire({
      position: 'middle',
      type: 'success',
      title: '{{ session('status') }}',
      showConfirmButton: false,
      timer: 1500
  })
@endif
</script>
@endsection
