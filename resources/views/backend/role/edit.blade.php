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
                            <h3 class="card-title">{{ __('Edit Role: ') . $role->name }}</h3>
                        </div>

                        <form method="post" action="{{ route('admin.roles.update', $role) }}">
                            <div class="card-body">

                                @include('backend.layout.alert')

                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $role->name }}" autofocus>
                                    <small id="passwordHelpBlock" class="form-text text-muted">{{ __('Slug can not be changed.') }}</small>
                                </div>

                                <div class="form-group">
                                    <label for="permissions">{{ __('Permissions') }}</label>
                                    @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" value="{{ $permission->name }}" name="permissions[]" {{ ($role->hasPermissionTo($permission->name)) ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ ucwords($permission->name) }}</label>
                                    </div>
                                    @endforeach
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
