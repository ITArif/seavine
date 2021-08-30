
@extends('master')

@section('breadcrumb-title', 'All Journal Vouchers')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Journal Vouchers</h3>
        <a href="{{ route('journalvoucher') }}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Journal Voucher</a>
        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-journal" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL</th>
              <th> From Project Name</th>
              <th> To Project Name</th>
              <th>Journal Date</th>
              <th>From Account Name</th>
              <th>To Account Name</th>
              <th>From Amount</th>
              <th>To Amount</th>
              <th>Journal Type</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($journals as $journal)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $journal->journal_type == 'DR' ? $journal->project_name: '' }}</td>
              <td>{{ $journal->journal_type == 'CR' ? $journal->project_name: '' }}</td>
              <td>{{ $journal->journal_date }}</td>
              <td>{{ $journal->journal_type == 'DR' ? $journal->ledger_name : '' }}</td>
              <td>{{ $journal->journal_type == 'CR' ? $journal->ledger_name : ''}}</td>
              <td>{{ $journal->journal_type == 'DR' ? $journal->amount : '' }}</td>
              <td>{{ $journal->journal_type == 'CR' ? $journal->amount : ''}}</td>
              <td>{{ $journal->journal_type }}</td>
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
        $('#all-journal').DataTable( {
            "info": true,
            "autoWidth": false,
            // scrollX:'50vh', 
            // scrollY:'50vh',
            scrollCollapse: true,
        } );
    });
</script>
@endsection

