
@extends('master')

@section('breadcrumb-title', 'Add land buy book information')

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
          <h3 class="card-title">Add land buy book information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeLandbuybook') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>File No<span style="color: red;">*</span></label>
                            <input type="text" name="file_no" class="form-control" value="{{old('file_no')}}" placeholder="File No">
                                @if($errors->has('file_no'))
                                    <span class="text-danger">{{ $errors->first('file_no') }}</span>
                                @endif                    
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Donar Name<span style="color: red;">*</span></label>
                            <input type="text" name="donor_name" class="form-control" value="{{old('donor_name')}}" placeholder="Donar Name">
                                @if($errors->has('donor_name'))
                                    <span class="text-danger">{{ $errors->first('donor_name') }}</span>
                                @endif
                        </div>
                    </div>
    
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Recipient Name<span style="color: red;">*</span></label>
                            <input type="text" name="recipient_name" class="form-control" value="{{old('recipient_name')}}" placeholder="Recipient Name">
                                @if($errors->has('recipient_name'))
                                    <span class="text-danger">{{ $errors->first('recipient_name') }}</span>
                                @endif
                        </div>
                </div>
            </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Documents No<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="documents_no" value="{{old('documents_no')}}" placeholder="Documents No">
                      @if($errors->has('documents_no'))
                          <span class="text-danger">{{ $errors->first('documents_no') }}</span>
                      @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Date<span style="color: red;">*</span></label>
                    <input class="form-control" type="text" name="date" value="{{old('date')}}" id="date" placeholder="Date">
                    @if($errors->has('date'))
                        <span class="text-danger">{{ $errors->first('date') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Khatian No Details:</h3>
                </div>
        </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>C.S. khatian: <span style="color: red;">*</span></label>
                        <input type="text" name="cs_khatian" class="form-control" value="{{old('cs_khatian')}}" placeholder="C.S. khatian">
                        @if($errors->has('cs_khatian'))
                            <span class="text-danger">{{ $errors->first('cs_khatian') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>R.S. khatian:<span style="color: red;">*</span></label>
                        <input type="text" name="rs_khatian" class="form-control" value="{{old('rs_khatian')}}" placeholder="R.S. Khatian">
                        @if($errors->has('rs_khatian'))
                            <span class="text-danger">{{ $errors->first('rs_khatian') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>S.A. Khatian:<span style="color: red;">*</span></label>
                        <input type="text" name="sa_khatian" class="form-control" value="{{old('sa_khatian')}}" placeholder="S.A. Khatian">
                        @if($errors->has('sa_khatian'))
                            <span class="text-danger">{{ $errors->first('sa_khatian') }}</span>
                        @endif
                    </div>
                </div>
            </div>

                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Dag No Details:</h3>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>S.A. Dag:<span style="color: red;">*</span></label>
                        <input type="text" name="sa_dag" class="form-control" value="{{old('sa_dag')}}" placeholder="S.A. Dag">
                        @if($errors->has('sa_dag'))
                            <span class="text-danger">{{ $errors->first('sa_dag') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>R.S Dag<span style="color: red;">*</span></label>
                        <input type="text" name="rs_dag" class="form-control" value="{{old('rs_dag')}}" placeholder="R.S Dag">
                        @if($errors->has('rs_dag'))
                            <span class="text-danger">{{ $errors->first('rs_dag') }}</span>
                        @endif
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Land Amount(Percent):<span style="color: red;">*</span></label>
                    <input type="text" name="amount_of_land" id="amount_of_land" value="{{old('amount_of_land')}}" class="form-control" placeholder="Land Amount(Percent)">
                    @if($errors->has('amount_of_land'))
                        <span class="text-danger">{{ $errors->first('amount_of_land') }}</span>
                    @endif
                </div>
           </div>
    
            <div class="col-md-6">
                <div class="form-group">
                    <label>Rejection Amount Name(Percent): <span style="color: red;">*</span></label>
                    <input type="text" name="rejection_amount" class="form-control" value="{{old('rejection_amount')}}" placeholder="Rejection Amount Name(Percent)">
                    @if($errors->has('rejection_amount'))
                        <span class="text-danger">{{ $errors->first('rejection_amount') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Hold No: <span style="color: red;">*</span></label>
                    <input type="text" name="hold_no" class="form-control" value="{{old('hold_no')}}" placeholder="Hold No">
                    @if($errors->has('hold_no'))
                        <span class="text-danger">{{ $errors->first('hold_no') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success ">Submit</button>
        <a href="{{ route('allLandbuybook') }}" type="submit" class="btn btn-info">Back</a>
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

      //$( "#date" ).datepicker({dateFormat: 'yy-mm-dd'});

      $(function() {
           $('.select2bs4').select2({
          theme: 'bootstrap4'
        });

           $("#date").datepicker({
            dateFormat:'yy-mm-dd'
          });
      });
</script>
    
@endsection