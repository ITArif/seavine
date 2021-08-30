
@extends('master')

@section('breadcrumb-title', 'Add Employee Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Add Employee Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeEmployee') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name<span style="color: red;">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Name">
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif                 
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Position<span style="color: red;">*</span></label>
                                <input type="text" name="position" class="form-control" value="{{old('position')}}" placeholder="Position">
                                @if($errors->has('position'))
                                    <span class="text-danger">{{ $errors->first('position') }}</span>
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
                    <label>NID<span style="color: red;">*</span></label>
                    <input type="number" name="nid" class="form-control" value="{{old('nid')}}" placeholder="NID">
                    @if($errors->has('nid'))
                        <span class="text-danger">{{ $errors->first('nid') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label>Department<span style="color: red;">*</span></label>
                  <input type="text" name="department" class="form-control" value="{{old('department')}}" placeholder="Department">
                  @if($errors->has('department'))
                      <span class="text-danger">{{ $errors->first('department') }}</span>
                  @endif
              </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
                <label>Address<span style="color: red;">*</span></label>
                <textarea name="address" id="perment_address" cols="3" rows="3" class="form-control" placeholder="Address"></textarea>
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>
        </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allEmployee') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection

  @section('custom_js')

<script>
    $(document).ready(function() {
        $(function() { 
     $( "#launching_date" ).datepicker();
     $( "#hand_over_date" ).datepicker();
  });
    });
</script>
    
@endsection