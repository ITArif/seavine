@extends('master')
@section('content')
@section('custom_css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script> -->
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 --><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@endsection

@section('breadcrumb-title', 'Balance Sheet')

@section('content')
<input type="text" id="page" value="blsr" hidden></input>
        <!-- Main content -->
        <section class="content">

          <!-- general form elements disabled -->
          <div class="card card-secondary">
                <div class="card-header">
                <h3 class="card-title">Select month range to continue</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <form role="form" action="{{url('print/balance-sheet')}}" method="get">
                 @csrf
                    <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                        <label>&nbsp;&nbsp; Project Name</label>
                          <div class="col-md-12 col-sm-12">
                         <select name="project_name" required id="project_name" class="form-control select2bs4">
                            <option value="">--select project name</option>
                          @foreach($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                          @endforeach
                        </select>  
                          </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                        <label>&nbsp;&nbsp; From Month</label>
                          <div class="col-md-12 col-sm-12">
                             <input type="text" id="from_date" required class="form-control" name="from_date" placeholder="From Date For Balance Sheet">
                          </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                        <label>&nbsp;&nbsp; To Month</label>
                          <div class="col-md-12 col-sm-12">
                             <input type="text" id="to_date" required class="form-control" name="to_date" placeholder="To Date For Balance Sheet">
                          </div>
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href=""><button type="submit" id="generate" class="btn btn-success">Generate</button></a>
                </div>
              </form>
                <!-- /.card-footer -->
            </div>
        </section>
        <!-- /.content -->
@endsection
@section('custom_js')

<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<script>
// $(document).ready(function() {
//     $( "#from_date" ).datepicker({dateFormat: 'yy-mm-dd'});
//     $( "#to_date" ).datepicker({dateFormat: 'yy-mm-dd'});
//     //$("#from_date").datepicker('show');
//   } );

 $(function() {
           $('.select2bs4').select2({
          theme: 'bootstrap4'
        });

           $("#from_date").datepicker({
            dateFormat:'yy-mm-dd'
          });

           $("#to_date").datepicker({
            dateFormat:'yy-mm-dd'
          });
      });
</script>

@endsection