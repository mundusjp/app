@extends('layouts.user')

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
        @if (session('success'))
        <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong> {{ session('success')}} </strong>
        </div><!-- alert -->
        @elseif (session('error'))
        <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong> {{ session('error')}} </strong>
        </div><!-- alert -->
        @endif
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Your Inventories</h3>

                <div class="card-tools">
                  <button class="btn btn-success" data-toggle="modal" data-target="#newinventory"> Add New </button>
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
  <!-- Modal -->
<div class="modal fade" id="newinventory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Inventory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('inventory.store')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="userid">User ID</label>
            <input type="text" class="form-control" id="iuserid" name="id" readonly value="{{Auth::guard('user')->user()->id}}">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-8">
                <label for="inventory">Inventory</label>
                <input type="text" class="form-control" id="inventory" name="inventory">
              </div>
              <div class="col-4">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="category">Select Category</label>
            <select class="form-control" id="category" name="category">
              @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->category}}</option>
              @endforeach
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Inventory</button>
      </div>
      </form>
    </div>
  </div>
</div>


  <script>
  $(document).ready( function () {
      $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get.userinventories')!!}',
        columns:[
          {data: 'id', name: 'ID'},
          {data: 'user_id', name:'User ID'},
          {data: 'inventory', name:'Inventory'},
          {data: 'category_id',name:'Category'},
          {data: 'amount', name:'Amount'},
          {data: 'status_id', name:'Status'},
        ]
      });
  } );
  </script>
@stop
