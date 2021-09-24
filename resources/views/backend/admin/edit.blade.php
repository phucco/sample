@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-light">
                       <div class="card-header">
                            <h3 class="card-title">{{ __('Update Name and E-Mail') }}</h3>
                        </div>

                        <form method="post" action="{{ route('admin.admins.update', $admin) }}">
                            <div class="card-body">

                                @include('backend.layout.alert')

                                @csrf

                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $admin->name }}" required autocomplete="name" autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $admin->email }}" required autocomplete="email">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
