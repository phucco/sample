@extends('backend.layout.master')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $siteTitle }}</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Active</th>
                    <th>Update</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                     {!! \App\Helpers\Helper::menu($menus) !!}

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Active</th>
                    <th>Update</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>
@endsection

@section('footer')
<script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    function removeRow(id, url)
    {
      if(confirm('Chắc chắn xóa?')) {
        $.ajax({
          type: 'DELETE',
          datatype: 'JSON',
          data: {id},
          url: url,
          success: function (result) {
            if (result.error === false) {
              alert(result.message);
              location.reload();
            } else {
              alert('Xóa lỗi vui lòng thử lại');
            }
          }
        });
      }
    }
</script>
@endsection
