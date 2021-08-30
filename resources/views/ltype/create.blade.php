

@extends('master')

@section('breadcrumb-title', 'Add Ledger Type')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Add Ledger Type</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeLedger') }}" method="POST">
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
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="code" class="form-control" placeholder="Code">
                        @if($errors->has('code'))
                            <strong class="text-danger">{{ $errors->first('code') }}</strong>
                        @endif
                    </div>
                </div>
                 
                   <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('showAddLadger') }}" type="submit" class="btn btn-info">Back</a>
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