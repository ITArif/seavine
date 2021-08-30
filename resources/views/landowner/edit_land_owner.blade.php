
@extends('master')

@section('breadcrumb-title', 'Add land owner information')

@section('custom_css')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
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
        <form action="{{ route('updateLandowner',$landowner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>File No</label>
                            <input type="text" name="file_no" class="form-control" placeholder="File No" value="{{ $landowner->file_no }}">
                                @if($errors->has('file_no'))
                                    <strong class="text-danger">{{ $errors->first('file_no') }}</strong>
                                @endif                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Project Name</label>
                                <select name="project_name" class="form-control select2bs4" id="">
                                    <option value="">--select project name--</option>
                                    @foreach ($projects as $project)
                                        <option {{ $project->id ==  $landowner->project_id ? 'selected' : ''}} value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>  
                                @if($errors->has('project_name'))
                                    <strong class="text-danger">{{ $errors->first('project_name') }}</strong>
                                @endif                    
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $landowner->name }}">
                                @if($errors->has('name'))
                                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                @endif
                        </div>
                    </div>
    
    
                    <div class="col-md-4">
                    <div class="form-group">
                        <label>Father Name</label>
                        <input type="text" name="father_name" class="form-control" placeholder="Father Name" value="{{ $landowner->father_name }}">
                            @if($errors->has('father_name'))
                                <strong class="text-danger">{{ $errors->first('father_name') }}</strong>
                            @endif
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Mother Name</label>
                        <input type="text" name="mother_name" class="form-control" placeholder="Mother Name" value="{{ $landowner->mother_name }}">
                            @if($errors->has('mother_name'))
                                <strong class="text-danger">{{ $errors->first('mother_name') }}</strong>
                            @endif
                    </div>
                </div>
                </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>NID No</label>
                        <input type="number" name="nid_no" class="form-control" placeholder="NID No" value="{{ $landowner->nid_no }}">
                            @if($errors->has('nid_no'))
                                <strong class="text-danger">{{ $errors->first('nid_no') }}</strong>
                            @endif
                    </div>
                </div>
    
                    <div class="col-md-4">
                    <div class="form-group">
                        <label>Mobile No</label>
                        <input type="number" name="mobile" class="form-control" placeholder="Mobile No" value="{{ $landowner->mobile }}">
                            @if($errors->has('mobile'))
                                <strong class="text-danger">{{ $errors->first('mobile') }}</strong>
                            @endif
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ $landowner->email }}">
                            @if($errors->has('email'))
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
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
                      <label>Perment</label>
                      <textarea name="permanent_address" id="permanent_address" cols="3" rows="3" class="form-control" placeholder="Perment"> {{ $landowner->permanent_address }}</textarea>
                      @if($errors->has('perment_address'))
                          <strong class="text-danger">{{ $errors->first('permanent_address') }}</strong>
                      @endif
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label>Present</label>
                    <textarea name="present_address" id="present_address" cols="3" rows="3" class="form-control" placeholder="Present"> {{ $landowner->present_address }}</textarea>
                    @if($errors->has('present_address'))
                        <strong class="text-danger">{{ $errors->first('present_address') }}</strong>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name of Media Man</label>
                    <input type="text" class="form-control" name="media_man" placeholder="Name of Media Man" value="{{ $landowner->media_man }}">
                      @if($errors->has('media_man'))
                          <strong class="text-danger">{{ $errors->first('media_man') }}</strong>
                      @endif
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label>Name of Investigation person</label>
                  <input type="text" name="investigation_person" class="form-control" placeholder="Name of Investigation person" value="{{ $landowner->investigation_person }}">
                  @if($errors->has('investigation_person'))
                      <strong class="text-danger">{{ $errors->first('investigation_person') }}</strong>
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
                    <label>Mouza: </label>
                    <input type="text" name="mouza" class="form-control" placeholder="Mouza" value="{{ $landowner->mouza }}">
                    @if($errors->has('mouza'))
                        <strong class="text-danger">{{ $errors->first('mouza') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>P.S: </label>
                    <input type="text" name="ps" class="form-control" placeholder="P.S" value="{{ $landowner->ps }}">
                    @if($errors->has('ps'))
                        <strong class="text-danger">{{ $errors->first('ps') }}</strong>
                    @endif
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label>Dist.:</label>
                    <input type="text" name="district" class="form-control" placeholder="Dist." value="{{ $landowner->district }}">
                    @if($errors->has('district'))
                        <strong class="text-danger">{{ $errors->first('district') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>C.S. Khatian:</label>
                    <input type="number" name="cs_khatian" class="form-control" placeholder="C.S. Khatian" value="{{ $landowner->cs_khatian }}">
                    @if($errors->has('cs_khatian'))
                        <strong class="text-danger">{{ $errors->first('cs_khatian') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>S.A. Khatian:</label>
                    <input type="number" name="sa_khatian" class="form-control" placeholder="S.A. Khatian" value="{{ $landowner->sa_khatian }}">
                    @if($errors->has('sa_khatian'))
                        <strong class="text-danger">{{ $errors->first('sa_khatian') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>R.S. Khatian: </label>
                    <input type="number" name="rs_khatian" class="form-control" placeholder="R.S. Khatian" value="{{ $landowner->rs_khatian }}">
                    @if($errors->has('rs_khatian'))
                        <strong class="text-danger">{{ $errors->first('rs_khatian') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>C.S/S.A. Dag:</label>
                    <input type="number" name="cs_sa_dag" class="form-control" placeholder="C.S/S.A. Dag" value="{{ $landowner->cs_sa_dag }}">
                    @if($errors->has('cs_sa_dag'))
                        <strong class="text-danger">{{ $errors->first('cs_sa_dag') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>R.S Dag</label>
                    <input type="number" name="rs_dag" class="form-control" placeholder="R.S Dag" value="{{ $landowner->rs_dag }}">
                    @if($errors->has('rs_dag'))
                        <strong class="text-danger">{{ $errors->first('rs_dag') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Total Land of R.S:</label>
                    <input type="number" name="total_land_of_rs" id="total_land_of_rs" class="form-control" placeholder="Total Land of R.S" value="{{ $landowner->total_land_of_rs }}">
                    @if($errors->has('total_land_of_rs'))
                        <strong class="text-danger">{{ $errors->first('total_land_of_rs') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Purchase of Land:</label>
                    <input type="number" name="purchase_of_land" id="purchase_of_land" class="form-control purchase_of_land" placeholder="Purchase of Land" value="{{ $landowner->purchase_of_land }}">
                    @if($errors->has('purchase_of_land'))
                        <strong class="text-danger">{{ $errors->first('purchase_of_land') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Remaining Land: </label>
                    <input type="number" name="remaining_balance" readonly id="remaining_land" class="form-control" placeholder="Remaining Land" value="{{ $landowner->remaining_balance }}">
                    @if($errors->has('remaining_balance'))
                        <strong class="text-danger">{{ $errors->first('remaining_balance') }}</strong>
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
                    <label>Purchase of Land Price (Per Percent): </label>
                    <input type="number" name="tp_land_price_percent" id="tp_land_price_percent" class="form-control" placeholder="Total Purchase of Land Price" value="{{ $landowner->tp_land_price_percent }}">
                    @if($errors->has('tp_land_price_percent'))
                        <strong class="text-danger">{{ $errors->first('tp_land_price_percent') }}</strong>
                    @endif
                </div>
            </div>
    
            <div class="col-md-6">
                <div class="form-group">
                    <label>Total Bigha Price:</label>
                    <input type="number" name="per_bigha_price" class="form-control" placeholder="Total Bigha Price" value="{{ $landowner->per_bigha_price }}">
                    @if($errors->has('per_bigha_price'))
                        <strong class="text-danger">{{ $errors->first('per_bigha_price') }}</strong>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Purchase of Land (Total Price): </label>
                    <input type="number" name="tp_land_price" id="tp_land_price" readonly class="form-control" placeholder="Purchase of Land (Decimal)">
                    @if($errors->has('tp_land_price'))
                        <strong class="text-danger">{{ $errors->first('tp_land_price') }}</strong>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Registration Date:</label>
                    <input type="text" name="registration_date" id="registration_date" class="form-control" placeholder="Registration Date" value="{{ $landowner->registration_date }}">
                    @if($errors->has('registration_date'))
                        <strong class="text-danger">{{ $errors->first('registration_date') }}</strong>
                    @endif
                </div>
            </div>
    
            <div class="col-md-6">
                <div class="form-group">
                    <label>Deed Number: </label>
                    <input type="number" name="deed_number" class="form-control" placeholder="Deed Number" value="{{ $landowner->deed_number }}">
                    @if($errors->has('deed_number'))
                        <strong class="text-danger">{{ $errors->first('deed_number') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Upload Document</label>
                    <input type="file" name="upload_file" class="form-control">
                    {{-- <img src="" alt=""> --}}
                    @if($errors->has('upload_file'))
                        <strong class="text-danger">{{ $errors->first('upload_file') }}</strong>
                    @endif
                     <br>
                   <!--  <img style="width: 200px; height: 200px" src="{{asset('/uploads/landowners/'.$landowner->upload_file) }}"> -->
                <a style="width: 200px; display: block;" href="{{asset('/uploads/landowners/'.$landowner->upload_file) }}">View Previous Document</a>
                </div>
            </div>
        </div>
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Update</button>
                 <a href="{{ route('allLandowner') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection

  @section('custom_js')

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>

          //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      $( "#registration_date" ).datepicker({dateFormat: 'yy-mm-dd'});

      $(".purchase_of_land").on("input", function () {
          var d = $('#total_land_of_rs').val() - $(this).val();
          $('#remaining_land').val(d);
      });

      $("#tp_land_price_percent ").on("input", function () {
          var d = $('.purchase_of_land').val() * $(this).val();
          $('#tp_land_price').val(d);
      });

</script>
    
@endsection