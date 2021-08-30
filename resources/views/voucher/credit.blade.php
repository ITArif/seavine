

@extends('master')

@section('breadcrumb-title', ' Create Cr Voucher')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script> -->
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 --><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@section('content')
<input type="text" id="page" value="voucher_create" hidden></input>

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title"> Create Cr Voucher</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('save_credit') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Project<span style="color: red;">*</span></label>
                      <select name="project_id" class="form-control select2bs4" id="pId">
                        <option value="">--select project--</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('project_id'))
                        <span class="text-danger">{{ $errors->first('project_id') }}</span>
                    @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Bank/Cash<span style="color: red;">*</span></label>
                      <select name="bank_id" class="form-control select2bs4">
                        <option value="">--select bank--</option>
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('bank_id'))
                        <span class="text-danger">{{ $errors->first('bank_id') }}</span>
                    @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Cheque No<span style="color: red;">*</span></label>
                        <input type="text" name="cheque_no" class="form-control" value="{{old('cheque_no')}}" placeholder="Cheque No">
                        @if($errors->has('cheque_no'))
                            <span class="text-danger">{{ $errors->first('cheque_no') }}</span>
                        @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Voucher Date<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" name="voucher_date" value="{{old('voucher_date')}}" id="voucher_date">
                        @if($errors->has('voucher_date'))
                          <span class="text-danger">{{ $errors->first('voucher_date') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Voucher No<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="voucher_no" value="{{old('voucher_no')}}" id="voucher_no">
                        @if($errors->has('voucher_no'))
                          <span class="text-danger">{{ $errors->first('voucher_no') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Perticulers<span style="color: red;">*</span></label>
                      <textarea name="perticulers" id="perticulers" cols="3" rows="3" class="form-control" placeholder="Perticulers"></textarea>
                      @if($errors->has('perticulars'))
                          <span class="text-danger">{{ $errors->first('perticulars') }}</span>
                      @endif
                  </div>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12" id="voucher_details">
                      <div class="row" id="row_1">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>Account Head Name<span style="color: red;">*</span></label>
                            <select name="lname_id[]" class="form-control select2bs4">
                              <option value="">--select account head--</option>
                              @foreach ($lnames as $lname)
                                  <option value="{{ $lname->id }}">{{ $lname->name }}</option>
                              @endforeach
                          </select>
                      @if($errors->has('lname_id'))
                          <span class="text-danger">{{ $errors->first('lname_id') }}</span>
                      @endif
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label>Amount<span style="color: red;">*</span></label>
                              <input type="text" name="amount[]" class="form-control" placeholder="0">
                      @if($errors->has('amount'))
                          <span class="text-danger">{{ $errors->first('amount') }}</span>
                      @endif
                          </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group pt-4">
                                <span style="font-size: 1.2em; color: Tomato;" id="addButton"> 
                                  <i class="far fa-plus-square fa-lg pt-3"></i>
                                </span>
                            </div>
                        </div>
                      </div>
                      
                    </div>
                      
                </div>
                  
                </div>
                   <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ url('voucher/credit/all') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection

  @section('custom_js')

  <script>
    //Initialize Select2 Elements
      // $('.bootstrap4').select2({
      //   theme: 'bootstrap4'
      // })
      
      $(document).ready(function() {
        var i=1;

        console.log('here you go');

        $("#addButton").click(function (e) {
          e.preventDefault();
          i++;

          _dynamic_div = `<div class="row" id="row_`+i+`">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>Account Head Name</label>
                            <select name="lname_id[]" class="form-control">
                              <option value="">--select account head--</option>
                              @foreach ($lnames as $lname)
                                  <option value="{{ $lname->id }}">{{ $lname->name }}</option>
                              @endforeach
                          </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label>Amount</label>
                              <input type="text" name="amount[]" class="form-control" placeholder="0">
                          </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group pt-4">
                                <span style="font-size: 1.2em; color: red;" class="btn_remove" id="`+i+`"> 
                                  <i class="far fa-trash-alt pt-3"></i>
                                </span>
                            </div>
                        </div>
                      </div>`;
          //console.log(_dynamic_div);
          $('#voucher_details').append(_dynamic_div)
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            //console.log(button_id);   
            $('#row_'+button_id+'').remove();  
      });
      });

      $(function() {
           $('.select2bs4').select2({
          theme: 'bootstrap4'
        });

          //  $("#requisition_date").datepicker({
          //   dateFormat:'yy-mm-dd'
          // });
      });
  </script>
      
  @endsection