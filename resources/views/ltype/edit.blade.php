
@extends('master')

@section('breadcrumb-title', 'Edit Ledger Type')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Edit Ledger Type</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{route('ledgertype_update')}}" method="POST">
            @csrf
            
            <div class="card-body">
                <div class="row">
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Name" value="{{$ltype->name}}">
                            @if($errors->has('name'))
                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                            @endif
                            <input type="hidden" name="id" value="{{$ltype->id}}" />           
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Code</label>
                          <input type="text" name="code" class="form-control" placeholder="Code" value="{{$ltype->code}}">
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
                 <button type="submit" class="btn btn-success ">Update</button>
                 <a href="{{ route('showAddLadger') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection
