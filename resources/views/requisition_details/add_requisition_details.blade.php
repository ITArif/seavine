@extends('master')

@section('dashboard-title', 'Add Requisition Details Information')
@section('breadcrumb-title', 'Add Requisition Details Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Add Requisition Details Information</h3>
        </div>
        @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeRequisitionDetails') }}" method="POST">
          @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Item Name</label>
                      <select name="item_name" id="" class="form-control">
                        <option value="">--select--</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('item_name'))
                        <strong class="text-danger">{{ $errors->first('item_name') }}</strong>
                      @endif
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Quantity</label>
                          <input type="number" name="quantity" id="" class="form-control" placeholder="Quantity">
                          @if($errors->has('quantity'))
                          <strong class="text-danger">{{ $errors->first('quantity') }}</strong>
                      @endif
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Rate</label>
                        <input type="number" name="rate" id="" class="form-control" placeholder="Rate">
                        @if($errors->has('rate'))
                        <strong class="text-danger">{{ $errors->first('rate') }}</strong>
                    @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" name="amount" id="" class="form-control" placeholder="Amount">
                        @if($errors->has('amount'))
                        <strong class="text-danger">{{ $errors->first('amount') }}</strong>
                    @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Description</label>
                          <textarea  class="form-control" name="description" id="" cols="30" rows="3" placeholder="Description"></textarea>
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
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allRequisitionDetails') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection