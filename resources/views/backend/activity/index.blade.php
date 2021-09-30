@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Activities') }}</h3>
                        </div>
                        <div class="card-body">

                            @include('backend.layout.alert')

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Log Name') }}</th>
                                        <th>{{ __('Administrator') }}</th>
                                        <th>{{ __('Action') }}</th>
                                        <th>{{ __('Subject') }}</th>
                                        <th>{{ __('Subject ID') }}</th>
                                        <th>{{ __('At') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($activities as $activity)
                                    <tr>
                                        <td>{{ $activity->id }}</td>
                                        <td>{{ $activity->log_name }}</td>
                                        <td>{{ $activity->name }}</td>
                                        <td>{{ $activity->description }}</td>
                                        <td>{{ $activity->subject_type }}</td>
                                        <td>{{ $activity->subject_id }}</td>
                                        <td>{{ $activity->created_at }}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Log Name') }}</th>
                                        <th>{{ __('Administrator') }}</th>
                                        <th>{{ __('Action') }}</th>
                                        <th>{{ __('Subject') }}</th>
                                        <th>{{ __('Subject ID') }}</th>
                                        <th>{{ __('At') }}</th>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="d-flex justify-content-center mt-3">
                                {!! $activities->links('pagination::bootstrap-4') !!}      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
