
@extends('master')

@section('breadcrumb-title', 'Edit Customer Information')
@section('custom_css')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
@endsection
@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Edit Customer Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('updateCustomer',$customer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                  <!-- /.col -->
                    <div class="col-md-6">
                    <div class="form-group">
                        <label> Project<span style="color: red;">*</span></label>
                        <select name="project_name" class="form-control select2bs4" id="project_name">
                            <option value="">--select project name--</option>
                            @foreach ($projects as $project)
                            <option <?= ($customer->project_name == $project->id) ? 'selected' : '' ?> value="{{ $project->id}}">{{ $project->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('project_name'))
                        <strong class="text-danger">{{ $errors->first('project_name') }}</strong>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                      <div class="form-group">
                          <label>Application Date<span style="color: red;">*</span></label>
                          <input type="text" name="application_date" id="application_date" class="form-control" value="{{$customer->application_date}}" placeholder="Application Date....">
                          @if($errors->has('application_date'))
                          <strong class="text-danger">{{ $errors->first('application_date') }}</strong>
                          @endif
                      </div>
                  </div>
                  <div class="col-md-6" hidden="">
                        <div class="form-group">
                            <label>Application Id<span style="color: red;">*</span></label>
                            <input type="text" name="application_id" class="form-control" value="{{$customer->application_id}}" placeholder="Application Id">
                              @if($errors->has('application_id'))
                                  <span class="text-danger">{{ $errors->first('application_id') }}</span>
                              @endif                    
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Address<span style="color: red;">*</span></label>
                        <textarea name="address" id="address" cols="3" rows="3" class="form-control" placeholder="Address">{{$customer->address}}</textarea>
                          @if($errors->has('address'))
                              <span class="text-danger">{{ $errors->first('address') }}</span>
                          @endif
                    </div>
                </div>
                    <div class="form-group col-12">
                        <div class="card card-info ">
                            <div class="card-header">
                                <h3 class="card-title">Application for booking of land share</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Number Of Land Share<span style="color: red;">*</span></label>
                            <input type="text" name="no_of_land_share" class="form-control" value="{{$customer->no_of_land_share}}" placeholder="No Of land Share">
                              @if($errors->has('no_of_land_share'))
                                  <span class="text-danger">{{ $errors->first('no_of_land_share') }}</span>
                              @endif                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total Price<span style="color: red;">*</span></label>
                            <input type="number" name="total_price" class="form-control" value="{{$customer->total_price}}" placeholder="Total Price">
                              @if($errors->has('total_price'))
                                  <span class="text-danger">{{ $errors->first('total_price') }}</span>
                              @endif                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Payment Booking/TK<span style="color: red;">*</span></label>
                            <input type="number" name="booking_payment" class="form-control" value="{{$customer->booking_payment}}" placeholder="Booking Payment">
                              @if($errors->has('booking_payment'))
                                  <span class="text-danger">{{ $errors->first('booking_payment') }}</span>
                              @endif                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Registry Cost/Other<span style="color: red;">*</span></label>
                            <input type="number" name="registration_cost" class="form-control" value="{{$customer->registration_cost}}" placeholder="Registry Cost">
                              @if($errors->has('registration_cost'))
                                  <span class="text-danger">{{ $errors->first('registration_cost') }}</span>
                              @endif                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Checque/P.o/DD<span style="color: red;">*</span></label>
                            <input type="text" name="checque_no" class="form-control" value="{{$customer->checque_no}}" placeholder="Checque/P.o/DD">
                              @if($errors->has('checque_no'))
                                  <span class="text-danger">{{ $errors->first('checque_no') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total Amount<span style="color: red;">*</span></label>
                            <input type="number" name="total_amount" class="form-control" value="{{$customer->total_amount}}" placeholder="Total Amount">
                              @if($errors->has('total_amount'))
                                  <span class="text-danger">{{ $errors->first('total_amount') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Branch<span style="color: red;">*</span></label>
                            <input type="text" name="branch" class="form-control" value="{{$customer->branch}}" placeholder="Branch">
                              @if($errors->has('branch'))
                                  <span class="text-danger">{{ $errors->first('branch') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Made Of Payment<span style="color: red;">*</span></label>
                        <select name="made_of_payment" class="form-control select2bs4" id="made_of_payment">
                            <option value="">--select Payment Type--</option>
                                <option {{ ($customer->made_of_payment) == 'installment' ? 'selected' : '' }} value="installment">Installment</option>
                                <option {{ ($customer->made_of_payment) == 'at a time' ? 'selected' : '' }} value="at a time">At a time</option>
                        </select>
                        @if($errors->has('made_of_payment'))
                        <strong class="text-danger">{{ $errors->first('made_of_payment') }}</strong>
                        @endif
                    </div>
                </div>
                    <div class="form-group col-12">
                        <div class="card card-info ">
                            <div class="card-header">
                                <h3 class="card-title">Applicant's Info</h3>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Name<span style="color: red;">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{$customer->name}}" placeholder="Enter name">
                              @if($errors->has('name'))
                                  <span class="text-danger">{{ $errors->first('name') }}</span>
                              @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date<span style="color: red;">*</span></label>
                            <input type="text" name="date" id="date" class="form-control" value="{{$customer->date}}" placeholder="date">
                              @if($errors->has('date'))
                                  <span class="text-danger">{{ $errors->first('date') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <div class="card card-info ">
                            <div class="card-header">
                                <h3 class="card-title">Applicant's Personal Information</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone<span style="color: red;">*</span></label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{$customer->phone}}" placeholder="Phone">
                              @if($errors->has('phone'))
                                  <span class="text-danger">{{ $errors->first('phone') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Office<span style="color: red;">*</span></label>
                            <input type="text" name="office" id="office" class="form-control" value="{{$customer->office}}" placeholder="Office">
                              @if($errors->has('office'))
                                  <span class="text-danger">{{ $errors->first('office') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile<span style="color: red;">*</span></label>
                            <input type="text" name="mobile" id="mobile" class="form-control" value="{{$customer->mobile}}" placeholder="Mobile">
                              @if($errors->has('mobile'))
                                  <span class="text-danger">{{ $errors->first('mobile') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email<span style="color: red;">*</span></label>
                            <input type="Email" name="email" id="email" class="form-control" value="{{$customer->email}}" placeholder="Email">
                              @if($errors->has('email'))
                                  <span class="text-danger">{{ $errors->first('email') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Emergency Phone Number<span style="color: red;">*</span></label>
                            <input type="text" name="emergency_phone" id="emergency_phone" class="form-control" value="{{$customer->emergency_phone}}" placeholder="Emergency Phone">
                              @if($errors->has('emergency_phone'))
                                  <span class="text-danger">{{ $errors->first('emergency_phone') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name<span style="color: red;">*</span></label>
                            <input type="text" name="full_name" id="full_name" class="form-control" value="{{$customer->full_name}}" placeholder="Full Name">
                              @if($errors->has('full_name'))
                                  <span class="text-danger">{{ $errors->first('full_name') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Father Name<span style="color: red;">*</span></label>
                            <input type="text" name="father_name" id="father_name" class="form-control" value="{{$customer->father_name}}" placeholder="Father Name">
                              @if($errors->has('father_name'))
                                  <span class="text-danger">{{ $errors->first('father_name') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mother Name<span style="color: red;">*</span></label>
                            <input type="text" name="mother_name" id="mother_name" class="form-control" value="{{$customer->mother_name}}" placeholder="Mother Name">
                              @if($errors->has('mother_name'))
                                  <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Spaous Name<span style="color: red;">*</span></label>
                            <input type="text" name="spouse_name" id="spouse_name" class="form-control" value="{{$customer->spouse_name}}" placeholder="Spouse Name">
                              @if($errors->has('spouse_name'))
                                  <span class="text-danger">{{ $errors->first('spouse_name') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date Of Birth<span style="color: red;">*</span></label>
                            <input type="text" name="date_of_birth" id="date_of_birth" class="form-control" value="{{$customer->date_of_birth}}" placeholder="Date Of Birth">
                              @if($errors->has('date_of_birth'))
                                  <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Religion<span style="color: red;">*</span></label>
                            <input type="text" name="religion" id="religion" class="form-control" value="{{$customer->religion}}" placeholder="religion">
                              @if($errors->has('religion'))
                                  <span class="text-danger">{{ $errors->first('religion') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nationality<span style="color: red;">*</span></label>
                            <input type="text" name="nationality" id="nationality" class="form-control" value="{{$customer->nationality}}" placeholder="nationality">
                              @if($errors->has('nationality'))
                                  <span class="text-danger">{{ $errors->first('nationality') }}</span>
                              @endif
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Occupation<span style="color: red;">*</span></label>
                            <input type="text" name="occupation" id="occupation" class="form-control" value="{{$customer->occupation}}" placeholder="occupation">
                              @if($errors->has('occupation'))
                                  <span class="text-danger">{{ $errors->first('occupation') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                  <div class="form-group">
                      <label>NID<span style="color: red;">*</span></label>
                      <input type="number" name="nid_no" class="form-control" value="{{$customer->nid_no}}" placeholder="NID">
                      @if($errors->has('nid_no'))
                          <span class="text-danger">{{ $errors->first('nid_no') }}</span>
                      @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>E-tin No<span style="color: red;">*</span></label>
                      <input type="text" name="etin_no" class="form-control" value="{{$customer->etin_no}}" placeholder="etin_no">
                      @if($errors->has('etin_no'))
                          <span class="text-danger">{{ $errors->first('etin_no') }}</span>
                      @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Passport No<span style="color: red;">*</span></label>
                      <input type="text" name="passport_no" class="form-control" value="{{$customer->passport_no}}" placeholder="passport no">
                      @if($errors->has('passport_no'))
                          <span class="text-danger">{{ $errors->first('passport_no') }}</span>
                      @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Mailing address/flat No<span style="color: red;">*</span></label>
                      <input type="text" name="mailing_address" class="form-control" value="{{$customer->mailing_address}}" placeholder="mailing address or flat no">
                      @if($errors->has('mailing_address'))
                          <span class="text-danger">{{ $errors->first('mailing_address') }}</span>
                      @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Road Or Villege<span style="color: red;">*</span></label>
                      <input type="text" name="road_villege" class="form-control" value="{{$customer->road_villege}}" placeholder="road_villege">
                      @if($errors->has('road_villege'))
                          <span class="text-danger">{{ $errors->first('road_villege') }}</span>
                      @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Parmenat address<span style="color: red;">*</span></label>
                      <input type="text" name="parmenat_address" class="form-control" value="{{$customer->parmenat_address}}" placeholder="parmenat_address">
                      @if($errors->has('parmenat_address'))
                          <span class="text-danger">{{ $errors->first('parmenat_address') }}</span>
                      @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Area Or Thana<span style="color: red;">*</span></label>
                      <input type="text" name="area_thana" class="form-control" value="{{$customer->area_thana}}" placeholder="area_thana">
                      @if($errors->has('area_thana'))
                          <span class="text-danger">{{ $errors->first('area_thana') }}</span>
                      @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>District<span style="color: red;">*</span></label>
                      <input type="text" name="district" class="form-control" value="{{$customer->district}}" placeholder="district">
                      @if($errors->has('district'))
                          <span class="text-danger">{{ $errors->first('district') }}</span>
                      @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Post Code<span style="color: red;">*</span></label>
                      <input type="text" name="post_code" class="form-control" value="{{$customer->post_code}}" placeholder="post_code">
                      @if($errors->has('post_code'))
                          <span class="text-danger">{{ $errors->first('post_code') }}</span>
                      @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Nominee<span style="color: red;">*</span></label>
                      <input type="text" name="nominee" class="form-control" value="{{$customer->nominee}}" placeholder="nominee">
                      @if($errors->has('nominee'))
                          <span class="text-danger">{{ $errors->first('nominee') }}</span>
                      @endif
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                      <label>Relation<span style="color: red;">*</span></label>
                      <input type="text" name="relation" class="form-control" value="{{$customer->relation}}" placeholder="relation">
                      @if($errors->has('relation'))
                          <span class="text-danger">{{ $errors->first('relation') }}</span>
                      @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Image<span style="color: red;">*</span></label>
                      <input type="file" id="image" name="image" class="form-control">
                      @if($errors->has('image'))
                          <span class="text-danger">{{ $errors->first('image') }}</span>
                      @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image Preview
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <img id="image_preview" style="width: 150px;  height:150px; margin-top:10px" src="{{ asset('uploads/customer/'.$customer->image) }}" alt="">
                          </div>
                        </div>
                </div>
                <div class="form-group col-12">
                        <div class="card card-info ">
                            <div class="card-header">
                                <h3 class="card-title text-warning">Special Notes: Please make the payment by cross checque/pay order/demand draft in favor of seavine properties ltd.</h3>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <div class="card card-info ">
                            <div class="card-header">
                                <h3 class="card-title">For official uses</h3>
                            </div>
                        </div>
                    </div>
                <div class="col-md-6">
                        <div class="form-group">
                            <label>Owner Id No<span style="color: red;">*</span></label>
                            <input type="text" name="owner_id_no" id="owner_id_no" class="form-control" value="{{$customer->owner_id_no}}" placeholder="owner_id_no">
                              @if($errors->has('owner_id_no'))
                                  <span class="text-danger">{{ $errors->first('owner_id_no') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Land Sahre<span style="color: red;">*</span></label>
                            <input type="text" name="land_share" id="land_share" class="form-control" value="{{$customer->land_share}}" placeholder="land_share">
                              @if($errors->has('land_share'))
                                  <span class="text-danger">{{ $errors->first('land_share') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No of installment<span style="color: red;">*</span></label>
                            <input type="text" name="no_of_installment" id="no_of_installment" class="form-control" value="{{$customer->no_of_installment}}" placeholder="no_of_installment">
                              @if($errors->has('no_of_installment'))
                                  <span class="text-danger">{{ $errors->first('no_of_installment') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Installment Amount<span style="color: red;">*</span></label>
                            <input type="text" name="installment_amount" id="installment_amount" class="form-control" value="{{$customer->installment_amount}}" placeholder="installment_amount">
                              @if($errors->has('installment_amount'))
                                  <span class="text-danger">{{ $errors->first('installment_amount') }}</span>
                              @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Money Recipt No<span style="color: red;">*</span></label>
                            <input type="text" name="money_recipt_no" id="money_recipt_no" class="form-control" value="{{$customer->money_recipt_no}}" placeholder="money_recipt_no">
                              @if($errors->has('money_recipt_no'))
                                  <span class="text-danger">{{ $errors->first('money_recipt_no') }}</span>
                              @endif
                        </div>
                    </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allCustomer') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection
  @section('custom_js')
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <script>
    $(function () {
      $('.select2bs4').select2({
        theme: 'bootstrap4'
    });
      $("#application_date" ).datepicker({dateFormat: 'yy-mm-dd'});
      $("#date" ).datepicker({dateFormat: 'yy-mm-dd'});
      $("#date_of_birth" ).datepicker({dateFormat: 'yy-mm-dd'});
      $("#installment_date" ).datepicker({dateFormat: 'yy-mm-dd'});
    })

    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photo_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
            readURL(this);
        });
  </script>

  @endsection
