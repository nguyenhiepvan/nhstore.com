@extends('backend.layouts.admin.app')

@section('content')
<div class="container">
    <form method="POST" id="emailForm" action="{{ route('password.email') }}">
        @csrf
        <div>
            <img src="{{ asset('favi.png') }}" class="img" style="margin-left: auto;
            margin-right: auto;
            display: block;
            max-width: 70%;">
        </div>
        <div class="form-group">
            <span class="help-block">
                <div style="margin-top: 0;
                margin-bottom: 1rem;font-size: 0.875rem;
                font-weight: normal;
                line-height: 1.5;
                color: #868ba1;">* Mật khẩu mới sẽ được gửi vào Email của bạn</div>
            </span>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="example@email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="inputGroup inputGroup3">
            <button id="login">Gửi mật khẩu</button>
        </div>
        <div class="inputGroup inputGroup5">
            <a class="btn btn-link" href="{{ route('login') }}">
                Đăng nhập
            </a>
        </div>
        <div class="copyright"> 2019 © NHstore. </div>
    </form>
</div>
@endsection
@section('scripts')
@if (session('status'))
<script type="text/javascript">
    Swal.fire({
        position: 'center',
        type: 'success',
        title: '{{ session('status') }}',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif
<script type="text/javascript">
    $(document).on('click','#login',function () {
        $('#emailForm').hide();
        $('#gif').show();
    })
</script>
@error('email')
<script type="text/javascript">
    $('#emailForm').show();
    $('#gif').hide();
</script>
@enderror
@endsection
