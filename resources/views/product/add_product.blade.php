
@extends('master')

@section('breadcrumb-title', 'Add Product Information')
@section('custom_css')
    <!-- <link href="{{ asset('js/admin/select2/dist/css/select2.css') }}" rel="stylesheet"> -->
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Add Product Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Project Name<span style="color: red;">*</span></label>
                      <select name="project_name" class="form-control select2bs4">
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

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Flat Type<span style="color: red;">*</span></label>
                      {{-- <input type="text" name="flat_type" class="form-control" placeholder="Flat Type"> --}}
                      <select name="flat_type" id="" class="form-control select2bs4">
                        <option value="">--Select Flat Type--</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                        <option value="K">K</option>
                        <option value="L">L</option>
                      </select>
                      @if($errors->has('flat_type'))
                          <span class="text-danger">{{ $errors->first('flat_type') }}</span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Floor Number<span style="color: red;">*</span></label>
                      {{-- <input type="number" name="floor_number" class="form-control" placeholder="Floor Number"> --}}
                      <select name="floor_number" id="" class="form-control select2bs4">
                        <option value="">--Select Floor Number</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                        <option value="5th">5th</option>
                        <option value="6th">6th</option>
                        <option value="7th">7th</option>
                        <option value="8th">8th</option>
                        <option value="9th">9th</option>
                        <option value="10th">10th</option>
                        <option value="11th">11th</option>
                        <option value="12th">12th</option>
                        <option value="13th">13th</option>
                        <option value="15th">15th</option>
                        <option value="16th">16th</option>
                        <option value="17th">17th</option>
                        <option value="18th">18th</option>
                        <option value="19th">19th</option>
                        <option value="20th">20th</option>
                      </select>
                      @if($errors->has('floor_number'))
                          <span class="text-danger">{{ $errors->first('floor_number') }}</span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Flat Size<span style="color: red;">*</span></label>
                      <input type="number" name="flat_size" id="flat_size" value="{{old('flat_size')}}" class="form-control" placeholder="Flat Size">
                      @if($errors->has('flat_size'))
                          <span class="text-danger">{{ $errors->first('flat_size') }}</span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Unit Price<span style="color: red;">*</span></label>
                      <input type="number" name="unit_price" id="unit_price" value="{{old('unit_price')}}" class="form-control" placeholder="Unit Price">
                      @if($errors->has('unit_price'))
                          <span class="text-danger">{{ $errors->first('unit_price') }}</span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Total Flat Price<span style="color: red;">*</span></label>
                      <input type="text" readonly name="total_flat_price" value="{{old('total_flat_price')}}" id="total_flat_price" class="form-control">
                      @if($errors->has('project_name'))
                          <span class="text-danger">{{ $errors->first('total_flat_price') }}</span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Car Parking Charge<span style="color: red;">*</span></label>
                        <input type="number" name="car_parking_charge" value="{{old('car_parking_charge')}}" id="car_parking_charge" class="form-control" placeholder="Car Parking Charge">
                        @if($errors->has('car_parking_charge'))
                            <span class="text-danger">{{ $errors->first('car_parking_charge') }}</span>
                        @endif
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Utility Charge<span style="color: red;">*</span></label>
                      <input type="number" name="utility_charge" value="{{old('utility_charge')}}" id="utility_charge" class="form-control" placeholder="Utility Charge">
                      @if($errors->has('utility_charge'))
                          <span class="text-danger">{{ $errors->first('utility_charge') }}</span>
                      @endif
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Additional Work Charge<span style="color: red;">*</span></label>
                          <input type="number" name="additional_work_charge" value="{{old('additional_work_charge')}}" id="additional_work_charge" class="form-control" placeholder="Additional Work Charge">
                          @if($errors->has('additional_work_charge'))
                              <span class="text-danger">{{ $errors->first('additional_work_charge') }}</span>
                          @endif                      
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Other Charge<span style="color: red;">*</span></label>
                          <input type="number" name="other_charge" value="{{old('other_charge')}}" id="other_charge" class="form-control" placeholder="Other Charge">
                          @if($errors->has('other_charge'))
                              <span class="text-danger">{{ $errors->first('other_charge') }}</span>
                          @endif
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Discount<span style="color: red;">*</span></label>
                        <input type="number" name="discount" id="discount" value="{{old('discount')}}" class="form-control" placeholder="Discount">
                        @if($errors->has('discount'))
                            <span class="text-danger">{{ $errors->first('discount') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label>Refund Additional Work Charge<span style="color: red;">*</span></label>
                      <input type="number" name="refund_additional_work_charge" id="refund_additional_work_charge" class="form-control" value="{{old('refund_additional_work_charge')}}" placeholder="Refund Additional Work Charge">
                      @if($errors->has('refund_additional_work_charge'))
                          <span class="text-danger">{{ $errors->first('refund_additional_work_charge') }}</span>
                      @endif
                  </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                    <label>Net Total<span style="color: red;">*</span></label>
                    <input type="text" readonly name="net_total" value="{{old('net_total')}}" id="net_total" class="form-control">
                    @if($errors->has('net_total'))
                        <span class="text-danger">{{ $errors->first('net_total') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                  <label>File Attached<span style="color: red;">*</span></label>
                  <input type="file" name="file_attached" class="form-control" value="{{old('file_attached')}}" placeholder="File Attached">
                  @if($errors->has('file_attached'))
                      <span class="text-danger">{{ $errors->first('file_attached') }}</span>
                  @endif
              </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
                <label>Description<span style="color: red;">*</span></label>
                <textarea name="description" id="description" cols="3" rows="3" class="form-control" placeholder="Description"></textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
          </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allProduct') }}" type="submit" class="btn btn-info">Back</a>
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
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      $("#unit_price").on("input", function () {
        var d = $('#flat_size').val()*$(this).val();
        $('#total_flat_price').val(d);
    });

      $("#flat_size").on("input", function () {
        var d = $('#unit_price').val()*$(this).val();
        $('#total_flat_price').val(d);
    });

    
    $("#utility_charge").on("input", function () {
       calculate();
    });
    $("#additional_work_charge").on("input", function () {
      calculate();
   });
   $("#car_parking_charge").on("input", function () {
    calculate();
  });
  $("#other_charge").on("input", function () {
    calculate();
  });
  $("#utility_charge").on("input", function () {
    calculate();
  });
  $("#discount").on("input", function () {
    calculate();
  });
  $("#refund_additional_work_charge").on("input", function () {
    calculate();
  });

    function calculate(){
      var adw = parseInt($('#additional_work_charge').val());
      var cpc = parseInt($('#car_parking_charge').val());
      var oc = parseInt($('#other_charge').val());
      var tfp =parseInt($('#total_flat_price').val());
      var uc =parseInt($('#utility_charge').val());
      var dis =parseInt($('#discount').val());
      var re =parseInt($('#refund_additional_work_charge').val());


     
      if (isNaN(adw)){
        adw = 0;
      }
      if (isNaN(uc)){
        uc = 0;
      }
      if (isNaN(cpc)){
        cpc = 0;
      }
      if(isNaN(oc)){
        oc =0;
      }
      if(isNaN(dis)){
        dis =0;
      }
      if(isNaN(re)){
        re =0;
      }
      
   var total_charge = (tfp + adw+ cpc+oc +uc)-(dis+re);

      
      $('#net_total').val(total_charge);
    }

      </script>
  @endsection