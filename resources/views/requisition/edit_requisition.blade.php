@extends('master')

@section('dashboard-title', 'Edit Requisition Information')
@section('breadcrumb-title', 'Edit Requisition Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Edit Requisition Information</h3>
        </div>
        @include('message')
        <!-- /.card-header -->
        <form action="{{ route('updateRequisition',$requisition->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Project Name</label>
                        <select name="project_name" id="" class="form-control">
                            <option value="">--select--</option>
                            @foreach ($projects as $project)
                                <option <?= ($requisition->project_id == $project->id) ? 'selected' : '' ?>  value="{{ $project->id }}">{{ $project->name }}</option>
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
                          <label>Employee name</label>
                          <select name="employee_name" id="" class="form-control">
                              <option value="">--select--</option>
                              @foreach ($employees as $employee)
                                <option <?= ($requisition->employee_id == $employee->id) ? 'selected' : '' ?> value="{{ $employee->id }}"> {{ $employee->name }}</option>
                              @endforeach
                          </select>
                            @if($errors->has('employee_name'))
                                <strong class="text-danger">{{ $errors->first('employee_name') }}</strong>
                            @endif
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" name="contact_person" id="" class="form-control" placeholder="Contact Person" value="{{ $requisition->contact_person }}">
                        @if($errors->has('contact_person'))
                            <strong class="text-danger">{{ $errors->first('contact_person') }}</strong>
                        @endif
                    </div>
                </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Remark</label>
                        <input type="text" name="remark" id="" class="form-control" placeholder="Remark" value="{{ $requisition->remark }}">
                        @if($errors->has('remark'))
                            <strong class="text-danger">{{ $errors->first('remark') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Purpose</label>
                        <input type="text" name="purpose" id="" class="form-control" placeholder="Purpose" value="{{ $requisition->purpose }}">
                        @if($errors->has('purpose'))
                            <strong class="text-danger">{{ $errors->first('purpose') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Requisition Date</label>
                        <input type="date" name="requisition_date" id="" class="form-control" value="{{ $requisition->requisition_date }}">
                        @if($errors->has('requisition_date'))
                            <strong class="text-danger">{{ $errors->first('requisition_date') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Required Date</label>
                        <input type="date" name="required_date" id="" class="form-control" value="{{ $requisition->required_date }}">
                        @if($errors->has('required_date'))
                            <strong class="text-danger">{{ $errors->first('required_date') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="">--select--</option>
                            <option <?= ($requisition->status =='1') ? 'selected' : '' ?> value="1">Active</option>
                            <option <?= ($requisition->status =='0') ? 'selected' : '' ?> value="0">Inactive</option>
                        </select>
                        @if($errors->has('status'))
                            <strong class="text-danger">{{ $errors->first('status') }}</strong>
                        @endif
                    </div>
                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Update</button>
                 <a href="{{ route('allRequisition') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection