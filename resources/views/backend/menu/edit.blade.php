@extends('backend.layout.master')

@section('head')
<script type="text/javascript" src="{{ asset('js/ckeditor.js') }}"></script>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $siteTitle }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $siteTitle }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
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
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $menu->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="parent_id">Parent Menu</label>
                                    <select class="form-control" name="parent_id">
                    	                <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}>No Parent Menu</option>
                                        @foreach($menus as $menu1)
                                        <option value="{{ $menu1->id }}" {{ $menu->parent_id == $menu1->id ? 'selected' : '' }}>{{ $menu1->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description">{{ $menu->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" name="content" id="content" >{!! $menu->content !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <label class="form-check-label">Active</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="active" value="1" {{ $menu->active == 1 ? 'checked=""' : '' }}>
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="active" value="0" {{ $menu->active == 0 ? 'checked=""' : '' }}>
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
</div>
        </div>
    </section>
  </div>
@endsection

@section('footer')
	<script type="text/javascript">
		ClassicEditor
            .create(document.querySelector("#content"))
            .catch(error => {
                console.error(error);
            });
	</script>
@endsection
