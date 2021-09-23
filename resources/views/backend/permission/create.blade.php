@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-light">
                       <div class="card-header">
                            <h3 class="card-title">{{ __('Add new Permission') }}</h3>
                        </div>

                        <form method="post" action="{{ route('admin.permissions.store') }}">
                            <div class="card-body">

                                @include('backend.layout.alert')

                                @csrf

                                {{-- <div class="form-group">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" autofocus>
                                    <small id="passwordHelpBlock" class="form-text text-muted">{{ __('Slug will be auto-generated.') }}</small>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="action">{{ __('Action') }}</label>
                                            <select class="form-control" name="action">
                                                <option value="create">Create</option>
                                                <option value="read">Read</option>
                                                <option value="update">Update</option>
                                                <option value="delete">Delete</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="module">{{ __('Module') }}</label>
                                            <select class="form-control" name="module">
                                                <option value="posts">Posts</option>
                                                <option value="categories">Categories</option>
                                                <option value="admins">Admins</option>
                                                <option value="roles">Roles</option>
                                                <option value="permissions">Permissions</option>
                                            </select>
                                        </div>
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
