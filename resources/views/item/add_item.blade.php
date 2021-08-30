@extends('master')

@section('breadcrumb-title', 'Add Item Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Add Item Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeItem') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Item Name<span style="color: red;">*</span></label>
                      <input  class="form-control" type="text" value="{{old('item_name')}}" class="form-controll" name="item_name" placeholder="Item Name">
                      @if($errors->has('item_name'))
                        <span class="text-danger">{{ $errors->first('item_name') }}</span>
                      @endif
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Unit<span style="color: red;">*</span></label>
                          <input type="text" name="unit" id="" class="form-control" value="{{old('unit')}}" placeholder="Unit">
                        @if($errors->has('unit'))
                            <span class="text-danger">{{ $errors->first('unit') }}</span>
                        @endif                      
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Description<span style="color: red;">*</span></label>
                          <textarea style="width: 100%;" class="form-control" name="description" id="" cols="30" rows="3" placeholder="Description"></textarea>
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
                 <a href="{{ route('allItem') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection