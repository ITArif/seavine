
@extends('master')

@section('breadcrumb-title', 'Add land owner information')

@section('custom_css')
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script> -->
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 --><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Add land owner information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeLandowner') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>File No<span style="color: red;">*</span></label>
                            <input type="text" name="file_no" class="form-control" placeholder="File No" value="{{ old('file_no') }}">
                                @if($errors->has('file_no'))
                                    <span class="text-danger">{{ $errors->first('file_no') }}</span>
                                @endif                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Project Name<span style="color: red;">*</span></label>
                            <select class="form-control select2bs4" style="width: 100%;height:80%!important;" data-select2-id="1" name="project_name" id="">
                                <option value="">--select project name--</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>  
                            @if($errors->has('project_name'))
                                <span class="text-danger">{{ $errors->first('project_name') }}</span>
                            @endif                    
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name<span style="color: red;">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('father_spouse') }}">
                                @if($errors->has('father_spouse'))
                                    <span class="text-danger">{{ $errors->first('father_spouse') }}</span>
                                @endif
                        </div>
                    </div>
    
    
                    <div class="col-md-4">
                    <div class="form-group">
                        <label>Father Name<span style="color: red;">*</span></label>
                        <input type="text" name="father_name" class="form-control" placeholder="Father Name" value="{{ old('father_name') }}">
                            @if($errors->has('father_name'))
                                <span class="text-danger">{{ $errors->first('father_name') }}</span>
                            @endif
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Mother Name<span style="color: red;">*</span></label>
                        <input type="text" name="mother_name" class="form-control" placeholder="Mother Name" value="{{ old('mother_name') }}">
                            @if($errors->has('mother_name'))
                                <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                            @endif
                    </div>
                </div>
                </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>NID No<span style="color: red;">*</span></label>
                        <input type="number" name="nid_no" class="form-control" placeholder="NID No" value="{{ old('nid_no') }}">
                            @if($errors->has('nid_no'))
                                <span class="text-danger">{{ $errors->first('nid_no') }}</span>
                            @endif
                    </div>
                </div>
    
                    <div class="col-md-4">
                    <div class="form-group">
                        <label>Mobile No<span style="color: red;">*</span></label>
                        <input type="number" name="mobile" class="form-control" placeholder="Mobile No" value="{{ old('mobile') }}">
                            @if($errors->has('mobile'))
                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                            @endif
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email Address<span style="color: red;">*</span></label>
                        <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                    </div>
                </div>
            </div>

            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Address:</h3>
                  </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Permenent<span style="color: red;">*</span></label>
                      <textarea name="permanent_address" id="permanent_address" cols="3" rows="3" class="form-control" placeholder="Perment"> {{ old('permanent_address') }}</textarea>
                      @if($errors->has('perment_address'))
                          <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
                      @endif
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label>Present<span style="color: red;">*</span></label>
                    <textarea name="present_address" id="present_address" cols="3" rows="3" class="form-control" placeholder="Present"> {{ old('present_address') }}</textarea>
                    @if($errors->has('present_address'))
                        <span class="text-danger">{{ $errors->first('present_address') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name of Media Man<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="media_man" placeholder="Name of Media Man" value="{{ old('media_man') }}">
                      @if($errors->has('media_man'))
                          <span class="text-danger">{{ $errors->first('media_man') }}</span>
                      @endif
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label>Name of Investigation person<span style="color: red;">*</span></label>
                  <input type="text" name="investigation_person" class="form-control" placeholder="Name of Investigation person" value="{{ old('investigation_person') }}">
                  @if($errors->has('investigation_person'))
                      <span class="text-danger">{{ $errors->first('investigation_person') }}</span>
                  @endif
              </div>
          </div>
        </div>
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Land Details:</h3>
                  </div>
            </div>

          <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Mouza: <span style="color: red;">*</span></label>
                    <input type="text" name="mouza" class="form-control" placeholder="Mouza" value="{{ old('mouza') }}">
                    @if($errors->has('mouza'))
                        <span class="text-danger">{{ $errors->first('mouza') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>P.S: <span style="color: red;">*</span></label>
                    <input type="text" name="ps" class="form-control" placeholder="P.S" value="{{ old('ps') }}">
                    @if($errors->has('ps'))
                        <span class="text-danger">{{ $errors->first('ps') }}</span>
                    @endif
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label>Dist.:<span style="color: red;">*</span></label>
                    <input type="text" name="district" class="form-control" placeholder="Dist." value="{{ old('district') }}">
                    @if($errors->has('district'))
                        <span class="text-danger">{{ $errors->first('district') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>C.S. Khatian:<span style="color: red;">*</span></label>
                    <input type="number" name="cs_khatian" class="form-control" placeholder="C.S. Khatian" value="{{ old('cs_khatian') }}">
                    @if($errors->has('cs_khatian'))
                        <span class="text-danger">{{ $errors->first('cs_khatian') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>S.A. Khatian:<span style="color: red;">*</span></label>
                    <input type="number" name="sa_khatian" class="form-control" placeholder="S.A. Khatian" value="{{ old('sa_khatian') }}">
                    @if($errors->has('sa_khatian'))
                        <span class="text-danger">{{ $errors->first('sa_khatian') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>R.S. Khatian: <span style="color: red;">*</span></label>
                    <input type="number" name="rs_khatian" class="form-control" placeholder="R.S. Khatian" value="{{ old('rs_khatian') }}">
                    @if($errors->has('rs_khatian'))
                        <span class="text-danger">{{ $errors->first('rs_khatian') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>C.S/S.A. Dag:<span style="color: red;">*</span></label>
                    <input type="number" name="cs_sa_dag" class="form-control" placeholder="C.S/S.A. Dag" value="{{ old('cs_sa_dag') }}">
                    @if($errors->has('cs_sa_dag'))
                        <span class="text-danger">{{ $errors->first('cs_sa_dag') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>R.S Dag<span style="color: red;">*</span></label>
                    <input type="number" name="rs_dag" class="form-control" placeholder="R.S Dag" value="{{ old('rs_dag') }}">
                    @if($errors->has('rs_dag'))
                        <span class="text-danger">{{ $errors->first('rs_dag') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Total Land of R.S:<span style="color: red;">*</span></label>
                    <input type="number" name="total_land_of_rs" id="total_land_of_rs" class="form-control" placeholder="Total Land of R.S" value="{{ old('total_land_of_rs') }}">
                    @if($errors->has('total_land_of_rs'))
                        <span class="text-danger">{{ $errors->first('total_land_of_rs') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Purchase of Land:<span style="color: red;">*</span></label>
                    <input type="number" name="purchase_of_land" id="purchase_of_land" class="form-control purchase_of_land" placeholder="Purchase of Land" value="{{ old('purchase_of_land') }}">
                    @if($errors->has('purchase_of_land'))
                        <span class="text-danger">{{ $errors->first('purchase_of_land') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Remaining Land: <span style="color: red;">*</span></label>
                    <input type="number" name="remaining_balance" readonly id="remaining_land" class="form-control" placeholder="Remaining Land" value="{{ old('remaining_balance') }}">
                    @if($errors->has('remaining_balance'))
                        <span class="text-danger">{{ $errors->first('remaining_balance') }}</span>
                    @endif
                </div>
            </div>
          </div>

          <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Land History:</h3>
              </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Purchase of Land Price (Per Shotok): <span style="color: red;">*</span></label>
                    <input type="number" name="tp_land_price_percent" id="tp_land_price_percent" class="form-control" placeholder="Total Purchase of Land Price" value="{{ old('tp_land_price_percent') }}">
                    @if($errors->has('tp_land_price_percent'))
                        <span class="text-danger">{{ $errors->first('tp_land_price_percent') }}</span>
                    @endif
                </div>
            </div>
    
            <div class="col-md-6">
                <div class="form-group">
                    <label>Total Bigha Price:<span style="color: red;">*</span></label>
                    <input type="number" name="per_bigha_price" class="form-control" placeholder="Total Bigha Price" value="{{ old('per_bigha_price') }}">
                    @if($errors->has('per_bigha_price'))
                        <span class="text-danger">{{ $errors->first('per_bigha_price') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Purchase of Land (Total Price): <span style="color: red;">*</span></label>
                    <input type="number" name="tp_land_price" id="tp_land_price" readonly class="form-control" placeholder="Purchase of Land (Decimal)">
                    @if($errors->has('tp_land_price'))
                        <span class="text-danger">{{ $errors->first('tp_land_price') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Registration Date:<span style="color: red;">*</span></label>
                    <input type="text" name="registration_date" id="registration_date" class="form-control registration_date" placeholder="Registration Date" value="{{ old('registration_date') }}">
                    @if($errors->has('registration_date'))
                        <span class="text-danger">{{ $errors->first('registration_date') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Deed Number: <span style="color: red;">*</span></label>
                    <input type="number" name="deed_number" class="form-control" placeholder="Deed Number ">
                    @if($errors->has('deed_number'))
                        <span class="text-danger">{{ $errors->first('deed_number') }}</span>
                    @endif
                </div>
            </div>
    
            <div class="col-md-12">
                <div class="form-group">
                    <label>Upload Document<span style="color: red;">*</span></label>
                    <input type="file" name="upload_file" class="form-control">
                    @if($errors->has('upload_file'))
                        <span class="text-danger">{{ $errors->first('upload_file') }}</span>
                    @endif
                </div>
            </div>
        </div>
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allLandowner') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection

  @section('custom_js')

 <!--  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

  <script>
      // $('.select2').select2()registration_date
      // //Initialize Select2 Elements
      // $('.select2bs4').select2({
      //   theme: 'bootstrap4'
      // });

      // $("#registration_date").datepicker();

      $(".purchase_of_land").on("input", function () {
          var d = $('#total_land_of_rs').val() - $(this).val();
          $('#remaining_land').val(d);
      });

      $("#tp_land_price_percent ").on("input", function () {
          var d = $('.purchase_of_land').val() * $(this).val();
          $('#tp_land_price').val(d);
      });


      $(function() {
           $('.select2bs4').select2({
          theme: 'bootstrap4'
        });

           $("#registration_date").datepicker({
            dateFormat:'yy-mm-dd'
          });
   });

</script>
    
@endsection