
@extends('master')

@section('breadcrumb-title', 'Edit Ledger')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Edit Ledger</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{route('ledgername_update')}}" method="POST">
            @csrf
            
            <div class="card-body">
                <div class="row">
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Name" value="{{$lname->name}}">
                            @if($errors->has('name'))
                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                            @endif
                            <input type="hidden" name="id" value="{{$lname->id}}" />           
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Unit</label>
                          <input type="text" name="unit" class="form-control" placeholder="unit" value="{{$lname->unit}}">
                            @if($errors->has('unit'))
                                <strong class="text-danger">{{ $errors->first('unit') }}</strong>
                            @endif
                      </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Ledger Group</label>
                      <select name="lgroup_id" class="form-control">
                        <option value="">--select--</option>
                        @foreach ($lgroups as $lgroup)
                            <option <?= ($lname->lgroup_id == $lgroup->id) ? 'selected' : '' ?> value="{{ $lgroup->id }}">{{ $lgroup->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('lgroup_id'))
                        <strong class="text-danger">{{ $errors->first('lgroup_id') }}</strong>
                    @endif
                    </div>
                  </div>

                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Ledger Type</label>
                      <select name="ltype_id" class="form-control">
                        <option value="">--select--</option>
                        @foreach ($ltypes as $ltype)
                            <option <?= ($lname->ltype_id == $ltype->id) ? 'selected' : '' ?> value="{{ $ltype->id }}">{{ $ltype->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('ltype_id'))
                        <strong class="text-danger">{{ $errors->first('ltype_id') }}</strong>
                    @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Transaction Type</label>
                      <select name="is_debit" class="form-control">
                        <option <?= ($lname->is_debit == 1) ? 'selected' : '' ?> value="1">Debit</option>
                        <option <?= ($lname->is_debit == 0) ? 'selected' : '' ?> value="0">Credit</option>
                    </select>
                    </div>
                  </div>


                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Update</button>
                 <a href="{{ route('showAddLadgerName') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection
