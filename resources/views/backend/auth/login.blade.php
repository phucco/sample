<!DOCTYPE html>
<html lang="en">

@include('backend.layout.head')

<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('admin.dashboard') }}"><b>{{ __('Admin') }}</b></a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ __('Sign in to start your session') }}</p>

             @include('backend.layout.alert')

            <form method="post" action="{{ route('admin.login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email"
                           autocomplete="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password"
                           autocomplete="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">{{ __('Remember me') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Sign in') }}</button>
                    </div>
                </div>
            </form>

            <a href="{{ url('/') }}"><span class="fas fa-arrow-left"></span>{{ __(' Back to homepage') }}</a>

        </div>
    </div>
</div>

@include('backend.layout.footer')

</body>
</html>
