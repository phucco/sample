@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @can('create permissions')
                    <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary mb-3">{{ __('Add new Permission') }}</a>
                    @endcan

                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Permissions') }}</h3>
                        </div>
                        <div class="card-body">

                            @include('backend.layout.alert')

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Update at') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->updated_at }}</td>
                                        <td>
                                            @can('view permissions')
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.permissions.show', $permission) }}"><i class="fas fa-eye"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Update at') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                                {!! $permissions->links('pagination::bootstrap-4') !!}      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
