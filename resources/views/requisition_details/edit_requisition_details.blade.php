@extends('master')

@section('dashboard-title', 'Edit Requisition Details Information')
@section('breadcrumb-title', 'Edit Requisition Details Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Edit Requisition Details Information</h3>
        </div>
        @include('message')
        <!-- /.card-header -->
        <form action="{{ route('updateRequisitionDetails',$requisitionDetails->id) }}" method="POST">
          @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Item Name</label>
                      <select name="item_name" id="" class="form-control">
                        <option value="">--select--</option>
                        @foreach ($items as $item)
                            <option <?= ($requisitionDetails->item_id == $item->id) ? 'selected' : '' ?> value="{{ $item->id }}">{{ $item->item_name }}</option>
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
                          <input type="number" name="quantity" id="" class="form-control" placeholder="Quantity" value="{{ $requisitionDetails->quantity }}">
                          @if($errors->has('quantity'))
                          <strong class="text-danger">{{ $errors->first('quantity') }}</strong>
                      @endif
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Rate</label>
                        <input type="number" name="rate" id="" class="form-control" placeholder="Rate" value="{{ $requisitionDetails->rate }}">
                        @if($errors->has('rate'))
                        <strong class="text-danger">{{ $errors->first('rate') }}</strong>
                    @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" name="amount" id="" class="form-control" placeholder="Amount" value="{{ $requisitionDetails->amount }}">
                        @if($errors->has('amount'))
                        <strong class="text-danger">{{ $errors->first('amount') }}</strong>
                    @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Description</label>
                          <textarea  class="form-control" name="description" id="" cols="30" rows="3" placeholder="Description">{{ $requisitionDetails->description }}</textarea>
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