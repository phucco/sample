@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @can('view roles')
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-primary mb-3">{{ __('Return to Role list') }}</a>
                    @endcan

                    <div class="card card-light">
                       <div class="card-header">
                            <h3 class="card-title">{{ __('Add new Role') }}</h3>
                        </div>

                        <form method="post" action="{{ route('admin.roles.store') }}">
                            <div class="card-body">

                                @include('backend.layout.alert')

                                @csrf

                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" autofocus>
                                    <small id="passwordHelpBlock" class="form-text text-muted">{{ __('Slug will be auto-generated.') }}</small>
                                </div>

                                <div class="form-group">
                                    <label for="permissions">{{ __('Permissions') }}</label>
                                </div>

                                <div class="form-group">
                                    <label for="permissions">{{ __('Permissions') }}</label>
                                    @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" value="{{ $permission->name }}" name="permissions[]">
                                        <label class="form-check-label">{{ ucwords($permission->name) }}</label>
                                    </div>
                                    @endforeach
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
