
@extends('master')

@section('breadcrumb-title', 'All Vendor Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Vendor Information</h3>
        <a href="{{route('showAddVendor')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Vendor</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-vendor" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>Name</th>
              <th>Company Name</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Website</th>
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
//     $('#all-vendor').DataTable( {
//         "info": true,
//           "autoWidth": false,
//           scrollX:'50vh', 
//           scrollY:'50vh',
//         scrollCollapse: true,
//     } );
// } );

$(document).ready( function () {
    $('#all-vendor').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{url('vendor/all-datatable')}}",
        columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'name', name: 'name' },
            { data: 'company_name', name: 'company_name' },
            { data: 'address', name: 'address' },
            { data: 'phone', name: 'phone' },
            { data: 'email', name: 'email' },
            { data: 'website', name: 'website', },
            { data: 'description', name: 'description' },
            { data: 'action', name: 'action' }
        ]
    });
});

//delete 
function deleteVendor(id) {
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
                    var url="{{url('vendor/delete-vendor')}}";
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
                                    text: 'You Have Successfully Deleted The Vendor',
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

