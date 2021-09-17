@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
        	    <div class="col-sm-12">
                    <div class="card card-primary">
                       <div class="card-header">
                            <h3 class="card-title">{{ $siteTitle }}</h3>
                        </div>

                        <form method="post" action="">
                            <div class="card-body">

                                @include('backend.layout.alert')

                                @csrf

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
                                    <input type="hidden" name="thumbnail" id="thumbnail" value="{{ $type->thumbnail }}">
                                </div>

                                <div id="thumbnail_preview" class="form-group">
                                    <a href="{{ $type->thumbnail }}" target="_blank">
                                        <img class="img-thumbnail" src="{{ $type->thumbnail }}">
                                    </a>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
