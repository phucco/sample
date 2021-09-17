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
                                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="url">{{ __('URL') }}</label>
                                    <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}">
                                </div>

                                <div class="form-group">
                                    <label for="sort_by">{{ __('Sort by') }}</label>
                                    <input type="number" class="form-control" name="sort_by" id="sort_by" value="{{ old('sort_by') }}">
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">{{ __('Thumbnail') }}</label>
                                    <input type="file" class="form-control-file" id="file">
                                    <input type="hidden" name="thumbnail" id="thumbnail">
                                </div>

                                <div id="thumbnail_preview" class="form-group"></div>

                                <div class="form-check">
                                    <input type="checkbox" name="active" class="form-check-input" id="active" value="1" checked="">
                                    <label class="form-check-label" for="active">{{ __('Active') }}</label>
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
