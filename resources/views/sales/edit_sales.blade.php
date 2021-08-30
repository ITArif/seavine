

@extends('master')

@section('breadcrumb-title', 'Edit Sell Information')

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
          <h3 class="card-title">Edit Sell Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{route('updateSales',$sales->id)}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Customer Name</label>
                      <select name="customer_name" id="" class="form-control">
                        <option value="">--select--</option>
                        @foreach ($customers as $customer)
                            <option <?= ($sales->customer_id == $customer->id) ? 'selected' : '' ?> value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('customer_name'))
                          <strong class="text-danger">{{ $errors->first('customer_name') }}</strong>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Project Name</label>
                        <select name="project_name" id="" class="form-control">
                          <option value="">--select--</option>
                          @foreach ($projects as $project)
                              <option  <?= ($sales->project_id == $project->id) ? 'selected' : '' ?> value="{{ $project->id }}">{{ $project->name }}</option>
                          @endforeach
                        </select>
                        @if($errors->has('project_name'))
                            <strong class="text-danger">{{ $errors->first('project_name') }}</strong>
                        @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Product Name</label>
                      <select name="product_name" id="" class="form-control">
                        <option value="">--select--</option>
                        @foreach ($products as $product)
                            <option <?= ($sales->product_id == $product->id) ? 'selected' : '' ?> value="{{ $product->id }}">{{ $product->id }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('product_name'))
                          <strong class="text-danger">{{ $errors->first('product_name') }}</strong>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Employee Name</label>
                      <select name="employee_name" id="" class="form-control">
                        <option value="">--select--</option>
                        @foreach ($employees as $employee)
                            <option <?= ($sales->employee_id == $employee->id) ? 'selected' : '' ?> value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('employee_name'))
                          <strong class="text-danger">{{ $errors->first('employee_name') }}</strong>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Sells Date</label>
                        <input type="date" name="sales_date" id="sales_date" class="form-control" placeholder="Sells Date" value="{{ $sales->sales_date }}">
                        @if($errors->has('sales_date'))
                            <strong class="text-danger">{{ $errors->first('sales_date') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                      <label>Status</label>
                      <select name="status" id="" class="form-control">
                        <option value="">--select--</option>
                        <option <?= $sales->status == '1' ? 'selected' : ''?> value="1">Active</option>
                        <option <?= $sales->status == '0' ? 'selected' : ''?> value="0">Inactive</option>
                      </select>
                      @if($errors->has('sales_date'))
                          <strong class="text-danger">{{ $errors->first('sales_date') }}</strong>
                      @endif
                  </div>
              </div>

                <div class="col-md-6">
                  <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" id="address" cols="3" rows="3" class="form-control" placeholder="Description"> {{ $sales->description }}</textarea>
                      @if($errors->has('description'))
                          <strong class="text-danger">{{ $errors->first('description') }}</strong>
                      @endif
                  </div>
              </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Update</button>
                 <a href="{{ route('allSales') }}" type="submit" class="btn btn-info">Back</a>
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
      $( "#sales_date" ).datepicker({dateFormat: 'yy-mm-dd'});
    })

</script>
    
@endsection