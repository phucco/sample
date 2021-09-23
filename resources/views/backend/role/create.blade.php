@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-light">
                       <div class="card-header">
                            <h3 class="card-title">{{ __('Add new Role') }}</h3>
                        </div>

                        <form method="post" action="{{ route('admin.roles.store') }}">
                            <div class="card-body">

                                @include('backend.layout.alert')

                                @csrf

                                <div class="form-group">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" autofocus>
                                    <small id="passwordHelpBlock" class="form-text text-muted">{{ __('Slug will be auto-generated.') }}</small>
                                </div>

                                <div class="form-group">
                                    <label for="permissions">{{ __('Permissions') }}</label>
                                </div>

                                @foreach ($modules as $module)
                                <div class="form-group">
                                    <label>{{ ucfirst($module) }}</label></p>
                                    @foreach ($actions as $action)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="" name="{{ $action . '-' . $module }}" value="1">
                                        <label class="form-check-label" for="">{{ ucwords($action . ' ' . $module) }}</label>
                                    </div>
                                    @endforeach
                                </div>                                
                                @endforeach

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
