@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @can('create admins')
                    <a href="{{ route('admin.admins.create') }}" class="btn btn-primary mb-3">{{ __('Add new Administrator') }}</a>
                    @endcan

                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Administrators') }}</h3>
                        </div>
                        <div class="card-body">

                            @include('backend.layout.alert')

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-1">{{ __('ID') }}</th>
                                        <th class="col-3">{{ __('Name') }}</th>
                                        <th class="col-3">{{ __('Email') }}</th>
                                        <th class="col-3">{{ __('Roles') }}</th>
                                        <th class="col-2">{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->id }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->getRoleNames() }}</td>
                                        <td>
                                            @can('delete admins')
                                            <form action="{{ route('admin.admins.destroy', $admin) }}" method="post">
                                            @endcan
                                                @can('read admins')
                                                <a class="btn btn-primary btn-sm" href="{{ route('admin.admins.show', $admin) }}"><i class="fas fa-eye"></i></a>
                                                @endcan
                                                @can('edit admins')
                                                <a class="btn btn-warning btn-sm" href="{{ route('admin.admins.edit', $admin) }}"><i class="fas fa-edit"></i></a>
                                                @endcan
                                            @can('delete admins')
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm delete-button" type="submit"><i class="fas fa-trash"></i></button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Roles') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="d-flex justify-content-center mt-3">
                                {!! $admins->links('pagination::bootstrap-4') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
