@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-primary mb-3">{{ __('Return to Category list') }}</a>

                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Category: ') . $category->title }}</h3>
                        </div>
                        <div class="card-body">

                            @include('backend.layout.alert')

                            <p>{{ __('Title: ') . $category->title }}</p>
                            <p>Slug: {{ $category->slug }}</p>
                            <p>{{ __('Active: ') . $category->active }}</p>
                            <p>{{ __('Thumbnail: ') }}</p>
                            <img class="img-thumbnail" src="{{ $category->thumbnail }}">
                            <p>Created at: {{ $category->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
