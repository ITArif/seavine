
@extends('master')

@section('breadcrumb-title', 'Edit Bank/Cash Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Edit Bank/Cash Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{route('banks_update')}}" method="POST">
            @csrf
            
            <div class="card-body">
                <div class="row">
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Name" value="{{$bank->name}}">
                            @if($errors->has('name'))
                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                            @endif
                            <input type="hidden" name="id" value="{{$bank->id}}" />           
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Account No</label>
                          <input type="text" name="account_no" class="form-control" placeholder="Account No" value="{{$bank->account_no}}">
                            @if($errors->has('account_no'))
                                <strong class="text-danger">{{ $errors->first('account_no') }}</strong>
                            @endif
                      </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="description" cols="3" rows="3" class="form-control" placeholder="Description">{{$bank->description}}</textarea>
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
                 <a href="{{ route('showAddBank') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection
