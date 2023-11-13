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
                            <h3 class="card-title">{{ __('Edit Type: ') . $type->title }}</h3>
                        </div>

                        <form method="post" action="{{ route('admin.types.update', $type) }}">
                            <div class="card-body">

                                @include('backend.layout.alert')

                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $type->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea class="form-control" name="description" id="description" rows="3">{{ $type->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">{{ __('Thumbnail') }}</label>
                                    <input type="file" class="form-control-file" id="file">
                                    <input type="hidden" name="module" id="module" value="type">
                                    <input type="hidden" name="thumbnail" id="thumbnail" value="{{ $type->thumbnail }}">
                                </div>

                                <div id="thumbnail_preview" class="form-group">
                                    <a href="{{ $type->thumbnail }}" target="_blank">
                                        <img class="img-thumbnail" src="{{ $type->thumbnail }}">
                                    </a>
                                </div>

                                <div class="form-inline">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="hidden" name="active" value="0">
                                        <input class="form-check-input" type="checkbox" name="active" value="1" {{ ($type->active == 1) ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ __('Active') }}</label>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
