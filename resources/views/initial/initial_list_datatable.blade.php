
@extends('master')

@section('breadcrumb-title', 'All Initial Balance List')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Initial Balance</h3>
        <a href="{{route('add.initial.balance')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Initial Balance</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-initial-balance" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>Project Name</th>
              <th>Cash In Hand</th>
              <th>Cash At Bank</th>
              <th>Total Initial Balance</th>
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
//     $('#all-sale').DataTable( {
//       "responsive": true,
//       "autoWidth": false,
//     } );
// } );

$(document).ready( function () {
    $('#all-initial-balance').DataTable({
        processing:true,
        serverSide:true,
        "responsive": true,
        "autoWidth": false,
        ajax:"{{url('initial/balance/datatable')}}",
        columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'project_name', name: 'project_name' },
            { data: 'totalCIH', name: 'totalCIH' },
            { data: 'totalCAB', name: 'totalCAB' },
            { data: 't_i_b', name: 't_i_b' },
            { data: 'action', name: 'action' }
        ]
    });
});

//delete 
function deleteInitialBalance(id) {
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
                    var url="{{url('delete/initials/balance')}}";
                    $.ajax({
                        //config part
                        url:url+"/"+id,
                        type:"GET",
                        dataType:"json",
                        //config part
                        beforeSend:function () {
                            Swal.fire({
                                title: 'Deleting The Initial Balance Data.....',
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
                                    text: 'You Have Successfully Deleted The Initial Balance Data',
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

