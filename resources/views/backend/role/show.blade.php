@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-primary mb-3">{{ __('Return to Role list') }}</a>

                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Role: ') . $role->title }}</h3>
                        </div>
                        <div class="card-body">

                            @include('backend.layout.alert')

                            <p>Title: {{ $role->title }}</p>
                            <p>Slug: {{ $role->slug }}</p>
                            <p>{{ __('Permissions: ') . $role->permissions->implode('title', ', ') }}</p>
                            <p>Created at: {{ $role->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
