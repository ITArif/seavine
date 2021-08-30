
@extends('master')

@section('breadcrumb-title', 'All Employee Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Employee Information</h3>
        <a href="{{route('showAddEmployee')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Employee</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-employee" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th style="text-align: center;width: 5px;">SL NO</th>
              <th style="text-align: center;width: 10px;">Name</th>
              <th style="text-align: center;width: 10px;">Position</th>
              <th style="text-align: center;width: 15px;">Address</th>
              <th style="text-align: center;width: 10px;">Phone</th>
              <th style="text-align: center;width: 10px;">Email</th>
              <th style="text-align: center;width: 10px;">NID</th>
              <th style="text-align: center;width: 15px;">Department</th>
              <th style="text-align: center;width: 15px;">Action</th>
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
//     $('#all-employee').DataTable( {
//         "info": true,
//           "autoWidth": false,
//           scrollX:'50vh', 
//           scrollY:'50vh',
//         scrollCollapse: true,
//     } );
// } );

$(document).ready( function () {
    $('#all-employee').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{url('employee/all-datatable')}}",
        columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'name', name: 'name' },
            { data: 'position', name: 'position' },
            { data: 'address', name: 'address' },
            { data: 'phone', name: 'phone' },
            { data: 'email', name: 'email' },
            { data: 'nid', name: 'nid', },
            { data: 'department', name: 'department' },
            { data: 'action', name: 'action' }
        ]
    });
});

//delete 
function deleteEmployee(id) {
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
                    var url="{{url('employee/delete-employee')}}";
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
                                    text: 'You Have Successfully Deleted The Employee',
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

