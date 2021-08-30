

@extends('master')

@section('breadcrumb-title', 'Add Ledger Name')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Add Ledger Name</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeledgername') }}" method="POST">
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
                        <label>Unit<span style="color: red;">*</span></label>
                        <input type="text" name="unit" class="form-control" value="{{old('unit')}}" placeholder="Ltr/Pcs/Unit or blank">
                        @if($errors->has('unit'))
                            <span class="text-danger">{{ $errors->first('unit') }}</span>
                        @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Ledger Group<span style="color: red;">*</span></label>
                      <select name="lgroup_id" class="form-control select2bs4" id="lg">
                        <option value="">--select--</option>
                        @foreach ($lgroups as $lgroup)
                            <option value="{{ $lgroup->id }}">{{ $lgroup->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('lgroup_id'))
                        <span class="text-danger">{{ $errors->first('lgroup_id') }}</span>
                    @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Ledger Type<span style="color: red;">*</span></label>
                      <select name="ltype_id" class="form-control select2bs4">
                        <option value="">--select--</option>
                        @foreach ($ltypes as $ltype)
                            <option value="{{ $ltype->id }}">{{ $ltype->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('ltype_id'))
                        <span class="text-danger">{{ $errors->first('ltype_id') }}</span>
                    @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Transaction Type<span style="color: red;">*</span></label>
                      <select name="is_debit" class="form-control select2bs4">
                        <option value="1">Debit</option>
                        <option value="0">Credit</option>
                    </select>
                    </div>
                  </div>
                 
                   <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('showAddLadgerName') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection

  @section('custom_js')

<script>
  $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
</script>
    
@endsection