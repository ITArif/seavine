

@extends('master')

@section('breadcrumb-title', 'Edit System User')

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
          <h3 class="card-title">Edit System User</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{route('update.system.user',$user->id)}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Name" value="{{$user->name}}">
                      @if($errors->has('name'))
                          <strong class="text-danger">{{ $errors->first('name') }}</strong>
                      @endif
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Email</label>
                         <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{$user->email}}">
                          @if($errors->has('email'))
                              <strong class="text-danger">{{ $errors->first('email') }}</strong>
                          @endif                      
                      </div>
                  </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>User Role</label>
                    <select name="role" class="form-control">
                      <option value="">--select User Role--</option>
                      <option value="admin" {{$user->role=='admin'?'selected':''}}>Admin</option>
                      <option value="accountent" {{$user->role=='accountent'?'selected':''}}>Accountent</option>
                      <option value="project-manager" {{$user->role=='project-manager'?'selected':''}}>Project-Manager</option>
                      <option value="product-manager" {{$user->role=='product-manager'?'selected':''}}>Product-Manager</option>
                      <option value="sells-manager" {{$user->role=='sells-manager'?'selected':''}}>Sells-Manager</option>
                      <option value="purchage-manager" {{$user->role=='purchage-manager'?'selected':''}}>Purchage-Manager</option>
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
                 <button type="submit" class="btn btn-success ">Update</button>
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