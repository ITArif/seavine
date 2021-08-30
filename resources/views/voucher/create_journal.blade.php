@extends('master')

@section('breadcrumb-title', ' Create Journal Voucher')


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
          <h3 class="card-title"> Create Journal Voucher</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('save_journal') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Project<span style="color: red;">*</span></label>
                      <select name="project_id_dr" class="form-control select2bs4">
                        <option value="">--select project name (Dr)--</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" {{ (collect(old('project_id_dr'))->contains($project->id)) ? 'selected':'' }}>{{ $project->name }}</option>

                        @endforeach
                    </select>
                    @if($errors->has('project_id'))
                        <strong class="text-danger">{{ $errors->first('project_id') }}</strong>
                    @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Voucher No (Dr)<span style="color: red;">*</span></label>
                        <input type="text" required name="voucher_no_dr" class="form-control" value="{{old('voucher_no_dr')}}" placeholder="Voucher No">
                    @if($errors->has('voucher_no_dr'))
                        <strong class="text-danger">{{ $errors->first('voucher_no_dr') }}</strong>
                    @endif
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12" id="journal_details_dr">
                        <div class="row" id="row_1">
                          <div class="col-md-5 {{$errors->has('name') ? 'has-error' : ''}}">
                            <div class="form-group">
                              <label>Account Head Name <span style="color: red;">*</span></label>
                              <select name="lname_id_dr[]" class="form-control select2bs4">
                                <option value="">--select account head (Dr)--</option>
                                @foreach ($lnames as $lname)
                                    <option value="{{ $lname->id }}" {{ (collect(old('lname_id_dr'))->contains($lname->id)) ? 'selected':'' }}>{{ $lname->name }}</option>
                                @endforeach
                            </select>
                              @if($errors->has('name'))
                                <span class="help-block text-danger">
                                  {{$errors->first('name')}}
                                </span>
                              @endif
                            </div>
                          </div>
                          <div class="col-md-4 {{$errors->has('amount') ? 'has-error' : ''}}">
                            <div class="form-group">
                                <label>Amount <span style="color: red;">*</span></label>
                                <input type="number" name="amount_dr" id="amount_dr" value="{{old('amount_dr')}}" class="form-control" placeholder="0">
                                @if($errors->has('amount'))
                                  <span class="help-block text-danger">
                                    {{$errors->first('amount')}}
                                  </span>
                                @endif
                            </div>
                          </div>
                        </div>
                        
                      </div>
                        
                  </div>
                    
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Project<span style="color: red;">*</span></label>
                      <select name="project_id_cr" class="form-control select2bs4">
                        <option value="">--select project name (Cr)--</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" {{ (collect(old('project_id_cr'))->contains($project->id)) ? 'selected':'' }}>{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('project_id'))
                        <span class="text-danger">{{ $errors->first('project_id') }}</span>
                    @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Voucher No (Cr)<span style="color: red;">*</span></label>
                        <input type="text" required name="voucher_no_cr" class="form-control" value="{{old('voucher_no_cr')}}" placeholder="Voucher No (Cr)">
                    @if($errors->has('voucher_no_cr'))
                        <span class="text-danger">{{ $errors->first('voucher_no_cr') }}</span>
                    @endif
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12" id="journal_details_cr">
                        <div class="row" id="row_1">
                          <div class="col-md-5">
                            <div class="form-group">
                              <label>Account Head Name<span style="color: red;">*</span></label>
                              <select name="lname_id_cr[]" class="form-control select2bs4">
                                <option value="">--select account head (Cr)--</option>
                                @foreach ($lnames as $lname)
                                    <option value="{{ $lname->id }}" {{ (collect(old('lname_id_cr'))->contains($lname->id)) ? 'selected':'' }}>{{ $lname->name }}</option>
                                @endforeach
                            </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                                <label>Amount<span style="color: red;">*</span></label>
                                <input type="number" name="amount_cr" id="amount_cr" value="{{old('amount_cr')}}"  class="form-control" placeholder="0" readonly>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                        
                  </div>
                    
                  </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>&nbsp;&nbsp; Journal Date<span style="color: red;">*</span></label>
                  <div class="col-md-12 col-sm-12">
                    <input type="text" class="form-control" name="journal_date" id="journal_date" placeholder="Journal Date" value="{{old('journal_date')}}">
                      @if($errors->has('journal_date'))
                        <span class="text-danger">{{ $errors->first('journal_date') }}</span>
                      @endif
                  </div>
                </div>
              </div>

              <div class="col-sm-6" hidden>
                  <div class="form-group">
                  <label>&nbsp;&nbsp; Voucher Date<span style="color: red;">*</span></label>
                    <div class="col-md-12 col-sm-12">
                      <input type="text" class="form-control" name="voucher_date" id="voucher_date" placeholder="Voucher Date" hidden>
                        @if($errors->has('voucher_date'))
                          <span class="text-danger">{{ $errors->first('voucher_date') }}</span>
                        @endif
                    </div>
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Bank Name<span style="color: red;">*</span></label>
                  <select name="bank" class="form-control select2bs4" id="bank_id">
                    <option value="">--select Bank--</option>
                    @foreach ($banks as $bank)
                        <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-6" id="show_checque_filed" style="display:none">
                <div class="form-group">
                  <label>Checque Number<span style="color: red;">*</span></label>
                  <input type="text" class="form-control" name="cheque_no" value="{{old('cheque_no')}}" id="checque_id">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                    <label>Perticulers<span style="color: red;">*</span></label>
                    <textarea name="perticulers" id="perticulers" cols="3" rows="3" class="form-control" placeholder="Perticulers"></textarea>
                    @if($errors->has('perticulers'))
                        <span class="text-danger">{{ $errors->first('perticulers') }}</span>
                    @endif
                </div>
              </div>

                   <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="#" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection

  @section('custom_js')

  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

  <script>
    //Initialize Select2 Elements
      // $('.select2bs4').select2({
      //   theme: 'bootstrap4'
      // })

      // $( "#journal_date" ).datepicker({dateFormat: 'yy-mm-dd'});
      // $( "#voucher_date" ).datepicker({dateFormat: 'yy-mm-dd'});

      $("#amount_dr").on("input", function () {
        var d = $(this).val();
        $('#amount_cr').val(d);
      });

      $(document).ready( function () {
        $("#bank_id").on("click", function () {
          var d='';
         d = $('#bank_id').val();
         //console.log(d);
         if(d != 11 && d!=''){
          document.getElementById("show_checque_filed").style.display = "block";
          console.log(d);
         }
        });
      });

      
      // $("#journal_date").on("input", function () {
      //   var d = $(this).val();
      //   $('#voucher_date').val(d);
      // });

      $(function() {
           $('.select2bs4').select2({
          theme: 'bootstrap4'
        });

           $("#journal_date").datepicker({
            dateFormat:'yy-mm-dd'
          });

            $("#voucher_date").datepicker({
            dateFormat:'yy-mm-dd'
          });
      });
     
  </script>
      
  @endsection
