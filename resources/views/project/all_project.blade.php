
@extends('master')

@section('breadcrumb-title', 'All Project Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Project Information</h3>
        <a href="{{route('showAddProject')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Project</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-project" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>Name</th>
              <th>Location</th>
              <th>Facing</th>
              <th>Building Height</th>
              <th>Land Area</th>
              <th>Launching Date</th>
              <th>Hand Over Date</th>
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
//     $('#all-project').DataTable( {
//         // scrollY:        '50vh',
//         // scrollCollapse: true,
//         "responsive": true,
//       "autoWidth": false,
//     } );
// } );

$(document).ready( function () {
    $('#all-project').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{url('project/all-datatable')}}",
        columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'name', name: 'name' },
            { data: 'location', name: 'location' },
            { data: 'facing', name: 'facing' },
            { data: 'building_height', name: 'building_height' },
            { data: 'land_area', name: 'land_area' },
            { data: 'launching_date', name: 'launching_date', },
            { data: 'hand_over_date', name: 'hand_over_date' },
            { data: 'action', name: 'action' }
        ]
    });
});

//delete 
function deleteProject(id) {
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
                    var url="{{url('project/delete-project')}}";
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