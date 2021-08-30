

@extends('master')

@section('breadcrumb-title', 'Add Project Information')

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
          <h3 class="card-title">Add Project Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeProject') }}" method="POST">
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
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Description<span style="color: red;">*</span></label>
                          <textarea name="description" id="description" cols="3" rows="3" class="form-control" placeholder="Description"></textarea>
                          @if($errors->has('description'))
                              <span class="text-danger">{{ $errors->first('description') }}</span>
                          @endif                      
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Location<span style="color: red;">*</span></label>
                          <input type="text" name="location" class="form-control" value="{{old('description')}}" placeholder="Location">
                          @if($errors->has('location'))
                              <span class="text-danger">{{ $errors->first('location') }}</span>
                          @endif
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Facing<span style="color: red;">*</span></label>
                        <input type="text" name="facing" class="form-control" value="{{old('facing')}}" placeholder="Facing">
                        @if($errors->has('facing'))
                          <span class="text-danger">{{ $errors->first('facing') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                      <label>Building Height<span style="color: red;">*</span></label>
                      <input type="text" name="building_height" class="form-control" value="{{old('building_height')}}" placeholder="Building Height">
                      @if($errors->has('building_height'))
                        <span class="text-danger">{{ $errors->first('building_height') }}</span>
                      @endif
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label>Land Area<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="land_area" value="{{old('land_area')}}"  placeholder="Land Area" >
                    @if($errors->has('land_area'))
                      <span class="text-danger">{{ $errors->first('land_area') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label>Lanching Date<span style="color: red;">*</span></label>
                  <input type="text" class="form-control" name="launching_date" value="{{old('launching_date')}}" id="launching_date" placeholder="Launching Date">
                  @if($errors->has('launching_date'))
                    <span class="text-danger">{{ $errors->first('launching_date') }}</span>
                  @endif
              </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
                <label>Hand Over Date<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="hand_over_date" id="hand_over_date" value="{{old('hand_over_date')}}" placeholder="Hand Over Date">
                @if($errors->has('hand_over_date'))
                  <span class="text-danger">{{ $errors->first('hand_over_date') }}</span>
                @endif
            </div>
        </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allProject') }}" type="submit" class="btn btn-info">Back</a>
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

  <script>

    $(function () {
      $( "#launching_date" ).datepicker({dateFormat: 'yy-mm-dd'});
      $( "#hand_over_date" ).datepicker({dateFormat: 'yy-mm-dd'});
    })

</script>
    
@endsection