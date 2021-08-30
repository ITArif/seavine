

@extends('master')

@section('breadcrumb-title', 'Add Ledger Group')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Add Ledger Group</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeledgergroup') }}" method="POST">
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
                        <label>Code<span style="color: red;">*</span></label>
                        <input type="text" name="code" class="form-control" value="{{old('code')}}" placeholder="Code">
                        @if($errors->has('code'))
                            <span class="text-danger">{{ $errors->first('code') }}</span>
                        @endif
                    </div>
                </div>
                 
                   <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('showAddLadgerGroup') }}" type="submit" class="btn btn-info">Back</a>
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