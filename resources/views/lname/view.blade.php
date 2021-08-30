
@extends('master')

@section('breadcrumb-title', 'Ledger Names')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">Ledger Names</h3>
        <a href="{{route('ledgername.create')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Ledger</a>
        @include('message')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-ltypes" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL</th>
              <th>Name</th>
              <th>Type Name</th>
              <th>Group</th>
              <th>Unit</th>
              <!-- <th>Dr/Cr</th> -->
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
//     $(document).ready(function() {
//     $('#all-ltypes').DataTable( {
//         "info": true,
//           "autoWidth": false,
//           scrollX:'50vh', 
//           scrollY:'50vh',
//         scrollCollapse: true,
//     } );
// } );

$(document).ready( function () {
    $('#all-ltypes').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{url('ledgername/all-datatable')}}",
        columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'name', name: 'name' },
            { data: 'ltype_name', name: 'ltype_name' },
            { data: 'lgroup_name', name: 'lgroup_name' },
            { data: 'unit', name: 'unit' },
            //{ data: 'is_debit', name: 'is_debit' },
           // { data: 'is_debit == 1 ? 'Dr' : 'Cr'', name: 'is_debit == 1 ? 'Dr' : 'Cr'' },
            { data: 'action', name: 'action' }
        ]
    });
});

//delete 
function destroyladgerName(id) {
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
                    var url="{{url('ledgernames_delete')}}";
                    $.ajax({
                        //config part
                        url:url+"/"+id,
                        type:"GET",
                        dataType:"json",
                        //config part
                        beforeSend:function () {
                            Swal.fire({
                                title: 'Deleting The Project data.....',
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
                                    text: 'You Have Successfully Deleted The Ledger Name Data',
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

