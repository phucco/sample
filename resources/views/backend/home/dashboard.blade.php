@extends('backend.layout.master')

@section('content')
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Dashboard') }}</h3>
                        </div>
                        <div class="card-body">

                            @include('backend.layout.alert')

                            <p><?php echo $data; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
