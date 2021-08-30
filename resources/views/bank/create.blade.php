

@extends('master')

@section('breadcrumb-title', 'Add Bank/Cash Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Add Bank/Cash Information</h3>
        </div>
        @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeBank') }}" method="POST">
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
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Account No<span style="color: red;">*</span></label>
                        <input type="text" name="account_no" class="form-control" value="{{old('account_no')}}" placeholder="Account">
                        @if($errors->has('account_no'))
                            <span class="text-danger">{{ $errors->first('account_no') }}</span>
                        @endif
                    </div>
                </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Description<span style="color: red;">*</span></label>
                          <textarea name="description" id="description" cols="3" rows="3" class="form-control" placeholder="Description"></textarea>
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
                 <a href="{{ route('showAddBank') }}" type="submit" class="btn btn-info">Back</a>
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
      @if ($message = Session::get('success'))
        console.log('{{ $message }}');
        Swal.fire({
            icon: 'success',
            title: '{{ $message }}',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
      @endif
      
      @if ($message = Session::get('error'))
        console.log('{{ $message }}');
        Swal.fire({
            icon: 'error',
            title: '{{ $message }}',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 7000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
      @endif
    
    });
      
  </script>
    
@endsection