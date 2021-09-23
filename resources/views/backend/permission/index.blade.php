@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary mb-3">{{ __('Add new Permission') }}</a>

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
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Slug') }}</th>
                                        <th>{{ __('Update at') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->title }}</td>
                                        <td>{{ $permission->slug }}</td>
                                        <td>{{ $permission->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('admin.permissions.destroy', $permission) }}" method="post">
                                                <a class="btn btn-primary btn-sm" href="{{ route('admin.permissions.show', $permission) }}"><i class="fas fa-eye"></i></a>                                  
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm delete-button" type="submit"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Slug') }}</th>
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
