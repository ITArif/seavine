
@extends('master')

@section('breadcrumb-title', 'Purchase Order Manage ')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">Purchase Order Manage </h3>
        <a href="{{route('showAddOrder')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Order</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-rqn-confirmed" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>R ID</th>
              <th>P ID</th>
              <th>Amount</th>
              <th>V Name</th>
              <th>M Name</th>
              <th>I Date</th>
              <th>DOD</th>
              <th>CP 1</th>
              <th>CP 2</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <div style="width: 150px; display: block;">
                    <a href="#" class="btn btn-warning" title="Edit"><i class="far fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" title="Delete"><i class="far fa-trash-alt"></i></a>
                  </div>
                </td>
            </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection

@section('custom_js')
<script>
    $(document).ready(function() {
    $('#all-rqn-confirmed').DataTable( {
        "info": true,
          "autoWidth": false,
          scrollX:'50vh', 
          scrollY:'50vh',
        scrollCollapse: true,
    } );
} );
</script>
@endsection

