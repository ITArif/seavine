

@extends('master')

@section('breadcrumb-title', 'Add New System User')

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
          <h3 class="card-title">Add New System User</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{route('store.system.user')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Name">
                      @if($errors->has('name'))
                          <strong class="text-danger">{{ $errors->first('name') }}</strong>
                      @endif
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Email</label>
                         <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                          @if($errors->has('email'))
                              <strong class="text-danger">{{ $errors->first('email') }}</strong>
                          @endif                      
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Password</label>
                           <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                            @if($errors->has('password'))
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                            @endif
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Confirm Possword</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="Enter confirm password">
                            @if($errors->has('password_confirmation'))
                                <strong class="text-danger">{{ $errors->first('password_confirmation') }}</strong>
                            @endif
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>User Role</label>
                    <select name="role" class="form-control">
                      <option value="">--select User Role--</option>
                      <option value="admin">Admin</option>
                      <option value="accountent">Accountent</option>
                      <option value="project-manager">Project-Manager</option>
                      <option value="product-manager">Product-Manager</option>
                      <option value="sells-manager">Sells-Manager</option>
                      <option value="purchage-manager">Purchage-Manager</option>
                    </select>
                     @if($errors->has('role'))
                        <strong class="text-danger">{{ $errors->first('role') }}</strong>
                    @endif
                  </div>
              </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
               <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="#" type="submit" class="btn btn-info">Back</a>
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

    // $(function () {
    //   $( "#launching_date" ).datepicker({dateFormat: 'yy-mm-dd'});
    //   $( "#hand_over_date" ).datepicker({dateFormat: 'yy-mm-dd'});
    // })

</script>
    
@endsection