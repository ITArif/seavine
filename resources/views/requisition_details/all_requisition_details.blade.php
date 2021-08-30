
@extends('master')

@section('dashboard-title', ' All Requisition Details Information')
@section('breadcrumb-title', 'All Requisition Details Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Requisition Details Information</h3>
        <a href="{{route('showAddRequisitionDetails')}}" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i> Add Requisition Details</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-requisition-details" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th class="bg-success">SL NO</th>
              <th class="bg-success">Item Name</th>
              <th class="bg-success">Description</th>
              <th class="bg-success">Quantity</th>
              <th class="bg-success">Rate</th>
              <th class="bg-success">Amount</th>
              <th class="bg-success">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($requisitionDetails as $requisition)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $requisition->item_name }}</td>
                    <td>{{ $requisition->description }}</td>
                    <td>{{ $requisition->quantity }}</td>
                    <td>{{ $requisition->rate }}</td>
                    <td>{{ $requisition->amount }}</td>
                    <td class="row">
                        <a href="{{ route('editRequisitionDetails',$requisition->id) }}" class="btn btn-warning row"><i class="far fa-edit"></i></a>
                        <a href="{{ route('deleteRequisitionDetails',$requisition->id) }}" class="btn btn-danger ml-2"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
              @endforeach

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
    $('#all-requisition-details').DataTable( {
        "info": true,
          "autoWidth": false,
          scrollX:'50vh', 
          scrollY:'50vh',
        scrollCollapse: true,
    } );
} );
</script>
@endsection

