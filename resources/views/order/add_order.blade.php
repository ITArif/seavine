@extends('master')

@section('breadcrumb-title', 'Create Purchase Order Manage')
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
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Create Purchase Order Manage</h3>
        </div>
        @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeIOrder') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Project Name<span style="color: red;">*</span></label>
                        <select name="project_name" id="" class="form-control select2bs4">
                            <option value="">--Select Project Name--</option>
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
                          <label>Vendor name<span style="color: red;">*</span></label>
                          <select name="vendor_name" id="" class="form-control select2bs4">
                              <option value="">--Select Vendor Name--</option>
                              @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->id }}"> {{ $vendor->name }}</option>
                              @endforeach
                          </select>
                            @if($errors->has('vendor_name'))
                                <span class="text-danger">{{ $errors->first('vendor_name') }}</span>
                            @endif
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Media Name<span style="color: red;">*</span></label>
                        <input type="text" name="media_name" id="" value="{{old('media_name')}}" class="form-control" placeholder="Media Name">
                        @if($errors->has('media_name'))
                            <span class="text-danger">{{ $errors->first('media_name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Issue Date<span style="color: red;">*</span></label>
                        <input type="date" name="issue_date" id="" value="{{old('issue_date')}}" class="form-control" placeholder="Issue Date">
                        @if($errors->has('issue_date'))
                            <span class="text-danger">{{ $errors->first('issue_date') }}</span>
                        @endif
                    </div>
                </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Contact Person 1<span style="color: red;">*</span></label>
                        <input type="text" name="contact_person" id="" value="{{old('contact_person')}}" class="form-control" placeholder="Contact Person 1">
                        @if($errors->has('contact_person'))
                            <span class="text-danger">{{ $errors->first('contact_person') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Contact Person 2<span style="color: red;">*</span></label>
                        <input type="text" name="contact_person" id="" value="{{old('contact_person')}}" class="form-control" placeholder="Contact Person 2">
                        @if($errors->has('contact_person'))
                            <span class="text-danger">{{ $errors->first('contact_person') }}</span>
                        @endif
                    </div>
                </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Note<span style="color: red;">*</span></label>
                        <input type="text" name="note" id="" class="form-control" value="{{old('note')}}" placeholder="Note">
                        @if($errors->has('note'))
                            <span class="text-danger">{{ $errors->first('note') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Subject<span style="color: red;">*</span></label>
                        <input type="text" name="subject" id="" value="{{old('subject')}}" class="form-control" placeholder="Subject">
                        @if($errors->has('subject'))
                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Delivery Date<span style="color: red;">*</span></label>
                        <input type="date" name="delivery_date" id="" value="{{old('delivery_date')}}" class="form-control">
                        @if($errors->has('delivery_date'))
                            <span class="text-danger">{{ $errors->first('delivery_date') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Message Body<span style="color: red;">*</span></label>
                        <textarea name="message_body" id="" cols="3" rows="3" class="form-control" placeholder="Message Body"></textarea>
                        @if($errors->has('message_body'))
                            <span class="text-danger">{{ $errors->first('message_body') }}</span>
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
                        <h3 class="card-title">Requisition Confirmed ID<span style="color: red;">*</span></h3>
                      </div>
                      <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    {{-- <label></label> --}}
                                    <select name="rqn_confirmed_id" class="form-control select2bs4" id="">
                                        <option value="">--Select Requisition Confirmed ID</option>
                                    </select>
                                </div>
                            </div>
                        </div>



                        <div id="items" class="body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Unit</th>
                                            <th>Description</th>
                                            <th>Qty.</th>
                                            <th>Rate</th>
                                            <th>Total Price</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center text-danger" colspan="7">No Items Found Or Please Select Requisition Confirmed ID</td>
                                            </tr>
                                        </tbody>
    
                                        <tfoot>
    
                                        <tr>
                                            <th colspan="5" class="text-right">Total Amount</th>
                                            <th>
                                                <span>0</span>
                                                <input value="0" type="hidden" name="totalAmount">
                                            </th>
                                            <td></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>


                      </div>
                </div>
              </div>

              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allOrder') }}" type="submit" class="btn btn-info">Back</a>
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

      $(function() {
           $('.select2bs4').select2({
          theme: 'bootstrap4'
        });

          //  $("#date").datepicker({
          //   dateFormat:'yy-mm-dd'
          // });
      });
   </script>  
  @endsection  


  