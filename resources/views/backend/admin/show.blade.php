@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.admins.index') }}" class="btn btn-primary mb-3">Return to Administrator List</a>

                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Administrator: ') . $admin->name }}</h3>
                        </div>
                        <div class="card-body">

                            @include('backend.layout.alert')

                            <p>Name: {{ $admin->name }}</p>
                            <p>{{ __('Role: ') . $admin->roles->implode('title', ', ') }}</p>
                            <p>E-Mail: {{ $admin->email }}</p>
                            <p>Created at: {{ $admin->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
