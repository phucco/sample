@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-light">
                       <div class="card-header">
                            <h3 class="card-title">{{ __('Edit Role: ') . $role->title }}</h3>
                        </div>

                        <form method="post" action="{{ route('admin.roles.update', $role) }}">
                            <div class="card-body">

                                @include('backend.layout.alert')

                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $role->title }}" autofocus>
                                    <small id="passwordHelpBlock" class="form-text text-muted">{{ __('Slug can not be changed.') }}</small>
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
