@extends('master')

@section('breadcrumb-title', 'Edit Adjustment Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Edit Adjustment Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('updateAdjustment',$adjustment->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Project Name</label>
                      <select name="project_name" id="" class="form-control">
                        <option value="">--Select Project Name--</option>
                        @foreach ($projects as $project)
                            <option {{$project->id == $adjustment->project_id ? 'selected' : ''}} value="{{ $project->id }}"> {{ $project->name }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('project_name'))
                        <strong class="text-danger">{{ $errors->first('project_name') }}</strong>
                      @endif
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Ledger Name</label>
                          <select name="ledger_name" id="" class="form-control">
                            <option value="">--Select Project Name--</option>
                        @foreach ($ledger_names as $lname)
                            <option {{$lname->id == $adjustment->lname_id ? 'selected' : ''}} value="{{ $lname->id }}"> {{ $lname->name }}</option>
                        @endforeach
                          </select> 
                        @if($errors->has('ledger_name'))
                            <strong class="text-danger">{{ $errors->first('ledger_name') }}</strong>
                        @endif                      
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Account Type</label>
                          <select name="type" id="" class="form-control">
                            <option value="">--Select Project Name--</option>
                        @foreach ($ledger_groups as $type)
                            <option {{$type->id == $adjustment->type ? 'selected' : ''}} value="{{ $type->id }}"> {{ $type->name }}</option>
                        @endforeach
                          </select> 
                          @if($errors->has('type'))
                          <strong class="text-danger">{{ $errors->first('type') }}</strong>
                      @endif
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" name="amount" class="form-control" placeholder="0" value="{{$adjustment->amount}}">
                    @if($errors->has('amount'))
                        <strong class="text-danger">{{ $errors->first('amount') }}</strong>
                    @endif
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                      <label>Percentage</label>
                      <input type="text" name="percentage" class="form-control" placeholder="%"  value="{{$adjustment->percentage}}">
                  @if($errors->has('percentage'))
                      <strong class="text-danger">{{ $errors->first('percentage') }}</strong>
                  @endif
                  </div>
              </div>

                <div class="col-md-6">
                  <div class="form-group">
                      <label>Perticular</label>
                      <textarea style="width: 100%;" class="form-control" name="particular" id="" cols="30" rows="3" placeholder="Perticular"> {{$adjustment->particulars}}</textarea>
                      @if($errors->has('particular'))
                      <strong class="text-danger">{{ $errors->first('particular') }}</strong>
                  @endif
                  </div>
              </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Update</button>
                 <a href="{{ route('allAdjustment') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection