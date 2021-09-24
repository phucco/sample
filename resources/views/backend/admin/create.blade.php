@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-light">
                       <div class="card-header">
                            <h3 class="card-title">{{ __('Add New Administrator') }}</h3>
                        </div>

                        <form method="post" action="{{ route('admin.admins.store') }}">
                            <div class="card-body">

                                @include('backend.layout.alert')

                                @csrf

                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="password">{{ __('Password') }}</label>
                                        <span class="text-muted">Default password: 123321</span>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="123321" required autocomplete="new-password">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="123321" required autocomplete="new-password">
                                    </div>                                    
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
