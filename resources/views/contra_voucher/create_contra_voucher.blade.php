@extends('master')

@section('breadcrumb-title', 'Create Contra Voucher Information')

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
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Create Contra Voucher Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeContraVoucher') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Voucher No</label>
                      <input  class="form-control" type="number" class="form-controll" name="voucher_no" placeholder="Voucher No">
                      @if($errors->has('voucher_no'))
                        <strong class="text-danger">{{ $errors->first('voucher_no') }}</strong>
                      @endif
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Project Name</label>
                          <select name="project_name" class="form-control select2bs4" id="single" >
                              <option value="">--select project name--</option>
                              @foreach ($projects as $project)
                                  <option value="{{ $project->id }}"> {{ $project->name }}</option>
                              @endforeach
                          </select>
                        @if($errors->has('unit'))
                            <strong class="text-danger">{{ $errors->first('unit') }}</strong>
                        @endif                      
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Bank Cash Name(Dr)</label>
                        <select name="bank_id_dr" id="" class="form-control select2bs4" >
                            <option value="">--Select Bank Cash Name(Dr)--</option>
                            @foreach ($banks as $bank)
                                <option value="{{ $bank->id }}"> {{ $bank->name }}</option>
                            @endforeach
                        </select>
                      @if($errors->has('bank_id_dr'))
                          <strong class="text-danger">{{ $errors->first('bank_id_dr') }}</strong>
                      @endif                      
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Bank Cash Name(Cr)</label>
                        <select name="bank_id_cr" id="" class="form-control select2bs4" >
                            <option value="">--Select Bank Cash Name(Cr)--</option>
                            @foreach ($banks as $bank)
                                <option value="{{ $bank->id }}"> {{ $bank->name }}</option>
                            @endforeach
                        </select>
                      @if($errors->has('bank_id_cr'))
                          <strong class="text-danger">{{ $errors->first('bank_id_cr') }}</strong>
                      @endif                      
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Check No</label>
                        <input type="text" name="check_no" class="form-control" placeholder="Check No">
                        @if($errors->has('check_no'))
                        <strong class="text-danger">{{ $errors->first('check_no') }}</strong>
                    @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" name="amount" class="form-control" placeholder="Amount">
                        @if($errors->has('amount'))
                        <strong class="text-danger">{{ $errors->first('amount') }}</strong>
                    @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label> Contra Voucher Date</label>
                        <input type="text" name="voucher_date" id="voucher_date" class="form-control" placeholder="Contra Voucher Date">
                        @if($errors->has('voucher_date'))
                        <strong class="text-danger">{{ $errors->first('voucher_date') }}</strong>
                    @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label> Perticulers</label>
                        <textarea name="perticulers" id="" cols="3" rows="3" class="form-control" placeholder="Perticulers"></textarea>
                        @if($errors->has('perticulers'))
                        <strong class="text-danger">{{ $errors->first('perticulers') }}</strong>
                    @endif
                    </div>
                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allContraVoucher') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection
  @section('custom_js')

  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> -->

  <script>
    //Initialize Select2 Elements
      // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('#single').select2();
    });

     $(function() {
           $('.select2bs4').select2({
          theme: 'bootstrap4'
        });

            $("#voucher_date").datepicker({
            dateFormat:'yy-mm-dd'
          });
      });

</script>
    
@endsection