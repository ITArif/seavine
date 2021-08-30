
@extends('master')

@section('breadcrumb-title', 'Add Sell Information')

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
          <h3 class="card-title">Add Sell Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeSales') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Customer Name<span style="color: red;">*</span></label>
                          <select name="customer_name" class="form-control select2bs4" id="" class="form-control">
                            <option value="">--select--</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                          </select>
                          @if($errors->has('customer_name'))
                              <span class="text-danger">{{ $errors->first('customer_name') }}</span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Project Name<span style="color: red;">*</span></label>
                            <select name="project_name" class="form-control select2bs4" id="" class="form-control">
                              <option value="">--select--</option>
                              @foreach ($projects as $project)
                                  <option value="{{ $project->id }}">{{ $project->name }}</option>
                              @endforeach
                            </select>
                            @if($errors->has('project_name'))
                                <span class="text-danger">{{ $errors->first('project_name') }}</span>
                            @endif
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Product Name<span style="color: red;">*</span></label>
                          <select name="product_name" class="form-control select2bs4" id="" class="form-control">
                            <option value="">--select--</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->id }}</option>
                            @endforeach
                          </select>
                          @if($errors->has('product_name'))
                              <span class="text-danger">{{ $errors->first('product_name') }}</span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Employee Name<span style="color: red;">*</span></label>
                          <select name="employee_name" class="form-control select2bs4" id="" class="form-control">
                            <option value="">--select--</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                          </select>
                          @if($errors->has('employee_name'))
                              <span class="text-danger">{{ $errors->first('employee_name') }}</span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Sells Date<span style="color: red;">*</span></label>
                            <input type="text" name="sales_date" id="sales_date" class="form-control" placeholder="Sells Date">
                            @if($errors->has('sales_date'))
                                <span class="text-danger">{{ $errors->first('sales_date') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Status<span style="color: red;">*</span></label>
                          <select name="status" id="" class="form-control select2bs4">
                            <option value="">--select--</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                          </select>
                          @if($errors->has('status'))
                              <span class="text-danger">{{ $errors->first('status') }}</span>
                          @endif
                      </div>
                  </div>

                      <div class="col-md-12">
                        <div class="form-group">
                            <label>Description<span style="color: red;">*</span></label>
                            <textarea name="description" id="address" cols="3" rows="3" class="form-control" placeholder="Description"></textarea>
                            @if($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allSales') }}" type="submit" class="btn btn-info">Back</a>
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

    $(function() {
           $('.select2bs4').select2({
          theme: 'bootstrap4'
        });

           $("#sales_date").datepicker({
            dateFormat:'yy-mm-dd'
          });
      });

</script>
    
@endsection