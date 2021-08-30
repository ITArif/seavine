@extends('master')

@section('breadcrumb-title', ' Create Fund Transaction')


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
          <h3 class="card-title"> Create Fund Transaction</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="#" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>From Project Name<span style="color: red;">*</span></label>
                      <select name="project_id_dr" class="form-control">
                        <option value="">--select project name (Dr)--</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('project_id'))
                        <strong class="text-danger">{{ $errors->first('project_id') }}</strong>
                    @endif
                    </div>
                  </div>

                  <div class="col-md-6 {{$errors->has('amount') ? 'has-error' : ''}}">
                    <div class="form-group">
                        <label>Amount <span style="color: red;">*</span></label>
                        <input type="text" name="amount" id="amount" class="form-control" placeholder="0">
                        @if($errors->has('amount'))
                          <span class="help-block text-danger">
                            {{$errors->first('amount')}}
                          </span>
                        @endif
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12" id="journal_details_dr">
                        <div class="row" id="row_1">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>To Project Name<span style="color: red;">*</span></label>
                              <select name="project_id_dr" class="form-control">
                                <option value="">--select project name (Dr)--</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('project_id'))
                                <strong class="text-danger">{{ $errors->first('project_id') }}</strong>
                            @endif
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Payment Type ?<span style="color: red;">*</span></label><br>
                                <input type="radio" value="1" >&nbsp;
                                <label for="cash_in_hand">Cash In Hand</label>&nbsp;
                                <input type="radio" value="0" id="cash_in_bank">&nbsp;
                                <label for="cash_in_bank">Cash In Bank</label>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                        
                  </div>
                    
                  </div>

                  <div class="col-md-12" id="show_these_filed" style="display:none">
                    <div class="row">
                      <div class="col-md-12" id="journal_details_dr">
                        <div class="row" id="row_1">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Bank Name<span style="color: red;">*</span></label>
                              <select name="bank" class="form-control" id="bank_id">
                                <option value="">--select Bank--</option>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Checque Number<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="cheque_no" id="checque_id">
                              </div>
                            </div>
                        </div>
                        
                      </div>
                        
                  </div>
                    
                  </div>

                  

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>&nbsp;&nbsp; Transaction Date<span style="color: red;">*</span></label>
                      <div class="col-md-12 col-sm-12">
                        <input type="text" class="form-control" name="transaction_date" id="transaction_date" placeholder="transaction Date">
                          @if($errors->has('transaction_date'))
                            <strong class="text-danger">{{ $errors->first('transaction_date') }}</strong>
                          @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                        <label>Perticulers<span style="color: red;">*</span></label>
                        <textarea name="perticulers" id="perticulers" cols="3" rows="3" class="form-control" placeholder="Perticulers"></textarea>
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
                 <a href="#" type="submit" class="btn btn-info">Back</a>
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
      $( "#transaction_date" ).datepicker({dateFormat: 'yy-mm-dd'});

      // $("#amount_dr").on("input", function () {
      //   var d = $(this).val();
      //   $('#amount_cr').val(d);
      // });

      $(document).ready( function () {
        $("#cash_in_bank").on("click", function () {
         //  var d='';
         //  d = $('#cash_in_bank').val();
         // console.log(d);
         // if(d != 11 && d!=''){
           document.getElementById("show_these_filed").style.display = "block";
         //  console.log(d);
         // }
        });
      });
     
  </script>
      
  @endsection
