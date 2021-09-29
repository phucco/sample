@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @can('view types')
                    <a href="{{ route('admin.types.index') }}" class="btn btn-primary mb-3">{{ __('Return to Type list') }}</a>
                    @endcan

                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Type: ') . $type->title }}</h3>
                        </div>
                        <div class="card-body">

                            @include('backend.layout.alert')

                            <p>{{ __('Title: ') . $type->title }}</p>
                            <p>{{ __('Slug: ') . $type->slug }}</p>
                            <p>{{ __('Description: ') . $type->description }}</p>
                            <p>{{ __('Active: ') . $type->active }}</p>
                            <p>{{ __('Thumbnail: ') }}</p>
                            <img class="img-thumbnail" src="{{ $type->thumbnail }}">
                            <p>{{ __('Created at: ') . $type->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection