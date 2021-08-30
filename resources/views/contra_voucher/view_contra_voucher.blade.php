
@extends('master')

@section('breadcrumb-title', 'All Contra Voucher Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Contra Voucher Information</h3>
        <a href="{{route('createContraVoucher')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Contra</a>
            <br>
        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-contra-voucher" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>Voucher No</th>
              <th>Perticulers</th>
              <th>Project Name</th>
              <th>Made Of Payment</th>
              <th>CHQ. No</th>
              <th>Date</th>
              <th>Dr(৳)</th>
              <th>Cr(৳)</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($contra_vouchers as $contra_voucher)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $contra_voucher->voucher_no }}</td>
                <td>{{ $contra_voucher->project_name }}</td>
                <td>{{ $contra_voucher->perticulers }}</td>
                <td>{{ $contra_voucher->bank_name }}</td>
                <td>{{ $contra_voucher->check_no }}</td>
                <td> {{ date('j F, Y', strtotime($contra_voucher->voucher_date,3)) }}</td>
                <td>{{ number_format($contra_voucher->amount_type == 'DR' ? $contra_voucher->amount : 0 ) }}</td>
                <td>{{ number_format($contra_voucher->amount_type == 'CR' ? $contra_voucher->amount : 0) }}</td>
                <td>
                    <div style="width: 100px; display: block;">
                        <a href="{{ route('editContraVoucher',$contra_voucher->id) }}" class="btn btn-info btn-xs" title="Edit"><i class="far fa-edit"></i></a>
                        <a href="{{ route('deleteContraVoucher',$contra_voucher->id) }}" class="btn btn-danger btn-xs" title="Delete"><i class="far fa-trash-alt"></i></a>
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

$(document).ready( function () {
    $('#all-contra-voucher').DataTable({

    });
});

</script>
@endsection

