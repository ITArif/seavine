
@extends('master')

@section('breadcrumb-title', 'Edit Product Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Edit Product Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('updateProduct',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Project Name</label>
                      <select name="project_name" class="form-control select2bs4">
                        <option value="">--select--</option>
                        @foreach ($projects as $project)
                            <option <?= $product->project_id == $project->id ? 'selected' : ''?>  value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('project_name'))
                        <strong class="text-danger">{{ $errors->first('project_name') }}</strong>
                    @endif
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Flat Type</label>
                      {{-- <input type="text" name="flat_type" class="form-control" placeholder="Flat Type"> --}}
                      <select name="flat_type" id="" class="form-control select2bs4">
                        <option value="">--Select Flat Type--</option>
                        <option <?= $product->flat_type == 'A' ? 'selected' : ''?>  value="A">A</option>
                        <option <?= $product->flat_type == 'B' ? 'selected' : ''?>  value="B">B</option>
                        <option <?= $product->flat_type == 'C' ? 'selected' : ''?>  value="C">C</option>
                        <option <?= $product->flat_type == 'D' ? 'selected' : ''?>  value="D">D</option>
                        <option <?= $product->flat_type == 'E' ? 'selected' : ''?>  value="E">E</option>
                        <option <?= $product->flat_type == 'F' ? 'selected' : ''?>  value="F">F</option>
                        <option <?= $product->flat_type == 'G' ? 'selected' : ''?>  value="G">G</option>
                        <option <?= $product->flat_type == 'H' ? 'selected' : ''?>  value="H">H</option>
                        <option <?= $product->flat_type == 'I' ? 'selected' : ''?>  value="I">I</option>
                        <option <?= $product->flat_type == 'J' ? 'selected' : ''?>  value="J">J</option>
                        <option <?= $product->flat_type == 'K' ? 'selected' : ''?>  value="K">K</option>
                        <option <?= $product->flat_type == 'L' ? 'selected' : ''?>  value="L">L</option>
                      </select>
                      @if($errors->has('flat_type'))
                          <strong class="text-danger">{{ $errors->first('flat_type') }}</strong>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Floor Number</label>
                      {{-- <input type="number" name="floor_number" class="form-control" placeholder="Floor Number"> --}}
                      <select name="floor_number" id="" class="form-control select2bs4">
                        <option value="">--Select Floor Number</option>
                        <option <?= $product->floor_number == '1st' ? 'selected' : ''?> value="1st">1st</option>
                        <option <?= $product->floor_number == '2nd' ? 'selected' : ''?> value="2nd">2nd</option>
                        <option <?= $product->floor_number == '3rd' ? 'selected' : ''?> value="3rd">3rd</option>
                        <option <?= $product->floor_number == '4th' ? 'selected' : ''?> value="4th">4th</option>
                        <option <?= $product->floor_number == '5th' ? 'selected' : ''?> value="5th">5th</option>
                        <option <?= $product->floor_number == '6th' ? 'selected' : ''?> value="6th">6th</option>
                        <option <?= $product->floor_number == '7th' ? 'selected' : ''?> value="7th">7th</option>
                        <option <?= $product->floor_number == '8th' ? 'selected' : ''?> value="8th">8th</option>
                        <option <?= $product->floor_number == '9th' ? 'selected' : ''?> value="9th">9th</option>
                        <option <?= $product->floor_number == '10th' ? 'selected' : ''?> value="10th">10th</option>
                        <option <?= $product->floor_number == '11th' ? 'selected' : ''?>  value="11th">11th</option>
                        <option <?= $product->floor_number == '12th' ? 'selected' : ''?> value="12th">12th</option>
                        <option <?= $product->floor_number == '13th' ? 'selected' : ''?> value="13th">13th</option>
                        <option <?= $product->floor_number == '14th' ? 'selected' : ''?> value="14th">14th</option>
                        <option <?= $product->floor_number == '15th' ? 'selected' : ''?> value="15th">15th</option>
                        <option <?= $product->floor_number == '16th' ? 'selected' : ''?> value="16th">16th</option>
                        <option <?= $product->floor_number == '17th' ? 'selected' : ''?> value="17th">17th</option>
                        <option <?= $product->floor_number == '18th' ? 'selected' : ''?> value="18th">18th</option>
                        <option <?= $product->floor_number == '19th' ? 'selected' : ''?> value="19th">19th</option>
                        <option <?= $product->floor_number == '20th' ? 'selected' : ''?> value="20th">20th</option>
                      </select>
                      @if($errors->has('floor_number'))
                          <strong class="text-danger">{{ $errors->first('floor_number') }}</strong>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Flat Size</label>
                      <input type="number" name="flat_size" class="form-control" placeholder="Flat Size" value="{{ $product->flat_size }}">
                      @if($errors->has('flat_size'))
                          <strong class="text-danger">{{ $errors->first('flat_size') }}</strong>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Unit Price</label>
                      <input type="number" name="unit_price" class="form-control" placeholder="Unit Price" value="{{ $product->unit_price }}">
                      @if($errors->has('unit_price'))
                          <strong class="text-danger">{{ $errors->first('unit_price') }}</strong>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Total Flat Price</label>
                      <input type="text" readonly name="total_flat_price" class="form-control">
                      @if($errors->has('project_name'))
                          <strong class="text-danger">{{ $errors->first('total_flat_price') }}</strong>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Car Parking Charge</label>
                        <input type="number" name="car_parking_charge" class="form-control" placeholder="Car Parking Charge" value="{{ $product->car_parking_charge }}">
                        @if($errors->has('car_parking_charge'))
                            <strong class="text-danger">{{ $errors->first('car_parking_charge') }}</strong>
                        @endif
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Utility Charge</label>
                      <input type="number" name="utility_charge" class="form-control" placeholder="Utility Charge" value="{{ $product->utility_charge }}">
                      @if($errors->has('utility_charge'))
                          <strong class="text-danger">{{ $errors->first('utility_charge') }}</strong>
                      @endif
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Additional Work Charge</label>
                          <input type="number" name="additional_work_charge" class="form-control" placeholder="Additional Work Charge" value="{{ $product->additional_work_charge }}">
                          @if($errors->has('additional_work_charge'))
                              <strong class="text-danger">{{ $errors->first('additional_work_charge') }}</strong>
                          @endif                      
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Other Charge</label>
                          <input type="number" name="other_charge" class="form-control" placeholder="Other Charge" value="{{ $product->other_charge }}">
                          @if($errors->has('other_charge'))
                              <strong class="text-danger">{{ $errors->first('other_charge') }}</strong>
                          @endif
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Discount</label>
                        <input type="number" name="discount" class="form-control" placeholder="Discount" value="{{ $product->discount }}">
                        @if($errors->has('discount'))
                            <strong class="text-danger">{{ $errors->first('discount') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label>Refund Additional Work Charge</label>
                      <input type="number" name="refund_additional_work_charge" class="form-control" placeholder="Refund Additional Work Charge" value="{{ $product->refund_additional_work_charge }}">
                      @if($errors->has('refund_additional_work_charge'))
                          <strong class="text-danger">{{ $errors->first('refund_additional_work_charge') }}</strong>
                      @endif
                  </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                    <label>Net Total</label>
                    <input type="text" readonly name="net_total" class="form-control">
                    @if($errors->has('net_total'))
                        <strong class="text-danger">{{ $errors->first('net_total') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                  <label>File Attached</label>
                  <input type="file" name="file_attached" class="form-control" placeholder="File Attached">
                  @if($errors->has('file_attached'))
                      <strong class="text-danger">{{ $errors->first('file_attached') }}</strong>
                  @endif
              </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="description" cols="3" rows="3" class="form-control" placeholder="Description">{{ $product->description }}</textarea>
                @if($errors->has('description'))
                    <strong class="text-danger">{{ $errors->first('description') }}</strong>
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