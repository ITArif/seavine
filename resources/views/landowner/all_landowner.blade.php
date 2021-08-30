
@extends('master')

@section('breadcrumb-title', 'All landowner information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All landowner information</h3>
        <a href="{{route('showAddLandowner')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Landowner</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-landowner" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>File No</th>
              <th>Name</th>
              <!-- {{-- <th>Father Name</th>
              <th>Mother Name</th> -->
              <!-- <th>NID No </th> --}} -->
              <!-- <th>Mobile</th> -->
<!--               {{-- <th>Permanent Address</th>
              <th>Present Address</th> --}}
              {{-- <th>Email</th> --}}
              {{-- <th>Media Man</th>
              <th>Investigation Person</th> --}}
              <th>Mouza</th>
              {{-- <th>PS</th> --}}
              {{-- <th>District </th> --}} -->
              <th>CS Khatian</th>
              <th>RS Khatian</th>
              <th>SA Khatian</th>
              <th>CS/SA Dag</th>
              <th>RS Dag</th>
              <th>Document</th>
              <!-- {{-- <th>Total Land Of RS</th>
              <th>Purchase Of Land</th>
              <th>Remaining Balance </th>
              <th>Tp Land Price</th>
              <th>Per Bigha Price</th>
              <th>Registration Date</th> --}}
              {{-- <th>Deed Number</th> --}} -->
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($landowners as $landowner)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $landowner->file_no }}</td>
                <td>{{ $landowner->name }}</td>
                <!-- {{-- <td>{{ $landowner->father_name }}</td>
                <td>{{ $landowner->mother_name }}</td>
                <td>{{ $landowner->nid_no }}</td> --}} -->
                <!-- <td>{{ $landowner->mobile }}</td> -->
<!--                 {{-- <td>{{ $landowner->permanent_address }}</td>
                <td>{{ $landowner->present_address }}</td> --}}
                {{-- <td>{{ $landowner->email }}</td> --}}
                {{-- <td>{{ $landowner->media_man }}</td>
                <td>{{ $landowner->investigation_person }}</td> --}}
                <td>{{ $landowner->mouza }}</td>
                {{-- <td>{{ $landowner->ps }}</td> --}}
                {{-- <td>{{ $landowner->district }}</td> --}} -->
                <td>{{ $landowner->cs_khatian }}</td>
                <td>{{ $landowner->rs_khatian }}</td>
                <td>{{ $landowner->sa_khatian }}</td>
                <td>{{ $landowner->cs_sa_dag }}</td>
                <td>{{ $landowner->rs_dag }}</td>
                <td>
                 <!--  <img style="width: 100px; height: 100px" src="{{asset('/uploads/landowners/'.$landowner->upload_file) }}">
 -->
                  <a style="width: 110px; display: block;" href="{{asset('/uploads/landowners/'.$landowner->upload_file) }}">View Document</a>
                </td>
                {{-- <td>{{ $landowner->total_land_of_rs }}</td>
                <td>{{ $landowner->purchase_of_land }}</td>
                <td>{{ $landowner->remaining_balance }}</td>
                <td>{{ $landowner->tp_land_price }}</td>
                <td>{{ $landowner->per_bigha_price }}</td>
                <td>{{ $landowner->registration_date }}</td>
                <td>{{ $landowner->deed_number }}</td> --}}
                <td>
                    <div style="width: 80px; display: block;">
                      <a href="{{ route('editLandowner',$landowner->id) }}" class="btn btn-info btn-xs" title="Edit"><i class="far fa-edit"></i></a>
                      <a href="{{ route('viewLandownerDetails',$landowner->id) }}" class="btn btn-success btn-xs" title="View Details"><i class="far fa-eye"></i></a>
                      <a href="{{ route('deleteLandowner',$landowner->id) }}" class="btn btn-danger btn-xs" title="Delete"><i class="far fa-trash-alt"></i></a>
                    </div>
                  </td>
              </tr>
              @endforeach
          </tbody>
          
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection

@section('custom_js')
<script>
    $(document).ready(function() {
    $('#all-landowner').DataTable( {
        // scrollY:'50vh',
        // scrollX:'50vh',
        // scrollCollapse: true,
        // "responsive": true,
      // "autoWidth": false,
    } );
} );
// $(document).ready( function () {
//     $('#all-landowner').DataTable({
//         processing:true,
//         serverSide:true,
//         "scrollX": true,
//         ajax:"{{url('landowner/all-datatable')}}",
//         columns:[
//             { data: 'DT_RowIndex', name: 'DT_RowIndex' },
//             { data: 'file_no', name: 'file_no' },
//             { data: 'name', name: 'name' },
//             { data: 'father_name', name: 'father_name' },
//             { data: 'mother_name', name: 'mother_name' },
//             { data: 'nid_no', name: 'nid_no' },
//             { data: 'mobile', name: 'mobile', },
//             { data: 'permanent_address', name: 'permanent_address' },
//             { data: 'present_address', name: 'present_address' },
//             { data: 'email', name: 'email' },
//             { data: 'media_man', name: 'media_man' },
//             { data: 'investigation_person', name: 'investigation_person' },
//             { data: 'mouza', name: 'mouza' },
//             { data: 'ps', name: 'ps' },
//             { data: 'district', name: 'district', },
//             { data: 'cs_khatian', name: 'cs_khatian' },
//             { data: 'rs_khatian', name: 'rs_khatian' },
//             { data: 'sa_khatian', name: 'sa_khatian' },
//             { data: 'cs_sa_dag', name: 'cs_sa_dag' },
//             { data: 'rs_dag', name: 'rs_dag', },
//             { data: 'total_land_of_rs', name: 'total_land_of_rs' },
//             { data: 'purchase_of_land', name: 'purchase_of_land' },
//             { data: 'remaining_balance', name: 'remaining_balance' },
//             { data: 'tp_land_price', name: 'tp_land_price' },
//             { data: 'per_bigha_price', name: 'per_bigha_price', },
//             { data: 'registration_date', name: 'registration_date' },
//             { data: 'deed_number', name: 'deed_number' },
//             { data: 'action', name: 'action' }
//         ],
//         // columnDefs: [
//         //     { orderable: false, targets: [ 5, 7, 8 ] } //This part is ok now
//         // ]
//     });
// });
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
                    var url="{{url('landowner/delete-landowner')}}";
                    $.ajax({
                        //config part
                        url:url+"/"+id,
                        type:"GET",
                        dataType:"json",
                        //config part
                        beforeSend:function () {
                            Swal.fire({
                                title: 'Deleting The Landowner data.....',
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
                                    text: 'You Have Successfully Deleted The Landowner',
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



