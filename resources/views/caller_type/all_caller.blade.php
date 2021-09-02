
@extends('master')

@section('breadcrumb-title', 'All Caller Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Caller Information</h3>
        <a href="{{route('caller.form')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Caller</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-caller" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>S NO</th>
              <th>Caller name</th>
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
    $('#all-caller').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{url('caller/datatable')}}",
        columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'caller', name: 'caller' },
            { data: 'action', name: 'action' }
        ]
    });
});

//delete 
function deleteCaller(id) {
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
            var url="{{url('delete/caller')}}";
            $.ajax({
                //config part
                url:url+"/"+id,
                type:"GET",
                dataType:"json",
                //config part
                beforeSend:function () {
                    Swal.fire({
                        title: 'Deleting The Caller Data.....',
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
                            text: 'You Have Successfully Deleted The Caller Data',
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

