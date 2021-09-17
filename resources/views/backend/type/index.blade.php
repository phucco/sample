@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $siteTitle }}</h3>
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
                                        <th>{{ __('Update') }}</th>
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
                                            <a class="btn btn-primary btn-sm" href="{{ route('types/edit', $type->slug) }}"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger btn-sm" href="#" onclick="removeRow({{ $type->id }}, '{{ route('admin') }}/types/destroy');"><i class="fas fa-trash"></i></a>
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
                                        <th>{{ __('Update') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
