
@extends('master')

@section('breadcrumb-title', 'Project Wise Total Amount')

@section('content')

<section class="content">

<div class="card card-success card-outline">
<div class="card-header">
<h3 class="card-title">Project Wise Total Amount</h3>
@include('message')

</div>
<!-- /.card-header -->
<div class="card-body">
    <table id="total_project_amount" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>SL</th>
                <th>Project Name</th>
                <th>Amount</th>
               <!--  <th>Action</th> -->
            </tr>
        </thead>
    </table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->

</section>
@endsection

@section('custom_js')
<script>
// $(document).ready(function() {
//     $('#all-dbvoucher').DataTable( {
//     "info": true,
//     "autoWidth": false,
//     // scrollX:'50vh',
//     scrollY:'50vh',
//     scrollCollapse: true,
//     } );
// });

$(document).ready( function () {
    $('#total_project_amount').DataTable({
    processing:true,
    serverSide:true,
    "responsive": true,
    "autoWidth": false,
    ajax:"{{url('projectwise/total/amount/datatable')}}",
    columns:[
        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
        { data: 'name', name: 'name'},
        { data: 'projectWise_amount', name: 'projectWise_amount'},
        // { data: 'action', name: 'action' }
        ]
    });
});
</script>
@endsection
