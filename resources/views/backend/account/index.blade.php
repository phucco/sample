@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('My account') }}</h3>
                        </div>
                        <div class="card-body">

                            @include('backend.layout.alert')

                            <p>{{ __('Name: ') . $admin->name }}</p>
                            <p>{{ __('Email: ') . $admin->email }}</p>
                            <p>{{ __('ID: ') . $admin->id }}</p>
                            <p>{{ __('Roles: ') . $admin->getRoleNames() }}</p>
                            <p>{{ __('Permissions: ') . $admin->getAllPermissions()->pluck('name') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
