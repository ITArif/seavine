@extends('master')

@section('breadcrumb-title', 'Edit Contra Voucher Information')

@section('custom_css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Edit Contra Voucher Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('updateContraVoucher',$contra->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Voucher No</label>
                      <input  class="form-control" type="number" class="form-controll" name="voucher_no" placeholder="Voucher No" value="{{ $contra->voucher_no }}">
                      @if($errors->has('voucher_no'))
                        <strong class="text-danger">{{ $errors->first('voucher_no') }}</strong>
                      @endif
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Project Name</label>
                          <select name="project_name" id="" class="form-control" >
                              <option value="">--select project name--</option>
                              @foreach ($projects as $project)
                                  <option {{ $project->id == $contra->project_id ? 'selected' : ''  }} value="{{ $project->id }}"> {{ $project->name }}</option>
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
                        <select name="bank_id_dr" id="" class="form-control" >
                            <option value="">--Select Bank Cash Name(Dr)--</option>
                            @foreach ($banks as $bank)
                                <option {{ $bank->id == $contra->bank_id_dr ? 'selected' : ''  }} value="{{ $bank->id }}"> {{ $bank->name }}</option>
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
                        <select name="bank_id_cr" id="" class="form-control" >
                            <option value="">--Select Bank Cash Name(Cr)--</option>
                            @foreach ($banks as $bank)
                                <option {{ $bank->id == $contra->bank_id_dr ? 'selected' : ''  }} value="{{ $bank->id }}"> {{ $bank->name }}</option>
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
                        <input type="text" name="check_no" class="form-control" placeholder="Check No" value="{{ $contra->check_no }}">
                        @if($errors->has('check_no'))
                        <strong class="text-danger">{{ $errors->first('check_no') }}</strong>
                    @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" name="amount" class="form-control" placeholder="Amount" value="{{ $contra->amount }}">
                        @if($errors->has('amount'))
                        <strong class="text-danger">{{ $errors->first('amount') }}</strong>
                    @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label> Contra Voucher Date</label>
                        <input type="text" name="voucher_date" id="voucher_date" class="form-control" placeholder="Contra Voucher Date" value="{{ $contra->voucher_date }}">
                        @if($errors->has('voucher_date'))
                        <strong class="text-danger">{{ $errors->first('voucher_date') }}</strong>
                    @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label> Perticulers</label>
                        <textarea name="perticulers" id="" cols="3" rows="3" class="form-control" placeholder="Perticulers"> {{ $contra->perticulers }} </textarea>
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
                 <button type="submit" class="btn btn-success ">Update</button>
                 <a href="{{ route('allContraVoucher') }}" type="submit" class="btn btn-info">Back</a>
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

    $(function () {
      $( "#voucher_date" ).datepicker({dateFormat: 'yy-mm-dd'});
    })

</script>
    
@endsection