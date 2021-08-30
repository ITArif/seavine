
@extends('master')

@section('breadcrumb-title', 'All Product Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Product Information</h3>
        <a href="{{route('showAddProduct')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Product</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-product" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>Project Name</th>
              <th>Flat Type</th>
              <th>Floor Number</th>
              <th>Flat Size</th>
              {{-- <th>Unit Price</th> --}}
              {{-- <th>Total Flat Price</th>
              <th>Car Parking Charge	</th>
              <th>Utility Charge</th>
              <th>Additional Work Charge</th>
              <th>Other Charge</th> --}}
              <th>Discount</th>
              {{-- <th>Refund Additional Work Charge</th> --}}
              <th>Net Total</th>
              {{-- <th>Description</th> --}}
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($productsInformations as $product)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->project_name }}</td>
                <td>{{ $product->flat_type }}</td>
                <td>{{ $product->floor_number }}</td>
                <td>{{ $product->flat_size }}</td>
                {{-- <td>{{ $product->unit_price }}</td> --}}
                {{-- <td>{{ $product->total_flat_price }}</td>
                <td>{{ $product->car_parking_charge }}</td>
                <td>{{ $product->utility_charge }}</td>
                <td>{{ $product->additional_work_charge }}</td>
                <td>{{ $product->other_charge }}</td> --}}
                <td>{{ $product->discount }}</td>
                {{-- <td>{{ $product->refund_additional_work_charge }}</td> --}}
                <td>{{ $product->net_total }}</td>
                {{-- <td>{{ $product->description }}</td> --}}
                <td>
                  <div style="width: 100px; display: block;">
                    <a href="{{ route('editProduct',$product->id) }}" class="btn btn-info btn-xs" title="Edit"><i class="far fa-edit"></i></a>
                    <a href="{{ route('viewDetailsProduct',$product->id) }}" class="btn btn-success btn-xs" title="View Details"><i class="far fa-eye"></i></a>
                    <a href="{{ route('deleteProduct',$product->id) }}" class="btn btn-danger btn-xs" title="Delete"><i class="far fa-trash-alt"></i></a>
                  </div>
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
    $('#all-product').DataTable( {
        // scrollY:        '50vh',
        // scrollX:        '50vh',
        scrollCollapse: true,
      // "responsive": true,
      // "autoWidth": false,
    } );
} );
</script>
@endsection
