@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @can('view permissions')
                    <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary mb-3">{{ __('Return to Permission list') }}</a>
                    @endcan

                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Permission: ') . $permission->name }}</h3>
                        </div>
                        <div class="card-body">

                            @include('backend.layout.alert')

                            <p>{{ __('Title: ') . $permission->name }}</p>
                            <p>Created at: {{ $permission->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
