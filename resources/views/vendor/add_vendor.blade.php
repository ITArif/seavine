
@extends('master')

@section('breadcrumb-title', 'Add Vendor Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Add Vendor Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeVendor') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Name<span style="color: red;">*</span></label>
                      <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Name">
                      @if($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Company Name<span style="color: red;">*</span></label>
                          <input type="text" name="company_name" class="form-control" value="{{old('company_name')}}" placeholder="Company Name">
                            @if($errors->has('company_name'))
                                <span class="text-danger">{{ $errors->first('company_name') }}</span>
                            @endif
                      </div>
                  </div>

                <div class="col-md-6">
                  <div class="form-group">
                      <label>Phone<span style="color: red;">*</span></label>
                      <input type="number" name="phone" class="form-control" value="{{old('phone')}}" placeholder="Phone">
                        @if($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label>Email<span style="color: red;">*</span></label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email">
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>

          <div class="col-md-6">
                    <div class="form-group">
                        <label>Address<span style="color: red;">*</span></label>
                        <textarea name="address" id="address" cols="3" rows="3" class="form-control" placeholder="Address"></textarea>
                          @if($errors->has('address'))
                              <span class="text-danger">{{ $errors->first('address') }}</span>
                          @endif
                    </div>
                </div>

          <div class="col-md-6">
            <div class="form-group">
                <label>Description<span style="color: red;">*</span></label>
                <textarea name="description" id="description" cols="3" rows="3" class="form-control" placeholder="Description"></textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
              <label>Website<span style="color: red;">*</span></label>
              <input type="text" name="website" class="form-control" value="{{old('website')}}" placeholder="Website">
              @if($errors->has('website'))
                  <span class="text-danger">{{ $errors->first('website') }}</span>
              @endif
          </div>
      </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allVendor') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection