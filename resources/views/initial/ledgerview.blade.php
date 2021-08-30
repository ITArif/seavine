
@extends('master')

@section('breadcrumb-title', 'Initial Ledger Balance')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">Inital Ledger Balance</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-ltypes" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL</th>
              <th>Description</th>
              <th>Balance</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($initials as $initial)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $initial->description }}</td>
                <td>{{ $initial->amount }}</td>
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
    $('#all-ltypes').DataTable( {
        "info": true,
          "autoWidth": false,
          scrollX:'50vh', 
          scrollY:'50vh',
        scrollCollapse: true,
    } );
} );
</script>
@endsection

