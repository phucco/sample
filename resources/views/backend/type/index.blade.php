@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @can('create types')
                    <a href="{{ route('admin.types.create') }}" class="btn btn-primary mb-3">{{ __('Add new Type') }}</a>
                    @endcan

                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Types') }}</h3>
                        </div>
                        <div class="card-body">

                            @include('backend.layout.alert')

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th>{{ __('Thumbnail') }}</th>
                                        <th>{{ __('Update at') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($types as $type)
                                    <tr>
                                        <td>{{ $type->id }}</td>
                                        <td>{{ $type->title }}</td>
                                        <td>{{ $type->description }}</td>
                                        <td><img class="img-thumbnail" src="{{ $type->thumbnail }}"></td>
                                        <td>{{ $type->updated_at }}</td>
                                        <td>
                                            @can('delete types')
                                            <form action="{{ route('admin.types.destroy', $type) }}" method="post">
                                            @endcan
                                                @can('read types')
                                                <a class="btn btn-primary btn-sm" href="{{ route('admin.types.show', $type) }}"><i class="fas fa-eye"></i></a>
                                                @endcan
                                                @can('edit types')
                                                <a class="btn btn-warning btn-sm" href="{{ route('admin.types.edit', $type) }}"><i class="fas fa-edit"></i></a>
                                                @endcan
                                            @can('delete types')                                  
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
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th>{{ __('Thumbnail') }}</th>
                                        <th>{{ __('Update at') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </tfoot>
                            </table>

                            
                            <div class="d-flex justify-content-center mt-3">
                                {!! $types->links('pagination::bootstrap-4') !!}      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
