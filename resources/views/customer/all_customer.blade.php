
@extends('master')

@section('breadcrumb-title', 'All Customer Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Customer Information</h3>
        <a href="{{route('showAddCustomer')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Customer</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-customer" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>S nO</th>
              <th>Project name</th>
              <th>Customer name</th>
              <th>Phone</th>
              <th>No of sand share</th>
              <th>Total price</th>
              <th>Payment booking</th>
              <th>Registry cost</th>
              <th>total amount</th>
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
//     $('#all-customer').DataTable( {
//         "info": true,
//           "autoWidth": false,
//           scrollX:'50vh', 
//           scrollY:'50vh',
//         scrollCollapse: true,
//     } );
// } );

$(document).ready( function () {
    $('#all-customer').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{url('customer/all-datatable')}}",
        columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'project_name', name: 'project_name' },
            { data: 'name', name: 'name' },
            { data: 'phone', name: 'phone' },
            { data: 'no_of_land_share', name: 'no_of_land_share' },
            { data: 'total_price', name: 'total_price' },
            { data: 'booking_payment', name: 'booking_payment' },
            { data: 'registration_cost', name: 'registration_cost' },
            { data: 'total_amount', name: 'total_amount' },
            { data: 'action', name: 'action' }
        ]
    });
});

//delete 
function deleteCustomer(id) {
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
                    var url="{{url('customer/delete-customer')}}";
                    $.ajax({
                        //config part
                        url:url+"/"+id,
                        type:"GET",
                        dataType:"json",
                        //config part
                        beforeSend:function () {
                            Swal.fire({
                                title: 'Deleting The Customer Data.....',
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
                                    text: 'You Have Successfully Deleted The Customer',
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

