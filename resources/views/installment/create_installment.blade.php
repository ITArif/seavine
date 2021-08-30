@extends('master')

@section('breadcrumb-title', 'Create Installment Information')

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
          <h3 class="card-title">Create Installment Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ url('/installment/store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label> Project<span style="color: red;">*</span></label>
                    <select name="project_name" class="form-control select2bs4" id="project_name">
                        <option value="">--select project name--</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id}}">{{ $project->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('project_name'))
                    <span class="text-danger">{{ $errors->first('project_name') }}</span>
                    @endif
                </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label>Land Owner Name<span style="color: red;">*</span></label>
                    <select name="land_owner_name" id="owner_name" class="form-control select2bs4">

                    </select>
                        {{-- <input type="text" name="land_owner_name" id="owner_name" disabled class="form-control" placeholder="Land Owner Name"> --}}
                    @if($errors->has('land_owner_name'))
                    <span class="text-danger">{{ $errors->first('land_owner_name') }}</span>
                    @endif
                    </div>
                </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label> Bank/Cash<span style="color: red;">*</span></label>
                      <select name="bank_id" id="" class="form-control select2bs4">
                        <option value="">--select</option>
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('amount_type'))
                        <span class="text-danger">{{ $errors->first('amount_type') }}</span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Installment Amount<span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="installment_amount" id="installment_amount" value="{{old('installment_amount')}}" placeholder="0">
                        @if($errors->has('installment_amount'))
                            <span class="text-danger">{{ $errors->first('installment_amount') }}</span>
                        @endif                      
                    </div>
                </div>
                <!-- /.col -->
                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label>Combined Amount<span style="color: red;">*</span></label>
                        <input type="text" name="combined_amount" id="" class="form-control" placeholder="0">
                        @if($errors->has('combined_amount'))
                            <span class="text-danger">{{ $errors->first('combined_amount') }}</span>
                        @endif                      
                    </div>
                </div> --}}

                    {{-- <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Due Amount<span style="color: red;">*</span></label>
                        <input type="text" name="due_amount" id="" class="form-control" placeholder="0">
                      @if($errors->has('due_amount'))
                          <span class="text-danger">{{ $errors->first('due_amount') }}</span>
                      @endif                      
                    </div>
                </div> --}}

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Installment Date<span style="color: red;">*</span></label>
                        <input type="text" name="installment_date" id="installment_date" value="{{old('installment_date')}}" class="form-control" placeholder="Installment Date">
                        @if($errors->has('installment_date'))
                        <span class="text-danger">{{ $errors->first('installment_date') }}</span>
                    @endif
                    </div>
                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ url('/installment/all') }}" type="submit" class="btn btn-info">Back</a>
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
    // $.noConflict();
    $(document).ready(function() {
          $("#project_name").change("change", function() {
            // e.preventDefault();
            var project_name = $("#project_name").val();
            var owner_name = $("#owner_name").val();
            console.log(owner_name);

            var token = "{{ csrf_token() }}";
            var url_data = "{{ url('/land-owner-data') }}";
                $.ajax({
                    method: "GET",
                    url: url_data,
                    dataType: "json",
                    data: {
                        _token: token,
                        project_name: project_name,
                    },
                    success: function(data) {
                        // console.log(data);
                        if(data){
                            $('#owner_name').empty();
                            $('#owner_name').focus;
                            $('#owner_name').append('<option value="">-- Select Owner Name--</option>');
                            $.each(data, function(key, value){
                            $('select[name="land_owner_name"]').append('<option value="'+ value.id +'">' + value.name+ '</option>');
                            });
                        }else{
                        $('#owner_name').empty();
                        }
                                            
                    }
                });
        });

       //$( "#installment_date" ).datepicker({dateFormat: 'yy-mm-dd'});
    });
   $(function() {
           $('.select2bs4').select2({
          theme: 'bootstrap4'
        });

           $("#installment_date").datepicker({
            dateFormat:'yy-mm-dd'
          });
   });

    
    //   jQuery(document).ready(function($){
    //   $(function() {
    //       $(".installment_date").datepicker({dateFormat:'yy-mm-dd'});
    //       });
    //   }); 

</script>
    
@endsection