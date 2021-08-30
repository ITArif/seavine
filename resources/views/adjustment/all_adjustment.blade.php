
@extends('master')

@section('breadcrumb-title', 'All Adjustment Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Adjustment Information</h3>
        <a href="{{route('createAdjustment')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Adjustment</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-installment" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>Project Name</th>
              <th>Account Head Name</th>
              <th>Account Type</th>
              <th>Perticulers</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

              @foreach ($adjustments as $adjustment)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $adjustment->project_name }}</td>
                <td>{{ $adjustment->l_name }}</td>
                <td>{{ $adjustment->l_group_name }}</td>
                <td>{{ $adjustment->particulars }}</td>
                <td>
                    <div style="width: 50px; display: block;">
                        <a href="{{ route('editAdjustment',$adjustment->id) }}" class="btn btn-info btn-xs" title="Edit"><i class="far fa-edit"></i></a>
                        <a href="{{ route('deleteAdjustment',$adjustment->id) }}" class="btn btn-danger btn-xs" title="Delete"><i class="far fa-trash-alt"></i></a>
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

