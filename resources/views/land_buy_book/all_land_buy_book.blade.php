
@extends('master')

@section('breadcrumb-title', 'All land buy book information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All land buy book information</h3>
        <a href="{{route('showAddLandbuybook')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add land buy book</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-landbuybook" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>File No</th>
              <th>Donar Name</th>
              <th>Recipient Name</th>
              {{-- <th>Documents No</th>
              <th>Date</th>  --}}
              <th>CS Khatian</th>
              <th>RS Khatian</th>
              <th>SA Khatian</th>
              <th>SA Dag</th>
              <th>RS Dag</th>
              {{-- <th>Amount Of Land</th>
              <th>Rejection Amount</th>
              <th>Hold No</th> --}}
              <th>Action</th>
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

$(document).ready( function () {
    $('#all-landbuybook').DataTable({
        processing:true,
        serverSide:true,
        "scrollX": true,
        ajax:"{{url('landbuybook/all-datatable')}}",
        columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'file_no', name: 'file_no' },
           { data: 'donor_name', name: 'donor_name' },
            { data: 'recipient_name', name: 'recipient_name' },
            //{ data: 'documents_no', name: 'documents_no' },
           // { data: 'date', name: 'date', },
            { data: 'cs_khatian', name: 'cs_khatian' },
            { data: 'rs_khatian', name: 'rs_khatian' },
            { data: 'sa_khatian', name: 'sa_khatian' },
            { data: 'sa_dag', name: 'sa_dag' },
            { data: 'rs_dag', name: 'rs_dag', },
           // { data: 'amount_of_land', name: 'amount_of_land' },
            //{ data: 'rejection_amount', name: 'rejection_amount' },
            //{ data: 'hold_no', name: 'hold_no', },
            { data: 'action', name: 'action' }
        ]
    });
});
//delete 
function deleteLandowner(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(result) {
                if (result.value) {
                    //Delete by ajax from list-datatable
                    var url="{{url('landbuybook/delete-landbuybook')}}";
                    $.ajax({
                        //config part
                        url:url+"/"+id,
                        type:"GET",
                        dataType:"json",
                        //config part
                        beforeSend:function () {
                            Swal.fire({
                                title: 'Deleting The Land Buy Book data.....',
                                html:"<i class='fa fa-spinner fa-spin' style='font-size: 24px;'></i>",
                                confirmButtonColor: '#3085d6',
                                allowOutSideClick:false,
                                showCancelButton:false,
                                showConfirmButton:false
                            });
                        },
                        success:function (response) {
                            Swal.close();
                            if(response==="success") {
                                Swal.fire({
                                    title:'success',
                                    text: 'You Have Successfully Deleted The Land Buy Book',
                                    type:'success',
                                    confirmButtonText: 'OK'
                                }).then(function(result){
                                    if (result.value) {
                                        window.location.reload();
                                    }
                                });
                            }
                            console.log(response);
                        },
                        error:function (error) {
                            Swal.fire({
                                title: 'Error',
                                text:'Something Went Wrong',
                                type:'error',
                                showConfirmButton: true
                            });
                            console.log(error);
                        }
                    })
                }
            });
        }
</script>
@endsection



