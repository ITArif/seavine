
@extends('master')

@section('breadcrumb-title', 'All Installment Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Installment Information</h3>
        <a href="{{url('/installment/create')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Installment</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-installment" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>Project Name</th>
              <th>Installment Amount</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($installments as $installment)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $installment->project_name }}</td>
                <td>{{ number_format($installment->total_amount) }}</td>
                <td>
                    <div style="width: 50px; display: block;">
                        <a href="{{ route('editInstallment',$installment->id) }}" class="btn btn-info btn-xs" title="Edit"><i class="far fa-edit"></i></a>
                        <a href="{{ url('deleteInstallment',$installment->id) }}" class="btn btn-danger btn-xs" title="Delete"><i class="far fa-trash-alt"></i></a>
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
    $('#all-installment').DataTable( {
        // scrollY:        '50vh',
        // scrollX:        '50vh',
        scrollCollapse: true,
      "responsive": true,
      // "autoWidth": false,
    } );
} );
</script>
@endsection

