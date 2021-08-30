
@extends('master')

@section('breadcrumb-title', 'All Sell Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Sell Information</h3>
        <a href="{{route('showAddSales')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Sell</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-sale" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>Customer Name</th>
              <th>Project Name</th>
              <th>Product ID</th>
              <th>Employee Name</th>
              <th>Sells Date</th>
              <th>Description</th>
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
    $('#all-sale').DataTable({
        processing:true,
        serverSide:true,
        "responsive": true,
        "autoWidth": false,
        ajax:"{{url('sales/all-datatable')}}",
        columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'customer_name', name: 'customer_name' },
            { data: 'project_name', name: 'project_name' },
            { data: 'product_id', name: 'product_id' },
            { data: 'employee_name', name: 'employee_name' },
            { data: 'sells_date', name: 'sells_date' },
            { data: 'description', name: 'description'},
            { data: 'action', name: 'action' }
        ]
    });
});

//delete 
function deleteSales(id) {
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
                    var url="{{url('sales/delete-sales')}}";
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
                                    text: 'You Have Successfully Deleted The Project',
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

