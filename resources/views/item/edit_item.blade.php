@extends('master')

@section('breadcrumb-title', 'Edit Item Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Edit Item Information</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('updateItem',$item->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Item Name</label>
                      <input class="form-control" type="text" class="form-controll" name="item_name" placeholder="Item Name" value="{{ $item->item_name }}">
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Unit</label>
                          <input type="text" name="unit" id="" class="form-control" placeholder="Unit" value="{{ $item->unit }}">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Description</label>
                          <textarea  class="form-control" name="description" id="" cols="30" rows="5" placeholder="Description"> {{ $item->description }} </textarea>
                      </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Update</button>
                 <a href="{{ route('allItem') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection