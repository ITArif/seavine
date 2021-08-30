@extends('master')

@section('breadcrumb-title', 'Add Requisition Information')
@section('custom_css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script> -->
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 --><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Add Requisition Information</h3>
        </div>
        @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeRequisition') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Project Name<span style="color: red;">*</span></label>
                        <select name="project_name" id="" class="form-control select2bs4">
                            <option value="">--select--</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('project_name'))
                            <span class="text-danger">{{ $errors->first('project_name') }}</span>
                        @endif
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Employee name<span style="color: red;">*</span></label>
                          <select name="employee_name" id="" class="form-control select2bs4">
                              <option value="">--select--</option>
                              @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}"> {{ $employee->name }}</option>
                              @endforeach
                          </select>
                            @if($errors->has('employee_name'))
                                <span class="text-danger">{{ $errors->first('employee_name') }}</span>
                            @endif
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Contact Person<span style="color: red;">*</span></label>
                        <input type="text" name="contact_person" id="" class="form-control" value="{{old('contact_person')}}" placeholder="Contact Person">
                        @if($errors->has('contact_person'))
                            <span class="text-danger">{{ $errors->first('contact_person') }}</span>
                        @endif
                    </div>
                </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Remark<span style="color: red;">*</span></label>
                        <input type="text" name="remark" id="" class="form-control" value="{{old('remark')}}" placeholder="Remark">
                        @if($errors->has('remark'))
                            <span class="text-danger">{{ $errors->first('remark') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Purpose<span style="color: red;">*</span></label>
                        <input type="text" name="purpose" id="" class="form-control" value="{{old('purpose')}}" placeholder="Purpose">
                        @if($errors->has('purpose'))
                            <span class="text-danger">{{ $errors->first('purpose') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Requisition Date<span style="color: red;">*</span></label>
                        <input type="date" name="requisition_date" id="requisition_date" value="{{old('requisition_date')}}" class="form-control">
                        @if($errors->has('requisition_date'))
                            <span class="text-danger">{{ $errors->first('requisition_date') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Required Date<span style="color: red;">*</span></label>
                        <input type="date" name="required_date" id="" value="{{old('required_date')}}" class="form-control">
                        @if($errors->has('required_date'))
                            <span class="text-danger">{{ $errors->first('required_date') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status<span style="color: red;">*</span></label>
                        <select name="status" id="" class="form-control select2bs4">
                            <option value="">--select--</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @if($errors->has('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        @endif
                    </div>
                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>


              <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Requisition Items<span style="color: red;">*</span></h3>
                      </div>
                      <div class="card-body"  id="requisition_items_details">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{-- <label></label> --}}
                                    <select name="item_name[]" class="form-control select2bs4" id="">
                                        <option value="">--Select item name</option>
                                        @foreach ($item_names as $item_name)
                                            <option value=" {{ $item_name->id }}">{{ $item_name->item_name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('item_name'))
                                        <span class="text-danger">{{ $errors->first('item_name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    {{-- <label>Description<span style="color: red;">*</span></label> --}}
                                    <input type="text" name="description[]" id="" class="form-control" placeholder="Description">
                                    @if($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    {{-- <label>Qauntity</label> --}}
                                    <input type="number" name="quantity[]" id="" class="form-control" placeholder="Qauntity">
                                    @if($errors->has('quantity'))
                                        <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    {{-- <label>Rate</label> --}}
                                    <input type="number" name="rate[]" id="" class="form-control" placeholder="Rate">
                                    @if($errors->has('rate'))
                                        <span class="text-danger">{{ $errors->first('rate') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    {{-- <label>Amount</label> --}}
                                    <input type="text" name="amount[]" readonly id="" class="form-control" placeholder="Amount">
                                    @if($errors->has('amount'))
                                        <span class="text-danger">{{ $errors->first('amount') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="form-group">
                                    <span style="font-size: 1.2em; color: Tomato;" id="addButton"> 
                                      <i class="far fa-plus-square fa-lg pt-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allRequisition') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection


  @section('custom_js')
 
  <script>
    //Initialize Select2 Elements
      // $('.select2bs4').select2({
      //   theme: 'bootstrap4'
      // })


      $(document).ready(function() {
        var i=1;

        console.log('here you go');

        $("#addButton").click(function (e) {
          e.preventDefault();
          i++;

          _dynamic_div = `<div class="row" id="row_`+i+`">
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <label></label> --}}
                    <select name="item_name[]" class="form-control" id="">
                        <option value="">--Select item name</option>
                        @foreach ($item_names as $item_name)
                            <option value=" {{ $item_name->id }}">{{ $item_name->item_name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('item_name'))
                        <strong class="text-danger">{{ $errors->first('item_name') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    {{-- <label>Description</label> --}}
                    <input type="text" name="description[]" id="" class="form-control" placeholder="Description">
                    @if($errors->has('description'))
                        <strong class="text-danger">{{ $errors->first('description') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    {{-- <label>Qauntity</label> --}}
                    <input type="number" name="quantity[]" id="" class="form-control" placeholder="Qauntity">
                    @if($errors->has('quantity'))
                        <strong class="text-danger">{{ $errors->first('quantity') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    {{-- <label>Rate</label> --}}
                    <input type="number" name="rate[]" id="" class="form-control" placeholder="Rate">
                    @if($errors->has('rate'))
                        <strong class="text-danger">{{ $errors->first('rate') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    {{-- <label>Amount</label> --}}
                    <input type="text" name="amount[]" id="" readonly class="form-control" placeholder="Amount">
                    @if($errors->has('amount'))
                        <strong class="text-danger">{{ $errors->first('amount') }}</strong>
                    @endif
                </div>
            </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <span style="font-size: 1.2em; color: red;" class="btn_remove" id="`+i+`"> 
                                  <i class="far fa-trash-alt pt-2"></i>
                                </span>
                            </div>
                        </div>
                      </div>`;
          //console.log(_dynamic_div);
          $('#requisition_items_details').append(_dynamic_div)
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            //console.log(button_id);   
            $('#row_'+button_id+'').remove();  
      });
      });

      $(function() {
           $('.select2bs4').select2({
          theme: 'bootstrap4'
        });

          //  $("#requisition_date").datepicker({
          //   dateFormat:'yy-mm-dd'
          // });
      });
  </script>
      
  @endsection