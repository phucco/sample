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
                                        <th>{{ __('URL') }}</th>
                                        <th>{{ __('Thumbnail') }}</th>
                                        <th>{{ __('Sort by') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($slides as $slide)
                                    <tr>
                                        <td>{{ $slide->id }}</td>
                                        <td>{{ $slide->title }}</td>
                                        <td>{{ $slide->url }}</td>
                                        <td><img class="img-thumbnail" src="{{ $slide->thumbnail }}"></td>
                                        <td>{{ $slide->sort_by }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ route('slides/edit', $slide->id) }}"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger btn-sm" href="#" onclick="removeRow({{ $slide->id }}, '{{ route('admin') }}/slides/destroy');"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('URL') }}</th>
                                        <th>{{ __('Thumbnail') }}</th>
                                        <th>{{ __('Sort by') }}</th>
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
