@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @can('create categories')
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">{{ __('Add new Category') }}</a>
                    @endcan

                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Categories') }}</h3>
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

                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td><img class="img-thumbnail" src="{{ $category->thumbnail }}"></td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            @can('delete categories')
                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
                                            @endcan
                                                @can('read categories')
                                                <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.show', $category) }}"><i class="fas fa-eye"></i></a>
                                                @endcan
                                                @can('edit categories')
                                                <a class="btn btn-warning btn-sm" href="{{ route('admin.categories.edit', $category) }}"><i class="fas fa-edit"></i></a>
                                                @endcan
                                            @can('delete categories')                                  
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
                                {!! $categories->links('pagination::bootstrap-4') !!}      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
