

@extends('master')

@section('breadcrumb-title', 'Edit Caller Type')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Edit Caller Type</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{route('update.caller',$callers->id)}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Caller<span style="color: red;">*</span></label>
                      <input type="text" name="caller" class="form-control" value="{{$callers->caller}}" placeholder="Name">
                      @if($errors->has('caller'))
                          <span class="text-danger">{{ $errors->first('caller') }}</span>
                      @endif
                    </div>
                  </div>
                   <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Update</button>
                 <a href="{{ route('allCaller') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection

  @section('custom_js')

<script>
</script>
    
@endsection