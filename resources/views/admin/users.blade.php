@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inventory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Inventory</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button> -->
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>User Status</th>
                      <th>Action</th>
                      <th>Reset Password</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Footer
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
  $(document).ready( function () {
      $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get.users')!!}',
        columns:[
          {data: 'id', name: 'id'},
          {data: 'name', name:'name'},
          {data: 'email', name:'email'},
          {data: 'user_status', name:"user_status"},
          {data: 'status', name: 'status', orderable: false, searchable: false},
          {data: 'reset', name: 'reset', orderable: false, searchable: false},
          {data: 'delete', name: 'delete', orderable: false, searchable: false}
        ]
      });
      $('#myTable').on('click', 'btn-delete', function(e){
        e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).data('remote');
        // confirm then
        if (confirm('Are you sure you want to delete this?')) {
            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'json',
                data: {method: '_DELETE', submit: true}
            }).always(function (data) {
                $('#myTable').DataTable().draw(false);
            });
        }else
            alert("You have cancelled!");
      });
      $('#myTable').on('click', 'btn-activate', function(e){
        e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).data('remote');
        // confirm then
        if (confirm('Are you sure you want to activate this user?')) {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {method: '_POST', submit: true}
            }).always(function (data) {
                $('#myTable').DataTable().draw(false);
            });
        }else
            alert("You have cancelled!");
      });
      $('#myTable').on('click', 'btn-suspend', function(e){
        e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).data('remote');
        // confirm then
        if (confirm('Are you sure you want to suspend this user?')) {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {method: '_POST', submit: true}
            }).always(function (data) {
                $('#myTable').DataTable().draw(false);
            });
        }else
            alert("You have cancelled!");
      });
  } );
  </script>
@stop
