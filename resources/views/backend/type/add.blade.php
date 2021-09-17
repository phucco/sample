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
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">{{ __('Thumbnail') }}</label>
                                    <input type="file" class="form-control-file" id="file">
                                    <input type="hidden" name="thumbnail" id="thumbnail">
                                </div>

                                <div id="thumbnail_preview" class="form-group"></div>

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
