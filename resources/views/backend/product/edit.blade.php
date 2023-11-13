@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
        	    <div class="col-12">
                    @can('view products')
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary mb-3">{{ __('Return to Product list') }}</a>
                    @endcan

                    <div class="card card-light">
                       <div class="card-header">
                            <h3 class="card-title">{{ $siteTitle }}</h3>
                        </div>

                        <form method="post" action="">
                            <div class="card-body">

                                @include('backend.layout.alert')

                                @csrf

                                <div class="form-group">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $product->title }}">
                                </div>

                                <div class="form-group">
                                	<label for="type_id">{{ __('Types of products') }}</label>
                                	<select class="form-control" name="type_id" id="type_id">
                                		@foreach($types as $type)
                                        <option value="{{ $type->id }}" {{ $product->type_id == $type->id ? 'selected' : '' }}>{{ $type->title }}</option>
                                		@endforeach
                                	</select>
                                </div>

                                <div class="form-group">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea class="form-control" name="description" id="description" rows="3">{{ $product->description }}</textarea>
                                </div>

                                <div class="row">
                                	<div class="col-lg-6">
                                		<div class="form-group">
                                			<label for="price">{{ __('Price') }}</label>
                                            <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}">
                                		</div>
                                	</div>
                                	<div class="col-lg-6">
                                		<div class="form-group">
                                			<label for="price_sale">{{ __('Price sale') }}</label>
                                            <input type="number" class="form-control" name="price_sale" id="price_sale" value="{{ $product->price_sale }}">
                                		</div>
                                	</div>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">{{ __('Thumbnail') }}</label>
                                    <input type="file" class="form-control-file" id="file">
                                    <input type="hidden" name="thumbnail" id="thumbnail" value="{{ $product->thumbnail }}">
                                </div>

                                <div id="thumbnail_preview" class="form-group">
                                    <a href="{{ $product->thumbnail }}" target="_blank">
                                        <img class="img-thumbnail" src="{{ $product->thumbnail }}">
                                    </a>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" name="active" class="form-check-input" id="active" value="1" {{ $product->active == 1 ? 'checked' : '' }}>
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
