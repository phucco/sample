@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
        	    <div class="col-sm-12">
                    <div class="card card-light">
                       <div class="card-header">
                            <h3 class="card-title">{{ __('Edit Post: ') . $post->title }}</h3>
                        </div>

                        <form method="post" action="{{ route('admin.posts.update', $post) }}">
                            <div class="card-body">

                                @include('backend.layout.alert')

                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
                                </div>

                                <div class="form-group">
                                	<label for="category_id">{{ __('Categories') }}</label>
                                	<select class="form-control" name="category_id" id="category_id">
                                		@foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                		@endforeach
                                	</select>
                                </div>

                                <div class="form-group">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea class="form-control" name="description" id="description" rows="2">{{ $post->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" name="content" id="content">{!! $post->content !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">{{ __('Thumbnail') }}</label>
                                    <input type="file" class="form-control-file" id="file">
                                    <input type="hidden" name="module" id="module" value="post">
                                    <input type="hidden" name="thumbnail" id="thumbnail" value="{{ $post->thumbnail }}">
                                </div>

                                <div id="thumbnail_preview" class="form-group">
                                    <a href="{{ $post->thumbnail }}" target="_blank">
                                        <img class="img-thumbnail" src="{{ $post->thumbnail }}">
                                    </a>
                                </div>

                                <div class="form-inline">
                                    <label class="form-check-label">Status: &nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="active" value="1" {{ $post->active == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label"> Published </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="active" value="0" {{ $post->active == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label"> Draft</label>
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

@section('footer')
    <script type="text/javascript" src="{{ asset('js/ckeditor.js') }}"></script>
    <script type="text/javascript">
        ClassicEditor
            .create(document.querySelector("#content"))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
