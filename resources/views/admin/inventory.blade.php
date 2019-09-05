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
                <h3 class="card-title">Inventories Datatables</h3>

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
                      <th>User ID</th>
                      <th>Inventory</th>
                      <th>Category ID</th>
                      <th>Amount</th>
                      <th>Status ID</th>
                      <th>Approve</th>
                      <th>Reject</th>
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
        ajax: '{!! route('get.inventories')!!}',
        columns:[
          {data: 'id', name: 'ID'},
          {data: 'user_id', name:'User ID'},
          {data: 'inventory', name:'Inventory'},
          {data: 'category_id',name:'Category'},
          {data: 'amount', name:'Amount'},
          {data: 'status_id', name:'Status'},
          {data: 'approve', name: 'Approve', orderable: false, searchable: false},
          {data: 'reject', name: 'Reject', orderable: false, searchable: false}
        ]
      });
  } );
  </script>
@stop
