@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary mb-3">{{ __('Return to Post list') }}</a>

                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Post: ') . $post->title }}</h3>
                        </div>
                        <div class="card-body">

                            @include('backend.layout.alert')

                            <p>{{ __('Title: ') . $post->title }}</p>
                            <p>Slug: {{ $post->slug }}</p>
                            <p>{{ __('Category: ') . $post->category->title }}</p>
                            <p>{{ __('Active: ') . $post->active }}</p>
                            <p>{{ __('Thumbnail: ') }}</p>
                            <img class="img-thumbnail" src="{{ $post->thumbnail }}">
                            <p>Created at: {{ $post->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
